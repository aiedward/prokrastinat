<?php
namespace Deska\Entity;

use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Objava;

/** @ORM\Entity */
class Oglas extends Objava
{
    /**
     * @ORM\Column(type="datetime")
     */
    protected $datum_zapadlosti;
}
