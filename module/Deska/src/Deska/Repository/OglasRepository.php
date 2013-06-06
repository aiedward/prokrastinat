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
    
    public function getOglasiByKategorija($kategorija)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT o FROM Deska\Entity\Oglas o WHERE o.kategorija = :kategorija_id');
        $query->setParameter('kategorija_id', $kategorija);
        
        return $query->getResult();
    }
}
