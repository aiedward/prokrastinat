<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity
 * @ORM\Table(name="ucilnice")
 */
class Ucilnice extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(length=100) */
    protected $ime;

    /** @ORM\Column(type="integer") */
    protected $top;

    /** @ORM\Column(type="integer") */
    protected $left;

    /** @ORM\ManyToOne(targetEntity="Mape") */
    protected $mapa;
}
