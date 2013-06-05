<?php
namespace Novice\Repository;

use Doctrine\ORM\EntityRepository;

class NovicaRepository extends EntityRepository
{
    public function getLastNovice($stevilo)
    {
        $this->em = $this->getEntityManager();
        $query = $this->em->createQuery("SELECT n FROM Novice\Entity\Novica n");
        $query->setMaxResults($stevilo);
        $novice = $query->getResult();
        return $novice;
    }
}