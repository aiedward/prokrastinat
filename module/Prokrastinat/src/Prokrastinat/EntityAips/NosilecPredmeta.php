<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class NosilecPredmeta extends BaseEntity
{
	/** @ORM\Column(type="decimal") */
	protected $NosilecPredmetaID;

	/** @ORM\Column(type="decimal") */
	protected $ZavodID;

	/** @ORM\Column(type="decimal") */
	protected $PredmetID;

	/** @ORM\Column(type="decimal") */
	protected $ZaposleniID;

	/** @ORM\Column(type="decimal") */
	protected $ZaporednaStevilka;

	/** @ORM\Column(length=50) */
	protected $Funkcija;

}
