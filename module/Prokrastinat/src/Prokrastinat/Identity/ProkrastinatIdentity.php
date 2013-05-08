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
        $id = $auth->getIdentity();
        
        $roles = $id->roles;
        return $roles;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
