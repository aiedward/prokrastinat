<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

use Prokrastinat\Entity\Beseda;
use Prokrastinat\Entity\ObjavaBeseda;

class BesedaRepository extends EntityRepository
{
    public function getBesede(array $iskano) {
        $besede = array();
        foreach ($iskano as $b) {
            array_push($besede, $this->findOneBy(array('beseda' => $b)));
        }
        
        return $besede;
    }
    public function search($list)
    {//var_dump($list); die;
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('b')
           ->from('Prokrastinat\Entity\ObjavaBeseda', 'b')
           ->where('b.beseda = ?0')
                ->setParameter(0, $list[0]);

        for ($i = 1; $i < count($list); $i++) {
            $qb->orWhere('b.beseda = ?' . $i)
                ->setParameter($i, $list[$i]);
        }

        $qb->setParameters($list);
        return $qb->getQuery()->getResult();
    }
}