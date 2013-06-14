<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Prokrastinat\Repository\BesedaRepository")
 * @ORM\Table(name="beseda", options={"collate"="utf8_slovenian_ci"})
 */
class Beseda extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="string", unique=true)
     */
    protected $beseda;

    /**
     * @ORM\OneToMany(targetEntity="ObjavaBeseda", mappedBy="beseda")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $objava_besede;
    
    /** @ORM\Column(type="decimal", scale=6) */
    protected $idf;
    
    /**
     * @ORM\OneToMany(targetEntity="ObjavaBeseda", mappedBy="beseda")
     */
    protected $objave;
    
    public function __construct() {
        $this->objave = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
