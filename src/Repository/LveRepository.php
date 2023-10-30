<?php

namespace App\Repository;

use App\Entity\Lve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lve>
 *
 * @method Lve|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lve|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lve[]    findAll()
 * @method Lve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lve::class);
    }

    /**
     * @return Lve[]
     */
    public function findByIdList(array $ids) {
        return $this->createQueryBuilder('l')
            ->andWhere('l.LVE_ID in (:ids)')
            ->setParameter('ids', $ids)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Lve[] Returns an array of Lve objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Lve
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
