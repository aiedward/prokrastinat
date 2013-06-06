<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Crypt\Password\Bcrypt;

class UserRepository extends EntityRepository
{
    static function hashPassword($user, $password) {
        $bcrypt = new Bcrypt();
        if ($user->enabled && $bcrypt->verify($password, $user->password))
            return true;
        else
            return false;
    }
    
    public function changePass($user, $pass)
    {
        $bcrypt = new Bcrypt();
        $hashed = $bcrypt->create($pass);
        $user->password = $hashed;
        $this->em = $this->getEntityManager();
        $this->em->persist($user);
    }
    
    public function updateUser(\Prokrastinat\Entity\User $user, $form)
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

    public function syncUser(\Prokrastinat\EntityAips\Studij $aips_user, \Prokrastinat\Entity\User $user)
    {
        $user->username = $aips_user->VpisnaStevilka;
        $user->vpisna_st = $aips_user->VpisnaStevilka;

        // to-do: pls unbork thx
        $user->ime = strtok($aips_user->PriimekIme, " ");
        $user->priimek = $aips_user->PriimekIme; // fuck php

        $this->changePass($user, $aips_user->Geslo);
        $this->em->persist($user);
    }
}