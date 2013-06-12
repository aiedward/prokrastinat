<?php
namespace Prokrastinat\EntityAips;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="pisum.Predmetnik")
 */
class Predmetnik extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $PredmetnikID;

    /** @ORM\Column(type="string1252", length=2) */
    protected $ZavodID;

    /** @ORM\Column(type="integer") */
    protected $SolskoLeto;

    /** @ORM\Column(type="integer") */
    protected $CenterStudijaID;

    /** @ORM\Column(type="integer") */
    protected $VrstaStudijaID;

    /** @ORM\Column(type="integer") */
    protected $NacinStudijaID;

    /** @ORM\Column(type="integer") */
    protected $ProgramID;

    /** @ORM\Column(type="string1252", length=60) */
    protected $NazivPredmetnika;

    /** @ORM\Column(type="string1252", length=20) */
    protected $KraticaPredmetnika;

    /** @ORM\Column(type="integer") */
    protected $Zaporedje;

    /** @ORM\Column(type="string1252", length=1) */
    protected $SeIzvaja;

    /** @ORM\Column(type="text") */
    protected $Opombe;

    /** @ORM\Column(type="string1252", length=1) */
    protected $ObjaviNaSpletu;

}
