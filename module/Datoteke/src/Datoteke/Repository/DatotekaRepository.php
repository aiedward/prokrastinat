<?php
namespace Datoteke\Repository;

use Doctrine\ORM\EntityRepository;
use Prokrastinat\Entity\Datoteka;
use Zend\Stdlib\DateTime;

class DatotekaRepository extends EntityRepository
{
    public function increaseDownloadCounter($datoteka) {
        $datoteka->st_prenosov += 1;
        $this->em = $this->getEntityManager();
        $this->em->persist($datoteka);
    }
    
    public function increaseViewCounter(Datoteka $datoteka) {
        $datoteka->st_ogledov += 1;
        $this->em = $this->getEntityManager();
        $this->em->persist($datoteka);
    }
    
    public function deleteDatoteka(Datoteka $datoteka) {
        $this->em = $this->getEntityManager();
        $this->em->remove($datoteka);
    }
    
    public function saveDatoteka($formData) {

    }
    
}