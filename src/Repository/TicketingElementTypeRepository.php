<?php

namespace App\Repository;

use App\Entity\TicketingElementType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TicketingElementType>
 *
 * @method TicketingElementType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketingElementType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketingElementType[]    findAll()
 * @method TicketingElementType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketingElementTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketingElementType::class);
    }

//    /**
//     * @return TicketingElementType[] Returns an array of TicketingElementType objects
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

//    public function findOneBySomeField($value): ?TicketingElementType
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
