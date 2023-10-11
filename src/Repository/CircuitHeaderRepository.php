<?php

namespace App\Repository;

use App\Entity\CircuitHeader;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CircuitHeader>
 *
 * @method CircuitHeader|null find($id, $lockMode = null, $lockVersion = null)
 * @method CircuitHeader|null findOneBy(array $criteria, array $orderBy = null)
 * @method CircuitHeader[]    findAll()
 * @method CircuitHeader[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CircuitHeaderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CircuitHeader::class);
    }

    public function findByProfile(int $sit_id, int $profile): array {
        return $this->createQueryBuilder('c')
            ->andWhere('c.SIT_ID = :sit_id')
            ->andWhere('c.CCH_Profile = :profile')
            ->setParameters(['sit_id' => $sit_id, 'profile' => $profile])
            ->getQuery()
            ->getResult();
    }

    public function findByProfileAndDate(int $sit_id, int $profile, DateTime $date) {
        $min = clone $date;
        $min = $min->setTime(0,0,0)->getTimestamp();
        $max = clone $date;
        $max = $max->setTime(23,59,59)->getTimestamp();

        return $this->createQueryBuilder('c')
            ->andWhere('c.SIT_ID = :sit_id')
            ->andWhere('c.CCH_Profile = :profile')
            ->andWhere('c.CCH_CreationDate > :min')
            ->andWhere('c.CCH_CreationDate < :max')
            ->orderBy('c.CCH_CreationDate', "asc")
            ->setParameters(['sit_id' => $sit_id, 'profile' => $profile, 'min' => $min, 'max' => $max])
            ->getQuery()
            ->getResult();
    }
}
