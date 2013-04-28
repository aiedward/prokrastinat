<?php
namespace Datoteke\Repository;

use Doctrine\ORM\EntityRepository;


class Datoteka extends EntityRepository
{
    public function increaseCounter($datoteka) {
        $datoteka->st_prenosov += 1;
        $em = $this->getEntityManager();
        $em->persist($datoteka);
        $em->flush();
    }
}