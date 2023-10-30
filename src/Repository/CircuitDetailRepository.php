<?php

namespace App\Repository;

use App\Entity\CircuitDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CircuitDetail>
 *
 * @method CircuitDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method CircuitDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method CircuitDetail[]    findAll()
 * @method CircuitDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CircuitDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CircuitDetail::class);
    }

    /**
     * @return CircuitDetail[]
    */
    public function findByCircuitHeader(int $cch_id): array {
        return $this->createQueryBuilder('c')
            ->andWhere('c.CCH_ID = :cch_id')
            ->setParameter('cch_id', $cch_id)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return CircuitDetail[] Returns an array of CircuitDetail objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CircuitDetail
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
