<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Crypt\Password\Bcrypt;
use Prokrastinat\Entity\User;

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
        if ($roles = $form->get('vloge')->getValue())
        {
            foreach($roles as $role)
            {
                $exists = false;
                foreach($user->roles as $uroles)
                {
                    if($role == $uroles->id)
                        $exists = true;
                }
                if(!$exists)
                {
                    $newRole = $this->em->find('Prokrastinat\Entity\Role', $role);
                    $user->roles->add($newRole);
                }
            }
            $roleArray = array();
            foreach($user->roles as $uroles)
            {
                array_push($roleArray, "$uroles->id");
            }
            $results = array_diff($roleArray, $roles);
            foreach($results as $res)
            {
                $remRole = $this->em->find('Prokrastinat\Entity\Role', $res);
                $user->roles->removeElement($remRole);
            }
        }
        $authenticator = false;
        if($form->get('authenticator')->isChecked())
            $authenticator = true;
        $user->authentiator = $authenticator;   
            
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

        $p = explode(' ', $aips_user->PriimekIme);
        $user->ime = mb_convert_case(array_pop($p), MB_CASE_TITLE, "UTF-8");
        $user->priimek = mb_convert_case(implode(' ', $p), MB_CASE_TITLE, "UTF-8");
        
        $user->authenticator = false;
        $secret = "";
        for($i=0; $i < 32; $i++)
        {
            $tempnum = rand(16, 255);
            $secret = $secret . dechex($tempnum);
        }
        
        $user->secretKey = $secret;

        $this->changePass($user, $aips_user->Geslo);
        $this->em->persist($user);
    }
    
    public function addUser($form)
    {
        $user = new User();
        $this->em = $this->getEntityManager();
        
        if ($val = $form->get('ime')->getValue())
            $user->ime = $val;
        if ($val = $form->get('priimek')->getValue())
            $user->priimek = $val;
        if ($val = $form->get('vpisna_st')->getValue())
            $user->vpisna_st = $val;
        if ($roles = $form->get('vloge')->getValue())
        {
            foreach($roles as $role)
            {
                $exists = false;
                foreach($user->roles as $uroles)
                {
                    if($role == $uroles->id)
                        $exists = true;
                }
                if(!$exists)
                {
                    $newRole = $this->em->find('Prokrastinat\Entity\Role', $role);
                    $user->roles->add($newRole);
                }
            }
            $roleArray = array();
            foreach($user->roles as $uroles)
            {
                array_push($roleArray, "$uroles->id");
            }
            $results = array_diff($roleArray, $roles);
            foreach($results as $res)
            {
                $remRole = $this->em->find('Prokrastinat\Entity\Role', $res);
                $user->roles->removeElement($remRole);
            }
        }
        $bcrypt = new Bcrypt();
        $hashed = $bcrypt->create($form->get('geslo')->getValue());
        $user->password = $hashed;
        
        $user->username = $form->get('uporabnisko')->getValue();    
        $user->email = $form->get('email')->getValue();
        $user->naslov = $form->get('naslov')->getValue();
        $user->mesto = $form->get('mesto')->getValue();
        $user->drzava = $form->get('drzava')->getValue();
        $user->opis = $form->get('opis')->getValue();
        $user->splet = $form->get('splet')->getValue();
        $user->telefon = $form->get('telefon')->getValue();
        $user->authenticator = false;
        
        $secret = "";
        for($i=0; $i < 32; $i++)
        {
            $tempnum = rand(16, 255);
            $secret = $secret . dechex($tempnum);
        }
        
        $user->secretKey = $secret;
        
            
        $this->em->persist($user);
        $this->em->flush();
        return $user->id;
    }
    
    public function generateAuthcode($user)
    {
        $hexkey = $user->secretKey;
        $time = time() - (time() % 60);
        $hextime = base_convert($time, 10, 16);
        $authcode = crc32(hex2bin($hexkey) . strrev(hex2bin($hextime)));
        $authstring = sprintf("%u",$authcode);
        var_dump($hexkey);
        return $authstring;
    }

    public function imaKategorijo($user, $ime)
    {
        foreach ($user->kategorije as $kategorija) {
            if ($kategorija->ime == $ime)
                return true;
        }

        return false;
    }

    public function posodobiKategorije($user, $kategorije)
    {
        $user->kategorije->clear();

        foreach ($list as $id) {

        }
    }
}