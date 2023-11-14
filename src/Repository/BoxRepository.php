<?php

namespace App\Repository;

use App\Entity\Box;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Box>
 *
 * @method Box|null find($id, $lockMode = null, $lockVersion = null)
 * @method Box|null findOneBy(array $criteria, array $orderBy = null)
 * @method Box[]    findAll()
 * @method Box[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Box::class);
    }

    /**
     * @return Box[]
     */
    public function findByBoxId(int $boxId): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.BOX_ID = :id')
            ->setParameter('id', $boxId)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Box[]
     */
    public function findByBOXIDList($îds)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.BOX_ID in (:ids)')
            ->setParameter('ids', $îds)
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Box[] Returns an array of Box objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Box
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
