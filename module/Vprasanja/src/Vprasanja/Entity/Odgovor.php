<?php
namespace Vprasanja\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Komentar;
use Prokrastinat\Entity\User;

/** @ORM\Entity */
class Odgovor extends Komentar
{
    /** @ORM\Column(type="integer") */
    protected $rating;

    /**
     * @ORM\ManyToMany(targetEntity="Prokrastinat\Entity\User")
     * @ORM\JoinTable(name="Odgovor_UserRated")
     */
    protected $users_rated;
}
