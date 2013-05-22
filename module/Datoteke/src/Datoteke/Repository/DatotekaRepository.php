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
    
    public function increaseViewCounter($datoteka) {
        $datoteka->st_ogledov += 1;
        $this->em = $this->getEntityManager();
        $this->em->persist($datoteka);
    }
    
    public function deleteDatoteka($datoteka) {
        $this->em = $this->getEntityManager();
        $this->em->remove($datoteka);
    }
    
    public function downloadDatoteka($dat, &$response) {
        $file = $_SERVER['DOCUMENT_ROOT'] .'prokrastinat/data/uploads/'.$dat->randomImeDatoteke;

        if(!file_exists($file)) {

        }
        else{
            $fileContents = file_get_contents($file);
            
            $response->setContent($fileContents);

            $headers = $response->getHeaders();

            $headers->clearHeaders()
                ->addHeaderLine('Content-Type', 'application/octet-stream')
                ->addHeaderLine('Content-Disposition', 'attachment; filename="' . $dat->imeDatoteke . '"')
                ->addHeaderLine('Content-Length', strlen($fileContents));

            return $response;
        }
    }
    
    public function saveDatoteka($formData) {

    }
    
}