<?php
namespace Prokrastinat\EntityAips;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="pisum.IzpitniRok")
 */
class IzpitniRok extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $IzpitniRokID;

    /** @ORM\Column(type="string1252", length=2) */
    protected $ZavodID;

    /** @ORM\Column(type="integer") */
    protected $SolskoLeto;

    /** @ORM\Column(type="msdatetime") */
    protected $DatumRoka;

    /** @ORM\Column(type="msdatetime") */
    protected $RokPrijave;

    /** @ORM\Column(type="integer") */
    protected $ProfesorID;

    /** @ORM\Column(type="string1252", length=10) */
    protected $KrajIzvajanja;

    /** @ORM\Column(type="string1252", length=1) */
    protected $TipRoka;

    /** @ORM\Column(type="string1252", length=1) */
    protected $Komisijski;

    /** @ORM\Column(type="integer") */
    protected $VrstaStudijaID;

    /** @ORM\Column(type="string1252", length=1) */
    protected $DoPodiplomski;

    /** @ORM\Column(type="integer") */
    protected $IzvajalecID;

    /** @ORM\Column(type="msdatetime") */
    protected $UraIzvedbe;

    /** @ORM\Column(type="string1252", length=100) */
    protected $Opomba;

    /** @ORM\Column(type="msdatetime") */
    protected $DatumOdjave;

    /** @ORM\Column(type="integer") */
    protected $StariIRID;

    /** @ORM\Column(type="msdatetime") */
    protected $DatumObjaveRezultata;

    /** @ORM\Column(type="string1252", length=1) */
    protected $ObjaviNaSpletu;

}
