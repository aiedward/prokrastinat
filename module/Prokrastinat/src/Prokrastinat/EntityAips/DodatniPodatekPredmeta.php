<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(name="pisum.DodatniPodatekPredmeta")
 */
class DodatniPodatekPredmeta extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $DodatniPodatekPredmetaID;

    /** @ORM\Column(type="integer") */
    protected $PredmetID;

    /** @ORM\Column(type="integer") */
    protected $KodaPodatka;

    /** @ORM\Column(type="text") */
    protected $Besedilo;

    /** @ORM\Column(type="text") */
    protected $BesediloA;

}
