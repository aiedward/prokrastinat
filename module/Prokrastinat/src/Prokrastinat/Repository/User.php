<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

class User extends EntityRepository
{
    static function hashPassword($user, $password) {
        $bcrypt = new \Zend\Crypt\Password\Bcrypt();
        if ($user->enabled && $bcrypt->verify($password, $user->password))
            return true;
        else
            return false;
    }
}