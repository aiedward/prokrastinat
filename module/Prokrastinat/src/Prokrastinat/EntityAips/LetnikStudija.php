<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class LetnikStudija extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $LetnikStudijaID;

	/** @ORM\Column(type="string1252", length=10) */
	protected $KodaLetnikaStudija;

	/** @ORM\Column(type="string1252", length=50) */
	protected $OpisLetnikaStudija;

	/** @ORM\Column(type="string1252", length=10) */
	protected $KodaLetnikaStudijaA;

	/** @ORM\Column(type="string1252", length=50) */
	protected $OpisLetnikaStudijaA;

}
