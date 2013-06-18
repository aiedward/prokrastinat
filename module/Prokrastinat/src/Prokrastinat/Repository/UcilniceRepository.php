<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Prokrasinat\Entity\Ucilnice;

class UcilniceRepository extends EntityRepository
{
    public function getRooms($map)
    {
        $ucilnice = $this->findBy(array(
            'mapa' => $map));
        $ucArray = array();
        
        foreach ($ucilnice as $uc)
        {
            $ucArray[$uc->id] = $uc->ime;
        }
        $ucArray["all"] = "Vse";
        
        return $ucArray;
    }
}