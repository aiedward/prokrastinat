<?php
namespace Vprasanja\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Objava;

/** @ORM\Entity */
class Vprasanje extends Objava
{
    /** @ORM\Column(type="integer") */
    protected $rating;

    /**
     * @ORM\ManyToMany(targetEntity="Prokrastinat\Entity\User")
     * @ORM\JoinTable(name="Vprasanje_UserRated")
     */
    protected $users_rated;
}