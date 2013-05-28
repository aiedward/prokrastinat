<?php
namespace Aips\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Profesor extends BaseEntity
{
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /** @ORM\Column(type="integer") */
    protected $sifra;
    
    /** @ORM\Column(length=100) */
    protected $priimek_ime;
    
    /** @ORM\Column(length=10, nullable=true) */
    protected $naziv;
    
    /** @ORM\Column(length=50, nullable=true) */
    protected $habilitacija;
    
    /** @ORM\Column(length=100, nullable=true) */
    protected $email;
    
    /** @ORM\Column(length=50, nullable=true) */
    protected $priimek;
    
    /** @ORM\Column(length=50, nullable=true) */
    protected $ime;
}