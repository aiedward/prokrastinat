<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

class PredmetRepository extends EntityRepository
{
	public function findByZavodi($zavodi)
	{
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('MAX(p.NazivPredmeta) AS NazivPredmeta')
           ->from('Prokrastinat\EntityAips\Predmet', 'p')
           ->where("p.Aktiven = 'D'")
           ->andWhere($qb->expr()->in('p.ZavodID', $zavodi))
           ->groupBy('p.NazivPredmeta');

        return $qb->getQuery()->getResult();
	}
}