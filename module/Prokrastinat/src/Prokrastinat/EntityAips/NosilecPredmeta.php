<?php
namespace Prokrastinat\EntityAips;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="pisum.NosilecPredmeta")
 */
class NosilecPredmeta extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $NosilecPredmetaID;

    /** @ORM\Column(type="integer") */
    protected $ZavodID;

    /** @ORM\Column(type="integer") */
    protected $PredmetID;

    /** @ORM\Column(type="integer") */
    protected $ZaposleniID;

    /** @ORM\Column(type="integer") */
    protected $ZaporednaStevilka;

    /** @ORM\Column(type="string1252", length=50) */
    protected $Funkcija;

}
