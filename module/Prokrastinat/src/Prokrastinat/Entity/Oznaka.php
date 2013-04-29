<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Oznaka extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="user_seq", initialValue=1000)
     */
    protected $id;

    /** @ORM\Column(length=30) */
    protected $naslov;

    /**
     * @ORM\ManyToMany(targetEntity="Objava")
     * @ORM\JoinTable(name="Objava_Oznaka")
     * @ORM\JoinColumn(name="objava_id", referencedColumnName="id")
     */
    protected $objave;
}
