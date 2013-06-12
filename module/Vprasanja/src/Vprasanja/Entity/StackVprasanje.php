<?php
namespace Vprasanja\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Objava;

/** @ORM\Entity */
class StackVprasanje extends Objava
{
    /** @ORM\Column */
    protected $avtor;

    /** @ORM\Column */
    protected $url;

    /** @ORM\Column(type="integer") */
    protected $rating;
}