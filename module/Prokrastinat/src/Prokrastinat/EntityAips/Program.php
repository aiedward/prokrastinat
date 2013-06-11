<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class Program extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $ProgramID;

	/** @ORM\Column(length=10) */
	protected $SifraPrograma;

	/** @ORM\Column(length=60) */
	protected $NazivPrograma;

	/** @ORM\Column(length=2) */
	protected $NosilecProgramaID;

	/** @ORM\Column(type="integer") */
	protected $VrstaStudijaID;

	/** @ORM\Column(length=1) */
	protected $VrstaPrograma;

	/** @ORM\Column(type="integer") */
	protected $TipProgramaID;

	/** @ORM\Column(length=1) */
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

	/** @ORM\Column(length=1) */
	protected $InterdisciplinarniP;

	/** @ORM\Column(type="integer") */
	protected $OdSemestra;

	/** @ORM\Column(type="integer") */
	protected $StSemestrov;

	/** @ORM\Column(length=1) */
	protected $Aktiven;

	/** @ORM\Column(length=1) */
	protected $ProgramBP;

	/** @ORM\Column(length=2) */
	protected $MaticnaFakultetaID;

	/** @ORM\Column(length=150) */
	protected $DolgiNazivPrograma;

	/** @ORM\Column(length=150) */
	protected $DolgiNazivProgramaA;

	/** @ORM\Column(length=40) */
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

}
