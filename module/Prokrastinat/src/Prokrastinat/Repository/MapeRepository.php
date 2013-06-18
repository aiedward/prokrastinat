<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Prokrasinat\Entity\Mape;

class MapeRepository extends EntityRepository
{
    public function getMaps()
    {
        $maps = $this->findAll();
        $mapArray = array();
        
        foreach ($maps as $map)
        {
            $mapArray[$map->id] = $map->ime;
        }
        
        return $mapArray;
    }
}