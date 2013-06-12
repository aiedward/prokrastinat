<?php
namespace Prokrastinat\EntityAips;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="pisum.Program")
 */
class Program extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $ProgramID;

    /** @ORM\Column(type="string1252", length=10) */
    protected $SifraPrograma;

    /** @ORM\Column(type="string1252", length=60) */
    protected $NazivPrograma;

    /** @ORM\Column(type="string1252", length=2) */
    protected $NosilecProgramaID;

    /** @ORM\Column(type="integer") */
    protected $VrstaStudijaID;

    /** @ORM\Column(type="string1252", length=1) */
    protected $VrstaPrograma;

    /** @ORM\Column(type="integer") */
    protected $TipProgramaID;

    /** @ORM\Column(type="string1252", length=1) */
    protected $PedagoskiProgram;

    /** @ORM\Column(type="integer") */
    protected $ProgramAID;

    /** @ORM\Column(type="integer") */
    protected $ProgramBID;

    /** @ORM\Column(type="msdatetime") */
    protected $DatumSprejetja1;

    /** @ORM\Column(type="msdatetime") */
    protected $DatumSprejetja2;

    /** @ORM\Column(type="msdatetime") */
    protected $DatumSprejetja3;

    /** @ORM\Column(type="string1252", length=1) */
    protected $InterdisciplinarniP;

    /** @ORM\Column(type="integer") */
    protected $OdSemestra;

    /** @ORM\Column(type="integer") */
    protected $StSemestrov;

    /** @ORM\Column(type="string1252", length=1) */
    protected $Aktiven;

    /** @ORM\Column(type="string1252", length=1) */
    protected $ProgramBP;

    /** @ORM\Column(type="string1252", length=2) */
    protected $MaticnaFakultetaID;

    /** @ORM\Column(type="string1252", length=150) */
    protected $DolgiNazivPrograma;

    /** @ORM\Column(type="string1252", length=150) */
    protected $DolgiNazivProgramaA;

    /** @ORM\Column(type="string1252", length=40) */
    protected $PoimenovanjeSmeri;

    /** @ORM\Column(type="integer") */
    protected $MVZTStudijskaSkupinaID;

    /** @ORM\Column(type="integer") */
    protected $KlasifikacijaKLASIUSPID;

    /** @ORM\Column(type="integer") */
    protected $NadrejeniID;

    /** @ORM\Column(type="integer") */
    protected $StudijskiProgramID;

    /** @ORM\Column(type="integer") */
    protected $Nivo;

    /** @ORM\Column(type="integer") */
    protected $DelProgramaEVSID;

    /**
     * @ORM\OneToMany(targetEntity="Prokrastinat\EntityAips\Vpis", mappedBy="studij")
     */
    protected $vpisi;
    
    public function getVpisi() {
        return $this->vpisi;
    }
    public function __construct() {
        $this->vpisi = new Doctrine\Common\Collections\ArrayCollection();
    }
}
