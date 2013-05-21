<?php
namespace Deska\Repository;

use Doctrine\ORM\EntityRepository;
use Deska\Entity\Oglas;

class OglasRepository extends EntityRepository
{
    public function saveOglas(Oglas $oglas, array $data) 
    {
        $em = $this->getEntityManager();

        $oglas->user = ($data['user']);
        $oglas->naslov = ($data['naslov']);
        $oglas->vsebina = ($data['vsebina']);
        $oglas->datum_objave = (new \DateTime("now"));
        $oglas->datum_zapadlosti = (\DateTime::createFromFormat('Y-m-d', $data['datum-zapadlosti']));
        $oglas->kategorija = ($data['kategorija']);

        $em->persist($oglas);
    }
    
    public function getKategorije()
    {
        $em = $this->getEntityManager();
        $kategorija = $em->getRepository('Prokrastinat\Entity\Kategorija')->findAll();
        $options = array();

        foreach ($kategorija as $kat) {
            $options[$kat->id] = $kat->ime;
        }
        
        return $options;
    }
}
