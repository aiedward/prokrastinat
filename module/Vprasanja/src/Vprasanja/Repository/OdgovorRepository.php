<?php
namespace Vprasanja\Repository;

use Doctrine\ORM\EntityRepository;
use Prokrastinat\Entity\User;
use Vprasanja\Entity\Vprasanje;
use Vprasanja\Entity\Odgovor;
use Vprasanja\Form\OdgovorForm;

class OdgovorRepository extends EntityRepository
{
    public function dodaj(Odgovor $odgovor, Vprasanje $vprasanje, User $user, OdgovorForm $form)
    {
        $odgovor->user = $user;
        $odgovor->objava = $vprasanje;
        $odgovor->vsebina = $form->get('vsebina')->getValue();
        $odgovor->datum_objave = new \DateTime("now");
        $odgovor->rating = 0;
        $this->getEntityManager()->persist($odgovor);
    }

    public function uredi(Odgovor $odgovor, OdgovorForm $form)
    {
        $odgovor->vsebina = $form->get('vsebina')->getValue();
        $this->getEntityManager()->persist($odgovor);
    }

    public function brisi(Odgovor $odgovor)
    {
        $this->getEntityManager()->remove($odgovor);
    }

    public function vote(Odgovor $odgovor, User $user)
    {
        if (!$odgovor->users_rated->contains($user)) {
            $odgovor->users_rated->add($user);
            $odgovor->rating++;
        }
        $this->getEntityManager()->persist($odgovor);
    }

    public function unvote(Odgovor $odgovor, User $user)
    {
        if ($odgovor->users_rated->contains($user)) {
            $odgovor->users_rated->removeElement($user);
            $odgovor->rating--;
        }
        $this->getEntityManager()->persist($odgovor);
    }
}