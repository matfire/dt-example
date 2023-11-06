<?php 

namespace App\Controller;

use App\Repository\BoxRepository;
use App\Repository\LvbRepository;
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
        $boxes = [];
        foreach ($lvbs as $lvb) {
            $box = $boxRepository->findByBoxId($lvb->getBOXID());
            if (count($box) > 0) {
                array_push($boxes, $box[0]);
            }
        }
        return $this->render("resources/box.html.twig", ["boxes" => $boxes, "factor" => 2, "currentTs" => $date->getTimestamp()]);
    }
}