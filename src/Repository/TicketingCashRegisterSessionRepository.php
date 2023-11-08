<?php

namespace App\Repository;

use App\Entity\TicketingCashRegisterSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TicketingCashRegisterSession>
 *
 * @method TicketingCashRegisterSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketingCashRegisterSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketingCashRegisterSession[]    findAll()
 * @method TicketingCashRegisterSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketingCashRegisterSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketingCashRegisterSession::class);
    }

//    /**
//     * @return TicketingCashRegisterSession[] Returns an array of TicketingCashRegisterSession objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TicketingCashRegisterSession
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    /**
     * @return TicketingCashRegisterSession[]
     */
    public function findByDate(int $siteId, int $begTs, int $endTs): array {
        return $this->createQueryBuilder('c')
            ->andWhere("c.SIT_ID = :sit_id")
            ->andWhere("c.TCRS_DateStart >= :begin")
            ->andWhere("c.TCRS_DateStop <= :end")
            ->setParameters(["sit_id" => $siteId, "begin" => $begTs, "end" => $endTs])
            ->getQuery()
            ->getResult();
    }
}
