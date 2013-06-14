<?php
namespace Novice\Entity;

use Prokrastinat\Entity\Objava;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Novice\Repository\NovicaRepository") 
 * @ORM\Table(name="novica")
 */
class Novica extends Objava
{
    
    /** @ORM\Column(length=301) */
    protected $opis;

}