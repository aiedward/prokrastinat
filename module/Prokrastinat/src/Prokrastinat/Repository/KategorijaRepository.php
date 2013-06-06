<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Prokrastinat\Entity\Kategorija;

class KategorijaRepository extends EntityRepository
{
    public function saveKategorija(Kategorija $kategorija, array $data)
    {
        $em = $this->getEntityManager();
        $kategorija->ime = $data['ime'];
        $em->persist($kategorija);
    }
    
    public function getKategorije()
    {
        $em = $this->getEntityManager();
        $kategorije = $em->getRepository('Prokrastinat\Entity\Kategorija')->findAll();
        
        return $kategorije;
    }
    
    public function getKategorijeInArray()
    {
        $kategorije = $this->getKategorije();        
        $options = array();

        foreach ($kategorije as $kat) {
            $options[$kat->id] = $kat->ime;
        }
        
        return $options;
    }
}