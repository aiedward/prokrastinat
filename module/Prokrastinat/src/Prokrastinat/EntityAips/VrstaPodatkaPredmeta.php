<?php
namespace Prokrastinat\EntityAips;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="pisum.VrstaPodatkaPredmeta")
 */
class VrstaPodatkaPredmeta extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $VrstaPodatkaID;

    /** @ORM\Column(type="string1252", length=10) */
    protected $KraticaVrstePodatka;

    /** @ORM\Column(type="string1252", length=40) */
    protected $NazivVrstePodatka;

}
