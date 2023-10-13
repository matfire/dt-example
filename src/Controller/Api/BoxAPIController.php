<?php
namespace App\Controller\Api;

use App\Repository\BoxRepository;
use App\Repository\LvbRepository;
use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/box')]
class BoxAPIController extends AbstractController {
    #[Route("/daily")]
    public function daily(#[MapQueryParameter] int $siteId, #[MapQueryParameter] int $dayTs, BoxRepository $boxRepository, LvbRepository $lvbRepository): JsonResponse {
        $beginDate = new DateTime();
        $beginDate = $beginDate->setTimestamp(intval($dayTs));
        $lvbs = $lvbRepository->findActiveOnDate($siteId, $beginDate);
        $boxes = [];
        foreach ($lvbs as $lvb) {
            array_push($boxes, $boxRepository->findByBoxId($lvb->getBOXID())[0]);
        }
        return $this->json(['lvbs' => $lvbs, 'boxes' => $boxes]);

    }
}