<?php
namespace Deska\Repository;

use Doctrine\ORM\EntityRepository;

class OglasRepository extends EntityRepository
{
    public function saveOglas($oglas, array $data) 
    {
        $em = $this->getEntityManager();

        $oglas->user = ($data['user']);
        $oglas->naslov = ($data['naslov']);
        $oglas->vsebina = ($data['vsebina']);
        $oglas->datum_objave = (new \DateTime("now"));
        $oglas->datum_zapadlosti = (\DateTime::createFromFormat('Y-m-d', $data['datum-zapadlosti']));
        $oglas->kategorija = null;

        $em->persist($oglas);
        $em->flush();
    }

    public function getOglasById($id) 
    {
        $em = $this->getEntityManager();
        $oglas = $em->find('Deska\Entity\Oglas', $id);

        return $oglas;
    }
}
