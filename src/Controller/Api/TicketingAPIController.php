<?php

namespace App\Controller\Api;

use App\Entity\TicketingCashRegisterSession;
use App\Entity\TicketingElementType;
use App\Entity\TicketingTransactionAggregate;
use App\Repository\TicketingCashRegisterSessionRepository;
use App\Repository\TicketingElementTypeRepository;
use App\Repository\TicketingTransactionAggregateRepository;
use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api/ticketing')]
class TicketingAPIController extends AbstractController
{
    #[Route('/sales/range')]
    public function salesRange(#[MapQueryParameter] int $siteId, #[MapQueryParameter] int $dayTs, TicketingElementTypeRepository $ticketingElementTypeRepository, TicketingTransactionAggregateRepository $ticketingTransactionAggregateRepository, TicketingCashRegisterSessionRepository $ticketingCashRegisterSessionRepository): JsonResponse
    {
        set_time_limit(0);
        $results = ["labels" => [], "sales" => []];
        $endDate = new DateTime("now", new DateTimeZone("GMT"));
        $endDate->setTimestamp(intval($dayTs));
        $endDate->setTime(23, 59, 59);
        $beginDate = clone $endDate;
        $beginDate = $beginDate->modify("-1 week");
        $beginDate->setTime(0, 0, 0);
        $tmpDate = clone $beginDate;
        while ($tmpDate < $endDate) {
            array_push($results["labels"], $tmpDate->format("d-m-Y"));
            $begin = clone $tmpDate;
            $begin->setTime(0, 0, 0);
            $end = clone $tmpDate;
            $end->setTime(23, 59, 59);
            $registerSessions = $ticketingCashRegisterSessionRepository->findByDate($siteId, $begin->getTimestamp(), $end->getTimestamp());
            $sessionIds = array_map(function (TicketingCashRegisterSession $el) {
                return $el->getTCRSID();
            }, $registerSessions);
            $aggregates = $ticketingTransactionAggregateRepository->findByTCRSList($sessionIds);
            $elementsMap = new \Ds\Map();
            foreach ($aggregates as $ag) {
                $elementsMap->put($ag->getTETID(), $elementsMap->hasKey($ag->getTETID()) ? $elementsMap->get($ag->getTETID()) + $ag->getTTACountSystem() : $ag->getTTACountSystem());
            }
            $elements = $ticketingElementTypeRepository->findByTETList($elementsMap->keys()->toArray());
            array_push($results["sales"], array_reduce(array_map(function (TicketingElementType $type) use ($elementsMap) {
                $counts = $elementsMap->get($type->getTETID());
                return $counts * $type->getTETPassagerCountElement();
            }, $elements), function ($carry, $item) {
                return $carry + $item;
            }) ?? 0);
            $tmpDate = $tmpDate->modify("+1 day");
        }
        return $this->json(["status" => "ok", "res" => $results]);
    }
}
