<?php

namespace Novice\Entity;

use Doctrine\Orm\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="extremenovice")
 */
class ExtremeNovica extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /** @ORM\Column(length=255) */
    protected $naslov;
    
    /** @ORM\Column(length=255) */
    protected $avtor;
    
    /** @ORM\Column(length=255) */
    protected $povezava;
    
    /** @ORM\Column(length=15000) */
    protected $vsebina;
    
    /** @ORM\Column */
    protected $kategorija;
}