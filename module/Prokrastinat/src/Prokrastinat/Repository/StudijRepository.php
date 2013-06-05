<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

class StudijRepository extends EntityRepository
{
    public function getStudij($user) {
        $qb = new \Doctrine\ORM\QueryBuilder();
        $q = $qb->select('s')
            ->from('\Prokrastinat\EntityAips\Studij', 's')
            ->where('s.VpisnaStevilka = ?1')
            ->setParameter(1, $user->vpisna_st);
        
        $result = $q->getResult();
        return $result;
    }
}