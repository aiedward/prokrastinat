<?php
namespace Deska\Entity;

use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Objava;

/** @ORM\Entity(repositoryClass="Deska\Repository\OglasRepository") */
class Oglas extends Objava
{
	/**
	 * @ORM\Column(type="date")
	 */
	protected $datum_zapadlosti;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $kategorija;	// to-do: uporabi entiteto Kategorija

	public function setDatumZapadlosti($datum_zapadlosti)
	{
		$this->datum_zapadlosti = $datum_zapadlosti;
	}

	public function getDatumZapadlosti()
	{
		return $this->datum_zapadlosti;
	}

	public function setKategorija($kategorija)
	{
		$this->kategorija = $kategorija;
	}

	public function getKategorija()
	{
		return $this->kategorija;
	}
}
