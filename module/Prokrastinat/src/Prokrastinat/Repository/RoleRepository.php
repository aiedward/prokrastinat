<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Prokrasinat\Entity\Role;

class RoleRepository extends EntityRepository
{
    public function getRoles()
    {
        $roles = $this->findAll();
        $roArray = array();
        
        foreach ($roles as $role)
        {
            $roArray[$role->id] = $role->name;
        }
        
        return $roArray;
    }
}