<?php
namespace Deska\Repository;

use Doctrine\ORM\EntityRepository;

class OglasRepository extends EntityRepository
{
	public function saveOglas($oglas, array $data)
	{
		$em = $this->getEntityManager();

		//$oglas->setUser('test');
		$oglas->setNaslov($data['naslov']);
		$oglas->setVsebina($data['vsebina']);
		$oglas->setDatumObjave(new \DateTime("now"));
		$oglas->setDatumZapadlosti(\DateTime::createFromFormat('Y-d-m', $data['datum-zapadlosti']));
		$oglas->setKategorija('kategorija-test');

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
