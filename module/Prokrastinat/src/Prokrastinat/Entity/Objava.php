<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Objava extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /** @ORM\Column(length=30) */
    protected $naslov;

    /** @ORM\Column(length=1000) */
    protected $vsebina;

    /** @ORM\Column(type="datetime") */
    protected $datum_objave;

    /** @ORM\OneToMany(targetEntity="Komentar", mappedBy="objava") */
    protected $komentarji;

    /**
     * @ORM\ManyToMany(targetEntity="Oznaka", mappedBy="objave")
     * @ORM\JoinTable(name="Objava_Oznaka")
     */
    protected $oznake;
}
