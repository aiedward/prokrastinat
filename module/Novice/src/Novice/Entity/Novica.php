<?php
namespace Novice\Entity;

use Prokrastinat\Entity\Objava;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\User;

/** 
 * @ORM\Entity(repositoryClass="Novice\Repository\NovicaRepository") 
 * @ORM\Table(name="novica")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="vrsta_novice", type="string")
 * @ORM\DiscriminatorMap({"novica" = "Novica", "dodatnanovica" = "DodatnaNovica"})
 */
class Novica extends Objava
{
    
    /** @ORM\Column(length=300) */
    protected $opis;

}