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

    public function update($predmeti)
    {
        $kategorija_list = array();
        $kategorije = $this->findAll();
        foreach ($kategorije as $kategorija) {
            array_push($kategorija_list, $this->capitalize($kategorija->ime, 'utf-8'));
        }

        foreach ($predmeti as $predmet) {
            $ime = $this->capitalize($predmet['NazivPredmeta'], 'utf-8');
            if (!in_array($ime, $kategorija_list)) {
                $kategorija = new Kategorija();
                $kategorija->ime = $ime;
                $this->getEntityManager()->persist($kategorija);
            }
        }
    }

    private function capitalize($string, $encoding)
    {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);
        return mb_strtoupper($firstChar, $encoding) . mb_strtolower($then, $encoding);
    }
}