<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(name="pisum.PredmetP")
 */
class PredmetP extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $PredmetPID;

    /** @ORM\Column(type="integer") */
    protected $PredmetnikID;

    /** @ORM\Column(type="integer") */
    protected $LetnikProgramaPID;

    /** @ORM\Column(type="integer") */
    protected $PredmetID;

    /** @ORM\Column(type="integer") */
    protected $LetnikID;

    /** @ORM\Column(type="integer") */
    protected $SeminarID;

    /** @ORM\Column(type="integer") */
    protected $PreizkusZnanjaID;

    /** @ORM\Column(type="real") */
    protected $Krediti;

    /** @ORM\Column(type="real") */
    protected $KreditiECTS;

    /** @ORM\Column(type="integer") */
    protected $UreZPRE;

    /** @ORM\Column(type="integer") */
    protected $UreZSEM;

    /** @ORM\Column(type="integer") */
    protected $UreZVAJ;

    /** @ORM\Column(type="integer") */
    protected $UreZTER;

    /** @ORM\Column(type="integer") */
    protected $UreZSMV;

    /** @ORM\Column(type="integer") */
    protected $UreZLAB;

    /** @ORM\Column(type="integer") */
    protected $UreZRAC;

    /** @ORM\Column(type="integer") */
    protected $UrePPRE;

    /** @ORM\Column(type="integer") */
    protected $UrePSEM;

    /** @ORM\Column(type="integer") */
    protected $UrePVAJ;

    /** @ORM\Column(type="integer") */
    protected $UrePTER;

    /** @ORM\Column(type="integer") */
    protected $UrePSMV;

    /** @ORM\Column(type="integer") */
    protected $UrePLAB;

    /** @ORM\Column(type="integer") */
    protected $UrePRAC;

    /** @ORM\Column(type="string1252", length=1) */
    protected $IzbirniPredmet;

    /** @ORM\Column(type="string1252", length=1) */
    protected $IzbirniPredmetZaKS;

    /** @ORM\Column(type="integer") */
    protected $StStudentovZaKS;

    /** @ORM\Column(type="string1252", length=1) */
    protected $PogojniPredmet;

    /** @ORM\Column(type="string1252", length=2) */
    protected $NosilecPredmetaID;

    /** @ORM\Column(type="integer") */
    protected $Nivo;

    /** @ORM\Column(type="integer") */
    protected $KvotaStudentov;

    /** @ORM\Column(type="integer") */
    protected $OsnovniPredmetPID;

    /** @ORM\Column(type="integer") */
    protected $SestavaPredmeta;

    /** @ORM\Column(type="integer") */
    protected $Zaporedje;

    /** @ORM\Column(type="integer") */
    protected $IzracunOcene;

    /** @ORM\Column(type="msdatetime") */
    protected $DatumIzvedbeOd;

    /** @ORM\Column(type="msdatetime") */
    protected $DatumIzvedbeDo;

    /** @ORM\Column(type="float") */
    protected $DelezOcene;

    /** @ORM\Column(type="integer") */
    protected $PostavkaPID;

}
