<?php

namespace Prokrastinat\Identity;

use InvalidArgumentException;

class ProkrastinatIdentity implements \ZfcRbac\Identity\IdentityInterface
{
    /**
     * Array of roles.
     *
     * @var array
     */
    protected $roles;
    
    public function __construct($sm)
    {
        $auth = $sm->get('Prokrastinat\Authentication\AuthenticationService');
        
        if (!$auth->hasIdentity())
            return (array) 'anonymous';
        
        $id = $auth->getIdentity();
        
        $roles = array();
        foreach ($id->roles as $role) {
            do {
               array_push($roles, $role->name); 
            }
            while ($role = $role->parent_role);
        }
        $this->roles = $roles;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
