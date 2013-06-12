<?php
namespace Datoteke\Repository;

use Doctrine\ORM\EntityRepository;

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
        unlink(dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data/uploads/'.$datoteka->randomImeDatoteke);
    }
    
    public function downloadDatoteka($dat, &$response) {
        $file = (dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data/uploads/'.$dat->randomImeDatoteke);

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
    
    public function saveDatoteka($formData, $user) {
        $em = $this->getEntityManager();
        $file = new \Datoteke\Entity\Datoteka();
        $file->opis = $formData['opis'];
        $file->imeDatoteke = $formData['file']['name'];
        $file->datum_uploada = (new \DateTime("now"));
        $file->st_prenosov = 0;
        $file->st_ogledov = 0;
        $file->velikost = $formData['file']['size'];
        $file->user = $user;
        $file->kategorija = $em->find('Prokrastinat\Entity\Kategorija', $formData['kategorija']);
                    
        $keys = parse_url($formData['file']['tmp_name']);
        $path = explode("/", $keys['path']);
        $last = end($path);
        $file->randomImeDatoteke = $last;
                    
        $em->persist($file);
                    
    }
    
    public function getUploadSize($user)
    {
        $this->em = $this->getEntityManager();
        $query = $this->em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d WHERE d.user=".$user->id);
        $datoteke = $query->getResult(); 
        $skupna_velikost = 0;
        foreach ($datoteke as $row)
        {
            $skupna_velikost += $row->velikost;            
        }
        return $skupna_velikost;
    }
    
}