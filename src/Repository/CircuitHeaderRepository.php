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

    /**
     * @return CircuitHeader[]
     */
    public function findByProfileAndDate(int $sit_id, int $profile, int $begTs, int $endTs) {
        $query = $this->createQueryBuilder('c')
            ->andWhere('c.SIT_ID = :sit_id')
            ->andWhere('c.CCH_Profile = :profile');
        if ($profile == 0) {
            $query->andWhere('c.CCH_CreationDate > :min')
                ->andWhere('c.CCH_CreationDate < :max');
        } else {
            $minCondition = $query->expr()->orX()
                ->add("c.CCH_DateValMin = 0")
                ->add("c.CCH_DateValMin > :min");
            $maxCondition = $query->expr()->orX()
                ->add("c.CCH_DateValMax = 0")
                ->add("c.CCH_DateValMax < :max");
            $query->andWhere($minCondition)
                ->andWhere($maxCondition);
        }
            
        return $query->setParameters(['sit_id' => $sit_id, 'profile' => $profile, 'min' => $begTs, 'max' => $endTs])
            ->getQuery()
            ->getResult();
    }
}
