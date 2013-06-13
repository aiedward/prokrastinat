<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="beseda", options={"collate"="utf8_slovenian_ci"})
 */
class Beseda extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="string", unique=true)
     */
    protected $beseda;
    
    /** @ORM\Column(type="decimal", scale=6) */
    protected $idf;
}
