<?php
namespace Vprasanja\Entity;

use Doctrine\ORM\Query\Expr\Base,
Doctrine\ORM\Mapping as ORM,
Prokrastinat\Entity\Komentar;

/** @ORM\Entity */
class Odgovor extends Komentar
{
	/** @ORM\Column(type="integer") */
	protected $rating;
}
