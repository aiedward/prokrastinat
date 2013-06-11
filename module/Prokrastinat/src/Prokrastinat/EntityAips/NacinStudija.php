<?php
namespace AIPS\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(name="pisum.NacinStudija")
 */
class NacinStudija extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $NacinStudijaID;

    /** @ORM\Column(type="string1252", length=10) */
    protected $KodaNacinaStudija;

    /** @ORM\Column(type="string1252", length=30) */
    protected $OpisNacinaStudija;

    /** @ORM\Column(type="string1252", length=10) */
    protected $KodaNacinaStudijaA;

    /** @ORM\Column(type="string1252", length=30) */
    protected $OpisNacinaStudijaA;

}
