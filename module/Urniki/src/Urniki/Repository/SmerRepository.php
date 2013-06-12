<?php
namespace Urniki\Repository;

use Doctrine\ORM\EntityRepository;
use Urniki\Entity\Program;

class SmerRepository extends EntityRepository
{
    public function getSmeri($program)
    {
        $smer_q = $this->findBy(array(
            'Program_Id' => $program));
        $smeri = array();
        
        foreach ($smer_q as $smer)
        {
            $smeri[$smer->Branch_Id] = $smer->Name;
        }
        
        return $smeri;
    }
}