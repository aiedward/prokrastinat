<?php
namespace Vprasanja\Entity;

use Doctrine\ORM\Query\Expr\Base,
	Doctrine\ORM\Mapping as ORM,
	Prokrastinat\Entity\Objava;

/** @ORM\Entity */
class Vprasanje extends Objava
{
	/** @ORM\Column(type="integer") */
	protected $rating;
}