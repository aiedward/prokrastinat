<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class NacinStudija extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $NacinStudijaID;

	/** @ORM\Column(length=10) */
	protected $KodaNacinaStudija;

	/** @ORM\Column(length=30) */
	protected $OpisNacinaStudija;

	/** @ORM\Column(length=10) */
	protected $KodaNacinaStudijaA;

	/** @ORM\Column(length=30) */
	protected $OpisNacinaStudijaA;

}
