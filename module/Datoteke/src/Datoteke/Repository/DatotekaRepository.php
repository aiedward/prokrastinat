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
        $file = new \Datoteke\Entity\Datoteka();
                    $file->opis = $form->get('opis')->getValue();
                    $file->imeDatoteke = $form->get('fileupload')->getValue();
                    $file->datum_uploada = new DateTime('now');
                    $file->st_prenosov = 0;
                    $file->st_ogledov = 0;
                    $file->velikost = $File['size'];
                    $file->user = $this->auth->getIdentity();
    
                    $objectManager->persist($file);
    }
    
}