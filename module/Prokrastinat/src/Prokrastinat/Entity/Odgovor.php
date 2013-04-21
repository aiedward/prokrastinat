<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base,
    Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Odgovor extends Komentar
{
	/** @ORM\Column(type="integer") */
	protected $rating;
}
