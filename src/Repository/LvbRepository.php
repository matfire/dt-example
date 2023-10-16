<?php

namespace App\Repository;

use App\Entity\Lvb;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lvb>
 *
 * @method Lvb|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lvb|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lvb[]    findAll()
 * @method Lvb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LvbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lvb::class);
    }

    public function findActiveOnDate(int $siteId, int $date) {

        $query = $this->createQueryBuilder('l');
        $condition = $query->expr()->andX();
        $maxSide = $query->expr()->orX();
        $maxSide->add('l.LVB_DateOut < :date');
        $maxSide->add('l.LVB_DateOut = 0');
        $condition->add('l.LVB_DateIn < :date');
        $condition->add($maxSide);
        $queryObj = $query
        ->where($condition)
        ->andWhere('l.SIT_ID = :sit_id')
        ->setParameters(['sit_id' => $siteId, 'date' => $date])
        ->getQuery();
        return $queryObj->getResult();
    }

//    /**
//     * @return Lvb[] Returns an array of Lvb objects
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

//    public function findOneBySomeField($value): ?Lvb
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
