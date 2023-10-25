<?php

namespace App\Controller\Api;

use App\Repository\CircuitHeaderRepository;
use App\Repository\TimingAppRulesRepository;
use App\Utils\TimingAppRulesUtils;
use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/cch')]
class CircuitHeaderAPIController extends AbstractController
{
    #[Route("/daily")]
    public function daily(#[MapQueryParameter] int $siteId, #[MapQueryParameter] int $dayTs, CircuitHeaderRepository $headerRepository, TimingAppRulesRepository $appRulesRepository): JsonResponse
    {
        set_time_limit(0);
        $endDate = new DateTime("now", new DateTimeZone("GMT"));
        $endDate->setTimestamp(intval($dayTs));
        $endDate->setTime(23, 59, 59);
        $beginDate = clone $endDate;
        $beginDate = $beginDate->modify("-1 week");
        $beginDate->setTime(0, 0, 0);
        $instanciated = $headerRepository->findByProfileAndDate($siteId, 0, $beginDate->getTimestamp(), $endDate->getTimestamp());
        $res = ["labels" => [], "instanciated" => [], "planned" => []];
        //generate labels
        $tmpDate = clone $beginDate;
        for ($i = 0; $i < 8; $i++) {
            array_push($res["labels"], $tmpDate->format("d-m-Y"));
            array_push($res["instanciated"], 0);
            array_push($res["planned"], 0);
            $tmpDate = $tmpDate->modify("+1 day");
        }
        //handle instanciated
        foreach ($instanciated as $el) {
            $elDate = new DateTime("now", new DateTimeZone("GMT"));
            $elDate = $elDate->setTimestamp(intval($el->getCCHCreationDate()));
            $index = array_search($elDate->format("d-m-Y"), $res["labels"], true);
            if (!isset($res["instanciated"][$index])) continue;
            $res["instanciated"][$index]++;
        }

        //handle planned
        $planned = $headerRepository->findByProfile($siteId, 1);
        $tars = $appRulesRepository->findTarInInterval($siteId, $beginDate->getTimestamp(), $endDate->getTimestamp());
        foreach ($res["labels"] as $idx => $day) {
            $currentDayHeaders = 0;
            $minDay = new DateTime($day, new DateTimeZone("GMT"));
            $maxDay = new DateTime($day, new DateTimeZone("GMT"));
            $minDay = $minDay->setTime(0, 0, 0)->getTimestamp();
            $maxDay = $maxDay->setTime(23, 59, 59)->getTimestamp();
            $validHeaders = array_filter($planned, function ($el) use ($minDay, $maxDay) {
                return true;
            });
            foreach ($validHeaders as $header) {
                $linkedTars = array_filter($tars, function ($el) use ($header) {
                    return $el->getTBLElementID() == $header->getCCHID();
                });
                if (count($linkedTars) == 0) {
                    $currentDayHeaders++;
                } else {
                    $matcher = new TimingAppRulesUtils();
                    foreach ($linkedTars as $tar) {
                        $matcher->addTARToList($tar);
                    }
                    if ($matcher->isTARApplicable($minDay)) {
                        $currentDayHeaders++;
                    }
                }
            }
            $res["planned"][$idx] = $currentDayHeaders;
        }
        return $this->json($res);
    }
}
