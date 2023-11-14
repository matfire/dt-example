<?php 

namespace App\Controller;

use App\Entity\Lvb;
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
        $lvbIds = array_map(function (Lvb $el) {
            return $el->getBOXID();
        }, $lvbs);
        $boxes = $boxRepository->findByBOXIDList($lvbIds);
        return $this->render("resources/box.html.twig", ["boxes" => $boxes, "factor" => 2, "currentTs" => $date->getTimestamp()]);
    }

    #[Route('/box/{boxId}')]
    public function boxDetailResources(int $boxId) {
        return $this->render("resources/details.box.html.twig");
    }
}