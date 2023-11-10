<?php

namespace App\Controller;

use App\Entity\CircuitDetail;
use App\Entity\Lcdv;
use App\Repository\CircuitDetailRepository;
use App\Repository\CircuitHeaderRepository;
use App\Repository\LcdvRepository;
use DateTime;
use DateTimeZone;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;

#[Route("/vehicles")]
class VehicleController extends AbstractController
{
    #[Route('/bus')]
    public function bus(CircuitHeaderRepository $headerRepository, #[MapQueryParameter] int $d = null): Response
    {
        $date = new DateTime("now", new DateTimeZone("GMT"));
        if (isset($d)) {
            $date = $date->setTimestamp($d);
        }
        $begin = clone $date;
        $begin->setTime(0,0,0);
        $end = clone $date;
        $end->setTime(23,59,59);
        $instanciatedBus = $headerRepository->findByProfileAndDate(425, 0, $begin->getTimestamp(), $end->getTimestamp());
        return $this->render("vehicles/bus.html.twig", ["buses" => $instanciatedBus]);
    }

    #[Route('/bus/{cchid}')]
    public function busDetails(int $cchid, CircuitDetailRepository $ccdRepository, LcdvRepository $lcvdRepository): Response {
        $details = $ccdRepository->findByCircuitHeader($cchid, true);
        $detailsIds = array_map(function ($el) {
            return $el->getCCDID();
        }, $details);
        $lcdvs = $lcvdRepository->findByCCDIDList($detailsIds);
        $data = array_map(function (CircuitDetail $el) use ($lcdvs) {
            $lcdv = array_filter($lcdvs, function ( Lcdv $l) use ($el) {
                return $l->getCCDID() == $el->getCCDID();
            });
            return ["detail" => $el, "lcdv" => array_shift($lcdv)];
        }, $details);
        return $this->render("vehicles/details.bus.html.twig", ["data" => $data]);
    }
}
