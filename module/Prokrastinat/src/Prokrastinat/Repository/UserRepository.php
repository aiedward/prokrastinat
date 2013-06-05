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
    
    public function updateUser($user, $form)
    {
        $this->em = $this->getEntityManager();
        
        if ($val = $form->get('ime')->getValue())
            $user->ime = $val;
        if ($val = $form->get('priimek')->getValue())
            $user->priimek = $val;
        if ($val = $form->get('vpisna_st')->getValue())
            $user->vpisna_st = $val;
            
        $user->email = $form->get('email')->getValue();
        $user->naslov = $form->get('naslov')->getValue();
        $user->mesto = $form->get('mesto')->getValue();
        $user->drzava = $form->get('drzava')->getValue();
        $user->opis = $form->get('opis')->getValue();
        $user->splet = $form->get('splet')->getValue();
        $user->telefon = $form->get('telefon')->getValue();
            
        $this->em->persist($user);
    }
}