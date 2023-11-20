<?php 

namespace App\Controller;

use App\Entity\Lvb;
use App\Repository\BoxRepository;
use App\Repository\LvbRepository;
use App\Repository\VehicleRepository;
use DateTime;
use DateTimeZone;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/resources')]
class ResourcesController extends AbstractController {
    #[Route('/box')]
    public function boxResources(BoxRepository $boxRepository, LvbRepository $lvbRepository) {
        $date = new DateTime("now", new DateTimeZone("GMT"));
        $lvbs = $lvbRepository->findActiveOnDate(425, $date->getTimestamp());
        $lvbIds = array_map(function (Lvb $el) {
            return $el->getBOXID();
        }, $lvbs);
        $boxes = $boxRepository->findByBOXIDList($lvbIds);
        return $this->render("resources/box.html.twig", ["boxes" => $boxes, "factor" => 2, "currentTs" => $date->getTimestamp()]);
    }

    #[Route('/box/{boxId}')]
    public function boxDetailResources(int $boxId, BoxRepository $boxRepository, LvbRepository $lvbRepository, VehicleRepository $vehicleRepository) {

        $box = $boxRepository->findByBoxId($boxId);
        $lvbs = $lvbRepository->findByBOXID($box[0]->getBOXID(), (new DateTime("now", new DateTimeZone("GMT")))->getTimestamp());
        usort($lvbs, function (Lvb $a, Lvb $b) {
            return $b->getLVBID() - $a->getLVBID();
        });
        $vehicle = $vehicleRepository->findOneBy(["VHC_ID" => $lvbs[0]->getVHCID()]);
        return $this->render("resources/details.box.html.twig", ["box" => $box[0], "vehicle" => $vehicle]);
    }
}