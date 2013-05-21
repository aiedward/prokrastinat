<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

class UserRepository extends EntityRepository
{
    static function hashPassword($user, $password) {
        $bcrypt = new \Zend\Crypt\Password\Bcrypt();
        if ($user->enabled && $bcrypt->verify($password, $user->password))
            return true;
        else
            return false;
    }
    
    public function changePass($user, $pass)
    {
        $this->em = $this->getEntityManager();
        $bcrypt = new \Zend\Crypt\Password\Bcrypt();
        $hashed = $bcrypt->create($pass);
        $user->password = $hashed;
        $this->em->persist($user);
    }
}