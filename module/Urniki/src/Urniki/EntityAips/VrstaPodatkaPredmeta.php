<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class VrstaPodatkaPredmeta extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $VrstaPodatkaID;

	/** @ORM\Column(length=10) */
	protected $KraticaVrstePodatka;

	/** @ORM\Column(length=40) */
	protected $NazivVrstePodatka;

}
