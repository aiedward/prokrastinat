<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class VrstaStudija extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $VrstaStudijaID;

	/** @ORM\Column(type="string1252", length=1) */
	protected $SifraVrsteStudija;

	/** @ORM\Column(type="string1252", length=10) */
	protected $KraticaVrsteStudija;

	/** @ORM\Column(type="string1252", length=40) */
	protected $OpisVrsteStudija;

	/** @ORM\Column(type="string1252", length=10) */
	protected $KraticaVrsteStudijaA;

	/** @ORM\Column(type="string1252", length=40) */
	protected $OpisVrsteStudijaA;

	/** @ORM\Column(type="string1252", length=2) */
	protected $KodaVrsteStudija;

	/** @ORM\Column(type="string1252", length=2) */
	protected $StopnjaStudija;

}
