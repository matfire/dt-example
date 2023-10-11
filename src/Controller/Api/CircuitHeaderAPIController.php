<?php
namespace App\Controller\Api;

use App\Repository\CircuitHeaderRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/cch')]
class CircuitHeaderAPIController extends AbstractController {
    #[Route("/daily")]
    public function daily(#[MapQueryParameter] int $siteId, #[MapQueryParameter] int $dayTs, CircuitHeaderRepository $headerRepository): JsonResponse {
        $beginDate = new DateTime();
        $beginDate->setTimestamp(intval($dayTs));
        $instanciated = $headerRepository->findByProfileAndDate($siteId, 0, $beginDate);
        return $this->json(['instanciated' => $instanciated]);

    }
}