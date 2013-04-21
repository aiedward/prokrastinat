<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base,
    Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Vprasanje extends Objava
{
	/** @ORM\Column(type="integer") */
	protected $rating;
}