<?php

namespace App\Repository;

use App\Entity\Lcdv;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lcdv>
 *
 * @method Lcdv|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lcdv|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lcdv[]    findAll()
 * @method Lcdv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LcdvRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lcdv::class);
    }

    /**
     * @return Lcdv[]
     */
    public function findBySitId($value): array
    {
        return $this->createQueryBuilder('p')->andWhere('p.SIT_ID = :val')->setParameter('val', $value)->getQuery()->getResult();
    }

    public function findLastBySitId($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.SIT_ID = :val')
            ->setParameter('val', $value)
            ->orderBy('p.LCDV_ID', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Lcdv[]
     */
    public function findBySitIdDaily($sitId, int $min, $max): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.SIT_ID = :sitId')
            ->andWhere('p.LCDV_DateIn > :minDate')
            ->andWhere('p.LCDV_DateIn < :maxDate')
            ->setParameters(['sitId' => $sitId, 'minDate' => $min, 'maxDate' => $max])
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Lcdv[] Returns an array of Lcdv objects
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

    //    public function findOneBySomeField($value): ?Lcdv
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
