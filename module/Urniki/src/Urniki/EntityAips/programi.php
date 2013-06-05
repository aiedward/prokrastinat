<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class programi extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $PredmetnikID;

	/** @ORM\Column(type="integer") */
	protected $SolskoLeto;

	/** @ORM\Column(type="integer") */
	protected $CenterStudijaID;

	/** @ORM\Column(type="integer") */
	protected $VrstaStudijaID;

	/** @ORM\Column(type="integer") */
	protected $NacinStudijaID;

	/** @ORM\Column(type="integer") */
	protected $ProgramID;

	/** @ORM\Column(length=60) */
	protected $NazivPredmetnika;

	/** @ORM\Column(length=20) */
	protected $KraticaPredmetnika;

	/** @ORM\Column(length=4) */
	protected $Zaporedje;

	/** @ORM\Column(length=1) */
	protected $SeIzvaja;

	/** @ORM\Column(length=150) */
	protected $Opombe;

	/** @ORM\Column(length=1) */
	protected $ObjaviNaSpletu;

}
