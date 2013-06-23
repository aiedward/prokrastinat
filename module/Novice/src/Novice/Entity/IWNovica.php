<?php
namespace Novice\Entity;

use Doctrine\ORM\Mapping as ORM;
use Novice\Entity\Novica;

/**
 * @ORM\Entity(repositoryClass="Novice\Repository\IWNovicaRepository") 
 * @ORM\Table(name="iwnovica")
 */
class IWNovica extends Novica
{    
    /** @ORM\Column(length=301) */
    protected $opis;
    
    /** @ORM\Column(length=100) */
    protected $link;
    
    /** @ORM\Column(length=100) */
    protected $datum;

}