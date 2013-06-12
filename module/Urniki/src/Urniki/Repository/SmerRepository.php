<?php
namespace Urniki\Repository;

use Doctrine\ORM\EntityRepository;
use Urniki\Entity\Program;

class SmerRepository extends EntityRepository
{
    public function getSmeri()
    {
        $smer_q = $this->findAll();
        $smeri = array();
        
        foreach ($smer_q as $smer)
        {
            $smeri[$smer->Branch_Id] = $smer->Name;
        }
        
        return $smeri;
    }
}