<?php
namespace Datoteke\Repository;

use Doctrine\ORM\EntityRepository;


class DatotekaRepository extends EntityRepository
{
    public function increaseCounter($datoteka) {
        $datoteka->st_prenosov += 1;
        $em = $this->getEntityManager();
        $em->persist($datoteka);
    }
    
    public function deleteDatoteka($datoteka) {
        $em = $this->getEntityManager();
        $em->remove($datoteka);
    }
    
}