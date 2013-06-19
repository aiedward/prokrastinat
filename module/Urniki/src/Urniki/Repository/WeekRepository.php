<?php
namespace Urniki\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class WeekRepository extends EntityRepository
{
    public function getWeek(\DateTime $datum)
    {
        $res = $this->getEntityManager()->createQuery("SELECT w FROM Urniki\Entity\TBWeek w"
            . " WHERE w.First_Day <= ?1 AND w.Last_Day >= ?1")
            ->setParameter(1, $datum->format('Y-m-d'))
            ->getResult();
        
        return count($res) ? $res[0] : null;
    }
    
}