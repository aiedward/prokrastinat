<?php
namespace Novice\Entity;

use Doctrine\ORM\Mapping as ORM;
use Novice\Entity\Novica;

/** 
 * @ORM\Entity(repositoryClass="Novice\Repository\DodatnaNovicaRepository") 
 * @ORM\Table(name="dodatnanovica")
 */
class DodatnaNovica extends Novica
{
    /** @ORM\Column(length=301) */
    protected $opis;
    
    /** @ORM\Column(length=100) */
    protected $vir;
    
    /** @ORM\Column(length=100) */
    protected $date;

}