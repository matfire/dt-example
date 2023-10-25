<?php

namespace App\Repository;

use App\Entity\TimingAppRules;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TimingAppRules>
 *
 * @method TimingAppRules|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimingAppRules|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimingAppRules[]    findAll()
 * @method TimingAppRules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimingAppRulesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimingAppRules::class);
    }

    /**
     * @return TimingAppRules[]
     */
    public function findTarInInterval(int $siteId, int $begTs, int $endTs, int $tableId = 4): array {
        $min = new DateTime();
        $min = $min->setTimestamp($begTs);
        $min->setTime(0,0,0);
        $max = new DateTime();
        $max = $max->setTimestamp($endTs);
        $max->setTime(23,59,59);
        $query = $this->createQueryBuilder("tar");
        $minDateCondition = $query->expr()->orX()
        ->add("tar.TAR_DateStart = '0000-00-00'")
        ->add("Unix_timestamp(tar.TAR_DateStart) > :min");
        $maxDateCondition = $query->expr()->orX()
        ->add("tar.TAR_DateStop = '0000-00-00'")
        ->add("Unix_timestamp(tar.TAR_DateStop) < :max");
        $minTimeCondition = $query->expr()->orX()
        ->add("tar.TAR_TimeStart = -1")
        ->add("tar.TAR_TimeStart > :min");
        $maxTimeCondition = $query->expr()->orX()
        ->add("tar.TAR_TimeStop = -1")
        ->add("tar.TAR_TimeStop < :max");
        $sql = "SELECT * from timing_app_rules as tar where TBL_ID = :tableId and SIT_ID = :sit_id and (TAR_DateStart = '0000-00-00' or Unix_timestamp(TAR_DateStart) > :min) and (TAR_DateStop = '0000-00-00' or Unix_timestamp(TAR_DateStop) < :max) and (TAR_TimeStart = -1 or TAR_TimeStart > :min) and (TAR_TimeStop = -1 or TAR_TimeStop < :max)";
/*         $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addRootEntityFromClassMetadata(TimingAppRules::class, "tar");
        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm); */
        $query = $this->createQueryBuilder("tar")
        ->andWhere("tar.SIT_ID = :sit_id")
        ->andWhere("tar.TBL_ID = :tableId")
        ->andWhere($minDateCondition)
        ->andWhere($maxDateCondition)
        ->andWhere($minTimeCondition)
        ->andWhere($maxTimeCondition);
        $query->setParameters([
            "sit_id" => $siteId,
            "min" => $min->getTimestamp(),
            "max" => $max->getTimestamp(),
            "tableId" => $tableId
            ]
        );
        return $query->getQuery()->getResult();
    }

//    /**
//     * @return TimingAppRules[] Returns an array of TimingAppRules objects
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

//    public function findOneBySomeField($value): ?TimingAppRules
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
