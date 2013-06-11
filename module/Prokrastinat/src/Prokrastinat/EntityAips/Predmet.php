<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class Predmet extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $PredmetID;

	/** @ORM\Column(type="string1252", length=10) */
	protected $SifraPredmeta;

	/** @ORM\Column(type="string1252", length=150) */
	protected $NazivPredmeta;

	/** @ORM\Column(type="string1252", length=40) */
	protected $KratekNazivPredmeta;

	/** @ORM\Column(type="string1252", length=2) */
	protected $ZavodID;

	/** @ORM\Column(type="integer") */
	protected $SeminarID;

	/** @ORM\Column(type="integer") */
	protected $PreizkusZnanjaID;

	/** @ORM\Column(type="float") */
	protected $Krediti;

	/** @ORM\Column(type="float") */
	protected $KreditiECTS;

	/** @ORM\Column(type="integer") */
	protected $UrePRE;

	/** @ORM\Column(type="integer") */
	protected $UreSEM;

	/** @ORM\Column(type="integer") */
	protected $UreVAJ;

	/** @ORM\Column(type="integer") */
	protected $UreTER;

	/** @ORM\Column(type="integer") */
	protected $UreSMV;

	/** @ORM\Column(type="integer") */
	protected $UreLAB;

	/** @ORM\Column(type="integer") */
	protected $UreRAC;

	/** @ORM\Column(type="integer") */
	protected $StKolokvijev;

	/** @ORM\Column(type="integer") */
	protected $VrstaStudijaID;

	/** @ORM\Column(type="integer") */
	protected $TipProgramaID;

	/** @ORM\Column(type="string1252", length=1) */
	protected $PedagoskiProgram;

	/** @ORM\Column(type="string1252", length=1) */
	protected $Aktiven;

	/** @ORM\Column(type="integer") */
	protected $VrstaPredmeta;

	/** @ORM\Column(type="string1252", length=2) */
	protected $ZavodIzvajalecID;

	/** @ORM\Column(type="integer") */
	protected $OsnovniPredmetID;

	/** @ORM\Column(type="msdatetime") */
	protected $VeljavnostDo;

	/** @ORM\Column(type="string1252", length=3) */
	protected $OriginalnaSifra;

	/** @ORM\Column(type="string1252", length=10) */
	protected $Kratica;

	/** @ORM\Column(type="string1252", length=2) */
	protected $MaticnaFakultetaID;

	/** @ORM\Column(type="string1252", length=1) */
	protected $SkupniPredmetPEF;

	/** @ORM\Column(type="integer") */
	protected $VrstaZakljucnegaDelaID;

	/** @ORM\Column(type="integer") */
	protected $VrstaPrakticnegaDelaID;

	/** @ORM\Column(type="string1252", length=1) */
	protected $PredmetBP;

	/** @ORM\Column(type="string1252", length=10) */
	protected $SifraPredmetaBP;

	/** @ORM\Column(type="string1252", length=150) */
	protected $NazivPredmetaA;

	/** @ORM\Column(type="integer") */
	protected $UreIV;

	/** @ORM\Column(type="integer") */
	protected $UreID;

	/** @ORM\Column(type="integer") */
	protected $UreEPRE;

	/** @ORM\Column(type="integer") */
	protected $UreESEM;

	/** @ORM\Column(type="string1252", length=10) */
	protected $JezikPredmetaP;

	/** @ORM\Column(type="string1252", length=10) */
	protected $JezikPredmetaV;

	/** @ORM\Column(type="string1252", length=1) */
	protected $ObjavaNaSpletu;

	/** @ORM\Column(type="string1252", length=1) */
	protected $PonujenoZaIzbiroMaticnim;

	/** @ORM\Column(type="string1252", length=1) */
	protected $PonujenoZaIzbiroTujim;

	/** @ORM\Column(type="integer") */
	protected $KvotaZaIzbiroMaticnim;

	/** @ORM\Column(type="integer") */
	protected $KvotaZaIzbiroTujim;

	/** @ORM\Column(type="string1252", length=1) */
	protected $IzbirniPredmet;

	/** @ORM\Column(type="string1252", length=1) */
	protected $PrioritetniPredmet;

	/** @ORM\Column(type="integer") */
	protected $FakultetaID;

	/** @ORM\Column(type="integer") */
	protected $KatedraID;

	/** @ORM\Column(type="integer") */
	protected $UcnaEnotaID;

}
