<?php

namespace App\Controller\Api;


use App\Repository\LcdvRepository;
use DateTime;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/lcdv')]
class LCDVAPIController extends AbstractController
{
    #[Route('/range')]
    public function range(#[MapQueryParameter] int $siteId, #[MapQueryParameter] string $dayTs, LcdvRepository $repository): JsonResponse
    {
        $endDate = new DateTime();
        $endDate->setTimestamp(intval($dayTs));
        $beginDate = clone $endDate;
        $beginDate = $beginDate->modify("-1 week");
        $beginDate->setTime(0,0,0);
        $res = ['labels' => [], "data" => []];
        $elements = $repository->findBySitIdDaily($siteId, $beginDate->getTimestamp(), $endDate->getTimestamp());
        $currentDay = [];
        foreach ($elements as $el) {
            $elDate = new DateTime();
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
