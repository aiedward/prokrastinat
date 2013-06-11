<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class PodatekPredmeta extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $PredmetID;

	/** @ORM\Column(type="integer") */
	protected $VrstaPodatkaID;

	/** @ORM\Column(type="integer") */
	protected $JezikID;

	/** @ORM\Column(type="string1252", length=150) */
	protected $KratkoBesedilo;

	/** @ORM\Column(type="text") */
	protected $DolgoBesedilo;

}
