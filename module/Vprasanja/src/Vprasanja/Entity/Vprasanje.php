<?php
namespace Vprasanja\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Objava;

/** @ORM\Entity(repositoryClass="Vprasanja\Repository\VprasanjeRepository") */
class Vprasanje extends Objava
{
    /** @ORM\Column(type="integer") */
    protected $rating;

    /**
     * @ORM\ManyToMany(targetEntity="Prokrastinat\Entity\User")
     * @ORM\JoinTable(name="vprasanje_user_rated")
     */
    protected $users_rated;
}