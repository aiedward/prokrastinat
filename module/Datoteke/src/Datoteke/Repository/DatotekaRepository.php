<?php
namespace Datoteke\Repository;

use Doctrine\ORM\EntityRepository;
use Prokrastinat\Entity\Datoteka;

class DatotekaRepository extends EntityRepository
{
    public function increaseDownloadCounter(Datoteka $datoteka) {
        $datoteka->st_prenosov += 1;
        $em = $this->getEntityManager();
        $em->persist($datoteka);
    }
    
    public function increaseViewCounter(Datoteka $datoteka) {
        $datoteka->st_ogledov += 1;
        $em = $this->getEntityManager();
        $em->persist($datoteka);
    }
    
    public function deleteDatoteka(Datoteka $datoteka) {
        $em = $this->getEntityManager();
        $em->remove($datoteka);
    }
    
    public function saveDatoteka(Datoteka $datoteka, array $data) {
        $em = $this->getEntityManager();
        $datoteka = new \Datoteke\Entity\Datoteka();
        $datoteka->opis = $form->get('opis')->getValue();
        $datoteka->imeDatoteke = $form->get('fileupload')->getValue();
        $datoteka->datum_uploada = new DateTime('now');
        $datoteka->st_prenosov = 0;
        $datoteka->st_ogledov = 0;
        $datoteka->velikost = $File['size'];
        $datoteka->user = $this->auth->getIdentity();
    
        $em->persist($datoteka);
    }
    
}