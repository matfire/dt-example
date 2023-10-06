<?php

namespace App\Controller;

use App\Repository\LcdvRepository;
use DateTime;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class DashboardController extends AbstractController
{
    #[Route('/')]
    public function index(): Response
    {
        return $this->render("index.html.twig");
    }
}
