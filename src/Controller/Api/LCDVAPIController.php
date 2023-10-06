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
    public function range(#[MapQueryParameter] int $siteId, #[MapQueryParameter] string $beginTs, #[MapQueryParameter] string $endTs, LcdvRepository $repository): JsonResponse
    {
        $beginDate = new DateTime();
        $endDate = new DateTime();
        $beginDate->setTimestamp(intval($beginTs));
        $beginDate->setTime(0, 0, 0);
        $endDate->setTimestamp(intval($endTs));
        $endDate->setTime(23, 59, 59);
        $res = ["labels" => [], "data" => []];
        do {
            array_push($res["labels"], $beginDate->format("d-m-Y"));
            $data = $repository->findBySitIdDaily($siteId, $beginDate);
            array_push($res["data"], $data);
            $beginDate->modify("+1 day");
        } while ($beginDate->format("Ymd") <= $endDate->format("Ymd"));
        return $this->json(['status' => 'ok', 'res' => $res]);
    }
}
