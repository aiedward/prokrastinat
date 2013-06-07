<?php
namespace Vprasanja\Repository;

use Doctrine\ORM\EntityRepository;
use Prokrastinat\Entity\User;
use Vprasanja\Entity\Vprasanje;
use Vprasanja\Form\VprasanjeForm;

class VprasanjeRepository extends EntityRepository
{
    public function dodaj(Vprasanje $vprasanje, User $user, VprasanjeForm $form)
    {
        $vprasanje->user = $user;
        $vprasanje->naslov = $form->get('naslov')->getValue();
        $vprasanje->vsebina = $form->get('vsebina')->getValue();
        $vprasanje->datum_objave = new \DateTime("now");
        $this->getEntityManager()->persist($vprasanje);
    }

    public function uredi(Vprasanje $vprasanje, VprasanjeForm $form)
    {
        $vprasanje->naslov = $form->get('naslov')->getValue();
        $vprasanje->vsebina = $form->get('vsebina')->getValue();
        $this->getEntityManager()->persist($vprasanje);
    }

    public function brisi(Vprasanje $vprasanje)
    {
        $this->getEntityManager()->remove($vprasanje);
    }

    public function vote(Vprasanje $vprasanje, User $user)
    {
        if (!$vprasanje->users_rated->contains($user)) {
            $vprasanje->users_rated->add($user);
            $vprasanje->rating++;
        }
        $this->getEntityManager()->persist($vprasanje);
    }

    public function unvote(Vprasanje $vprasanje, User $user)
    {
        if ($vprasanje->users_rated->contains($user)) {
            $vprasanje->users_rated->removeElement($user);
            $vprasanje->rating--;
        }
        $this->getEntityManager()->persist($vprasanje);
    }
}