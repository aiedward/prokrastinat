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

	/** @ORM\Column(length=1) */
	protected $SifraVrsteStudija;

	/** @ORM\Column(length=10) */
	protected $KraticaVrsteStudija;

	/** @ORM\Column(length=40) */
	protected $OpisVrsteStudija;

	/** @ORM\Column(length=10) */
	protected $KraticaVrsteStudijaA;

	/** @ORM\Column(length=40) */
	protected $OpisVrsteStudijaA;

	/** @ORM\Column(length=2) */
	protected $KodaVrsteStudija;

	/** @ORM\Column(length=2) */
	protected $StopnjaStudija;

}
