<?php

namespace App\Repository;

use App\Entity\TicketingTransactionAggregate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TicketingTransactionAggregate>
 *
 * @method TicketingTransactionAggregate|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketingTransactionAggregate|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketingTransactionAggregate[]    findAll()
 * @method TicketingTransactionAggregate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketingTransactionAggregateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketingTransactionAggregate::class);
    }

//    /**
//     * @return TicketingTransactionAggregate[] Returns an array of TicketingTransactionAggregate objects
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

//    public function findOneBySomeField($value): ?TicketingTransactionAggregate
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    /**
     * @return TicketingTransactionAggregate[]
     */
    public function findByTCRSList(array $ids): array {
        return $this->createQueryBuilder('t')
        ->andWhere("t.TCRS_ID in (:ids)")
        ->setParameter("ids", $ids)
        ->getQuery()
        ->getResult();
    }
}
