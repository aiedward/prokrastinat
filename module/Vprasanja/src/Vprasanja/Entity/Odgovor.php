<?php
namespace Vprasanja\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Komentar;

/** 
 * @ORM\Entity(repositoryClass="Vprasanja\Repository\OdgovorRepository")
 * @ORM\Table(name="odgovor")
 */
class Odgovor extends Komentar
{
    /** @ORM\Column(type="integer") */
    protected $rating;

    /**
     * @ORM\ManyToMany(targetEntity="Prokrastinat\Entity\User")
     * @ORM\JoinTable(name="odgovor_user_rated")
     */
    protected $users_rated;
}
