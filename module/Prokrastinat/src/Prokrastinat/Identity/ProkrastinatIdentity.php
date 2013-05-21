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
        $roles = array();

        if ($auth->hasIdentity()) {
            $id = $auth->getIdentity();
            foreach ($id->roles as $role) {
                array_push($roles, $role->name);
            }
        } else {
            array_push($roles, 'anonymous');
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
