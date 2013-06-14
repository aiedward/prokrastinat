<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="objava_beseda", options={"collate"="utf8_slovenian_ci"})
 */
class ObjavaBeseda extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Beseda")
     * @ORM\JoinColumn(referencedColumnName="beseda")
     */
    protected $beseda;

    /** @ORM\ManyToOne(targetEntity="Objava") */
    protected $objava;

    /** @ORM\Column(type="integer") */
    protected $frekvenca;
    
    /** @ORM\Column(type="decimal", scale=6) */
    protected $tf;
}
