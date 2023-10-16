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
        $lvbs = $lvbRepository->findActiveOnDate($siteId, $dayTs);
        $boxes = [];
        foreach ($lvbs as $lvb) {
            $box = $boxRepository->findByBoxId($lvb->getBOXID());
            if (count($box) > 0) {
                array_push($boxes, $box[0]);
            }
        }
        return $this->json(['lvbs' => $lvbs, 'boxes' => $boxes]);

    }
}