<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

use Prokrastinat\Entity\Beseda;
use Prokrastinat\Entity\ObjavaBeseda;

class BesedaRepository extends EntityRepository
{
    public function search($list)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('b')
           ->from('Prokrastinat\Entity\ObjavaBeseda', 'b')
           ->where('b.beseda = ?0');

        for ($i = 1; $i < count($list); $i++) {
            $qb->orWhere('b.beseda = ?' . $i);
        }

        $qb->setParameters($list);
        return $qb->getQuery()->getResult();
    }
}