<?php
namespace Vprasanja\Repository;

use Doctrine\ORM\EntityRepository;
use Vprasanja\Entity\StackVprasanje;

class StackVprasanjeRepository extends EntityRepository
{
    public function findTopWeekly()
    {
        $start = new \DateTime();
        $end = new \DateTime();
        $start->setTimestamp(strtotime('this week', time()));
        $start->setTime(0, 0, 0);
        $end->setTimestamp(strtotime('next week', time()));
        $end->setTime(0, 0, 0);

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('v')
           ->from('Vprasanja\Entity\StackVprasanje', 'v')
           ->where("v.datum_objave BETWEEN :start AND :end")
           ->orderBy('v.rating', 'DESC')
           ->setParameter('start', $start)
           ->setParameter('end', $end);
        return $qb->getQuery()->getResult();
    }
}