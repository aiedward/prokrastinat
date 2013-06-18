<?php
namespace Vprasanja\Repository;

use Doctrine\ORM\EntityRepository;
use Prokrastinat\Entity\User;
use Vprasanja\Entity\Vprasanje;
use Vprasanja\Form\VprasanjeForm;

class VprasanjeRepository extends EntityRepository
{
    public function findAllNew()
    {
        return $this->findBy(array(), array('datum_objave' => 'DESC'));
    }

    public function findTopWeekly()
    {
        $start = new \DateTime();
        $end = new \DateTime();
        $start->setTimestamp(strtotime('this week', time()));
        $start->setTime(0, 0, 0);
        $end->setTimestamp(strtotime('next week', time()));
        $end->setTime(0, 0, 0);

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('v')
           ->from('Vprasanja\Entity\Vprasanje', 'v')
           ->where("v.datum_objave BETWEEN :start AND :end")
           ->orderBy('v.rating', 'DESC')
           ->setParameter('start', $start)
           ->setParameter('end', $end);
        return $qb->getQuery()->getResult();
    }

    public function findTopMonthly()
    {
        $start = new \DateTime();
        $end = new \DateTime();
        $start->setTimestamp(strtotime('this month', time()));
        $start->setTime(0, 0, 0);
        $end->setTimestamp(strtotime('next month', time()));
        $end->setTime(0, 0, 0);

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('v')
           ->from('Vprasanja\Entity\Vprasanje', 'v')
           ->where("v.datum_objave BETWEEN :start AND :end")
           ->orderBy('v.rating', 'DESC')
           ->setParameter('start', $start)
           ->setParameter('end', $end);
        return $qb->getQuery()->getResult();
    }

    public function dodaj(Vprasanje $vprasanje, User $user, VprasanjeForm $form)
    {
        $vprasanje->user = $user;
        $vprasanje->naslov = $form->get('naslov')->getValue();
        $vprasanje->vsebina = $form->get('vsebina')->getValue();
        $vprasanje->datum_objave = new \DateTime("now");
        $vprasanje->rating = 0;
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