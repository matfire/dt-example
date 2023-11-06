<?php

namespace App\Controller\Api;

use App\Repository\CircuitDetailRepository;
use App\Repository\CircuitHeaderRepository;
use App\Repository\LcdvRepository;
use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/lcdv')]
class LCDVAPIController extends AbstractController
{
    #[Route('/range')]
    public function range(#[MapQueryParameter] int $siteId, #[MapQueryParameter] string $dayTs, LcdvRepository $repository, CircuitHeaderRepository $cchRepository, CircuitDetailRepository $ccdRepository): JsonResponse
    {
        set_time_limit(0);
        $endDate = new DateTime("now", new DateTimeZone("GMT"));
        $endDate->setTimestamp(intval($dayTs));
        $endDate->setTime(23, 59, 59);
        $beginDate = clone $endDate;
        $beginDate = $beginDate->modify("-1 week");
        $beginDate->setTime(0,0,0);
        $res = ['labels' => [], "data" => []];
        $cch = $cchRepository->findByProfileAndDate($siteId, 0, $beginDate->getTimestamp(), $endDate->getTimestamp());
        $elements = [];
        foreach($cch as $header) {
            $ccd = $ccdRepository->findByCircuitHeader($header->getCCHID());
            if (count($ccd) < 2) {
                continue;
            }
            $ccdIds = array_map(function($el) {
                return $el->getCCDID();
            }, $ccd);
            $lcvds = $repository->findByCCDIDList($ccdIds);
            array_push($elements, ...$lcvds);
        }
        $currentDay = [];
        foreach ($elements as $el) {
            $elDate = new DateTime();
            if ($el->getLCDVDateIn() == 0) continue;
            $elDate = $elDate->setTimestamp(intval($el->getLCDVDatein()));
            if (!in_array($elDate->format("d-m-Y"), $res["labels"])) {
                array_push($res["labels"], $elDate->format("d-m-Y"));
                array_push($res["data"], $currentDay);
                $currentDay = [$el];
            } else {
                array_push($currentDay, $el);
            }
        }
        return $this->json(['status' => 'ok', 'res' => $res]);
    }
}
