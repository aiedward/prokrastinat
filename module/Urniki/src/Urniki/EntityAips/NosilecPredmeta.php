<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class NosilecPredmeta extends BaseEntity
{
	/** @ORM\Column(type="Decimal") */
	protected $NosilecPredmetaID;

	/** @ORM\Column(type="Decimal") */
	protected $ZavodID;

	/** @ORM\Column(type="Decimal") */
	protected $PredmetID;

	/** @ORM\Column(type="Decimal") */
	protected $ZaposleniID;

	/** @ORM\Column(type="Decimal") */
	protected $ZaporednaStevilka;

	/** @ORM\Column(length=50) */
	protected $Funkcija;

}
