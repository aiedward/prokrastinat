<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(name="pisum.Programi")
 */
class Programi extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $PredmetnikID;

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

    /** @ORM\Column(type="string1252", length=4) */
    protected $Zaporedje;

    /** @ORM\Column(type="string1252", length=1) */
    protected $SeIzvaja;

    /** @ORM\Column(type="string1252", length=150) */
    protected $Opombe;

    /** @ORM\Column(type="string1252", length=1) */
    protected $ObjaviNaSpletu;

}
