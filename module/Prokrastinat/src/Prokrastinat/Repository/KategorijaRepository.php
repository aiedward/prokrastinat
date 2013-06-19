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
    
    public function getKategorijeInArray()
    {
        $em = $this->getEntityManager();
        $kategorije = $em->getRepository('Prokrastinat\Entity\Kategorija')->findAll();        
        $options = array();

        foreach ($kategorije as $kat) {
            $options[$kat->id] = $kat->ime;
        }
        
        return $options;
    }

    public function search($query)
    {
        $qb = $this->getEntityManager()->createQueryBuilder('k');
        $qb->select('k')
           ->from('Prokrastinat\Entity\Kategorija', 'k')
           ->where('k.ime LIKE :ime')
           ->setParameter('ime', "%{$query}%");

        return $qb->getQuery()->getResult();
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

    public function getKategorijeByList($list_id)
    {
        $result = array();

        foreach ($list_id as $id) {
            $kategorija = $this->find($id);
            if ($kategorija) {
                array_push($result, $kategorija);
            }
        }

        return $result;
    }

    private function capitalize($string, $encoding)
    {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);
        return mb_strtoupper($firstChar, $encoding) . mb_strtolower($then, $encoding);
    }
}