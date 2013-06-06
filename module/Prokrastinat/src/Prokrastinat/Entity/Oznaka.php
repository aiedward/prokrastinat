<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="oznaka")
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Oznaka extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(length=30) */
    protected $naslov;

    /**
     * @ORM\ManyToMany(targetEntity="Objava", inversedBy="oznake")
     * @ORM\JoinTable(name="objava_oznaka")
     */
    protected $objave;
}
