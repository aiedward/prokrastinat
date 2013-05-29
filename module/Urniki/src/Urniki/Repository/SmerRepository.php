<?php
namespace Urniki\Repository;

use Doctrine\ORM\EntityRepository;
use Urniki\Entity\Program;

class SmerRepository extends EntityRepository
{
    public function getSmeri()
    {
        $em = $this->getEntityManager();
        $smer_q = $em->getRepository('Urniki\Entity\Smer')->findAll();
        $smeri = array();
        
        foreach ($smer_q as $smer)
        {
            $smeri[$smer->id] = $smer->ime;
        }
        
        return $smeri;
    }
}