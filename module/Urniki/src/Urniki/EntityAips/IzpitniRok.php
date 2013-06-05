<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class IzpitniRok extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $IzpitniRokID;

	/** @ORM\Column(length=2) */
	protected $ZavodID;

	/** @ORM\Column(type="integer") */
	protected $SolskoLeto;

	/** @ORM\Column(type="Datetime") */
	protected $DatumRoka;

	/** @ORM\Column(type="Datetime") */
	protected $RokPrijave;

	/** @ORM\Column(type="integer") */
	protected $ProfesorID;

	/** @ORM\Column(length=10) */
	protected $KrajIzvajanja;

	/** @ORM\Column(length=1) */
	protected $TipRoka;

	/** @ORM\Column(length=1) */
	protected $Komisijski;

	/** @ORM\Column(type="integer") */
	protected $VrstaStudijaID;

	/** @ORM\Column(length=1) */
	protected $DoPodiplomski;

	/** @ORM\Column(type="integer") */
	protected $IzvajalecID;

	/** @ORM\Column(type="Datetime") */
	protected $UraIzvedbe;

	/** @ORM\Column(length=100) */
	protected $Opomba;

	/** @ORM\Column(type="Datetime") */
	protected $DatumOdjave;

	/** @ORM\Column(type="integer") */
	protected $StariIRID;

	/** @ORM\Column(type="Datetime") */
	protected $DatumObjaveRezultata;

	/** @ORM\Column(length=1) */
	protected $ObjaviNaSpletu;

}
