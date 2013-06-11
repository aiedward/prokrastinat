<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class Vpis extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $VpisID;

	/** @ORM\Column(type="integer") */
	protected $StudijID;

	/** @ORM\Column(type="integer") */
	protected $StudentID;

	/** @ORM\Column(type="integer") */
	protected $Leto;

	/** @ORM\Column(length=2) */
	protected $ZavodID;

	/** @ORM\Column(length=2) */
	protected $MaticnaFakultetaID;

	/** @ORM\Column(type="integer") */
	protected $LetnikStudijaID;

	/** @ORM\Column(type="integer") */
	protected $ProgramID;

	/** @ORM\Column(type="integer") */
	protected $IzbirnaSkupinaID;

	/** @ORM\Column(length=3) */
	protected $StudentskaSkupina;

	/** @ORM\Column(type="integer") */
	protected $JezikovnaSkupina;

	/** @ORM\Column(type="integer") */
	protected $UcniNacrtID;

	/** @ORM\Column(type="integer") */
	protected $VrstaStudijaID;

	/** @ORM\Column(length=1) */
	protected $StudijNaDaljavo;

	/** @ORM\Column(type="integer") */
	protected $NacinStudijaID;

	/** @ORM\Column(length=1) */
	protected $UgodnostiStudenta;

	/** @ORM\Column(type="msdatetime") */
	protected $UgodSpremembaCas;

	/** @ORM\Column(type="integer") */
	protected $VrstaVpisaID;

	/** @ORM\Column(type="integer") */
	protected $CenterStudijaID;

	/** @ORM\Column(length=1) */
	protected $VpisPogojni;

	/** @ORM\Column(type="msdatetime") */
	protected $DatumVpisa;

	/** @ORM\Column(type="msdatetime") */
	protected $VpisDo;

	/** @ORM\Column(type="integer") */
	protected $MentorID;

	/** @ORM\Column(type="integer") */
	protected $TutorId;

	/** @ORM\Column(length=1) */
	protected $PlaciloSolnine;

	/** @ORM\Column(type="integer") */
	protected $TipPlacnikaID;

	/** @ORM\Column(type="integer") */
	protected $VzorecPlacilaID;

	/** @ORM\Column(type="float") */
	protected $SolninaZnesek;

	/** @ORM\Column(type="msdatetime") */
	protected $DatumPlacila;

	/** @ORM\Column(type="integer") */
	protected $SolninaObrokov;

	/** @ORM\Column(length=1) */
	protected $OIVLDovoljeno;

	/** @ORM\Column(type="integer") */
	protected $OIVLLetnikStudijaID;

	/** @ORM\Column(type="integer") */
	protected $OIVLProgramID;

	/** @ORM\Column(type="integer") */
	protected $OIVLIzbirnaSkupinaID;

	/** @ORM\Column(type="msdatetime") */
	protected $DejanskiDatumVpisa;

	/** @ORM\Column(type="integer") */
	protected $MVZTTujecSolnina;

	/** @ORM\Column(length=1) */
	protected $MVZTPrehod;

	/** @ORM\Column(length=4) */
	protected $MVZTRaziskovalecID;

	/** @ORM\Column(length=4) */
	protected $MVZTMirovanjeID;

	/** @ORM\Column(length=1) */
	protected $MVZTSofinanciranje;

	/** @ORM\Column(type="real") */
	protected $MVZTDosezeneKT;

	/** @ORM\Column(type="msdatetime") */
	protected $MVZTDatumSklepaPrehoda;

	/** @ORM\Column(type="integer") */
	protected $Program1ID;

	/** @ORM\Column(type="integer") */
	protected $UcniNacrt1ID;

	/** @ORM\Column(type="integer") */
	protected $IzbirnaSkupina1ID;

	/** @ORM\Column(type="integer") */
	protected $Program2ID;

	/** @ORM\Column(type="integer") */
	protected $UcniNacrt2ID;

	/** @ORM\Column(type="integer") */
	protected $IzbirnaSkupina2ID;

	/** @ORM\Column(type="integer") */
	protected $OblikaStudijaID;

	/** @ORM\Column(type="integer") */
	protected $KrajIzvajanjaID;

	/** @ORM\Column(type="integer") */
	protected $VrstaVpisnegaStroskaID;

	/** @ORM\Column(type="msdatetime") */
	protected $DatumPlacilaVpisnegaStroska;

}
