<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;
use Urniki\Entity\Program;

/** @ORM\Entity(repositoryClass="Urniki\Repository\SmerRepository") */
class Smer extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /** @ORM\ManyToOne(targetEntity="Program") */
    protected $program;
    
    /** @ORM\Column(length=100) */
    protected $ime;
    
    /** @ORM\Column(length=10) */
    protected $koda;
    
    /** @ORM\Column(type="integer") */
    protected $leta;
}
