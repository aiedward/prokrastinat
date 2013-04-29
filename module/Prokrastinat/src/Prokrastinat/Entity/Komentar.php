<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Komentar extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\ManyToOne(targetEntity="User") */
    protected $user;

    /** @ORM\ManyToOne(targetEntity="Objava") */
    protected $objava;

    /** @ORM\Column(length=512) */
    protected $vsebina;
}
