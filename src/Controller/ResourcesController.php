<?php 

namespace App\Controller;

use DateTime;
use DateTimeZone;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/resources')]
class ResourcesController extends AbstractController {
    #[Route('/box')]
    public function boxResources() {
        $date = new DateTime("now", new DateTimeZone("GMT"));

        return $this->render("resources/box.html.twig", ["boxes" => [], "factor" => 2, "currentTs" => $date->getTimestamp()]);
    }

}