<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class Profesor extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $ZaposleniID;

	/** @ORM\Column(length=10) */
	protected $Sifra;

	/** @ORM\Column(length=13) */
	protected $EMSO;

	/** @ORM\Column(length=50) */
	protected $PriimekIme;

	/** @ORM\Column(length=10) */
	protected $Naziv;

	/** @ORM\Column(length=20) */
	protected $Habilitacija;

	/** @ORM\Column(length=1) */
	protected $Aktiven;

	/** @ORM\Column(type="integer") */
	protected $GovorilneDan;

	/** @ORM\Column(type="Datetime") */
	protected $GovorilneUraOd;

	/** @ORM\Column(type="Datetime") */
	protected $GovorilneUraDo;

	/** @ORM\Column(type="integer") */
	protected $Govorilne2Dan;

	/** @ORM\Column(type="Datetime") */
	protected $Govorilne2UraOd;

	/** @ORM\Column(type="Datetime") */
	protected $Govorilne2UraDo;

	/** @ORM\Column(length=10) */
	protected $GovorilneProstor;

	/** @ORM\Column(length=20) */
	protected $GovorilneTelefon;

	/** @ORM\Column(length=50) */
	protected $GovorilneEmail;

	/** @ORM\Column(length=50) */
	protected $GovorilneURL;

	/** @ORM\Column(length=5) */
	protected $SifraK;

	/** @ORM\Column(length=1) */
	protected $ObstajaVK;

	/** @ORM\Column(type="integer") */
	protected $NoviZaposleniID;

	/** @ORM\Column(length=10) */
	protected $SifraA;

	/** @ORM\Column(length=2) */
	protected $MaticnaFakultetaID;

	/** @ORM\Column(length=50) */
	protected $Priimek;

	/** @ORM\Column(length=50) */
	protected $Ime;

	/** @ORM\Column(length=1) */
	protected $ObstajaVKIS;

	/** @ORM\Column(length=10) */
	protected $SifraKIS;

}
