<?php
namespace Prokrastinat\EntityAips;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="pisum.Profesor")
 */
class Profesor extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $ZaposleniID;

    /** @ORM\Column(type="string1252", length=10) */
    protected $Sifra;

    /** @ORM\Column(type="string1252", length=13) */
    protected $EMSO;

    /** @ORM\Column(type="string1252", length=50) */
    protected $PriimekIme;

    /** @ORM\Column(type="string1252", length=10) */
    protected $Naziv;

    /** @ORM\Column(type="string1252", length=20) */
    protected $Habilitacija;

    /** @ORM\Column(type="string1252", length=1) */
    protected $Aktiven;

    /** @ORM\Column(type="integer") */
    protected $GovorilneDan;

    /** @ORM\Column(type="msdatetime") */
    protected $GovorilneUraOd;

    /** @ORM\Column(type="msdatetime") */
    protected $GovorilneUraDo;

    /** @ORM\Column(type="integer") */
    protected $Govorilne2Dan;

    /** @ORM\Column(type="msdatetime") */
    protected $Govorilne2UraOd;

    /** @ORM\Column(type="msdatetime") */
    protected $Govorilne2UraDo;

    /** @ORM\Column(type="string1252", length=10) */
    protected $GovorilneProstor;

    /** @ORM\Column(type="string1252", length=20) */
    protected $GovorilneTelefon;

    /** @ORM\Column(type="string1252", length=50) */
    protected $GovorilneEmail;

    /** @ORM\Column(type="string1252", length=50) */
    protected $GovorilneURL;

    /** @ORM\Column(type="string1252", length=5) */
    protected $SifraK;

    /** @ORM\Column(type="string1252", length=1) */
    protected $ObstajaVK;

    /** @ORM\Column(type="integer") */
    protected $NoviZaposleniID;

    /** @ORM\Column(type="string1252", length=10) */
    protected $SifraA;

    /** @ORM\Column(type="string1252", length=2) */
    protected $MaticnaFakultetaID;

    /** @ORM\Column(type="string1252", length=50) */
    protected $Priimek;

    /** @ORM\Column(type="string1252", length=50) */
    protected $Ime;

    /** @ORM\Column(type="string1252", length=1) */
    protected $ObstajaVKIS;

    /** @ORM\Column(type="string1252", length=10) */
    protected $SifraKIS;

}
