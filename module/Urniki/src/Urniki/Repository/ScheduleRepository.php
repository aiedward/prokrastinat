<?php
namespace Urniki\Repository;

use Doctrine\ORM\EntityRepository;
use Urniki\Entity\Program;
use Doctrine\ORM\PersistentCollection;

class ScheduleRepository extends EntityRepository
{
    public function getUrnik (PersistentCollection $predmeti, \Urniki\Entity\TBWeek $teden) {
        $em = $this->getEntityManager();
        
        $qb = $em->createQueryBuilder();
        
         $expr_predmet = $qb->expr()->orX();
        foreach ($predmeti as $predmet) {
            $expr_predmet->add($qb->expr()->eq('s.Course_Id', $predmet->Course_Id));
        }
        
        $qb->select('s')
            ->from('Urniki\Entity\TBSchedule', 's')
            ->where($expr_predmet)
            ->andWhere('s.Valid_From <= ?1')
            ->andWhere('s.Valid_To >= ?1')
            ->setParameter(1, $teden->Week_Id);
            
        return $qb->getQuery()->getResult();
    }
}