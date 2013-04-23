<?php
namespace Deska\Entity;

use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Objava;

/** @ORM\Entity */
class Oglas extends Objava
{
    /**
     * @ORM\Column(type="string")
     */
    protected $datum_zapadlosti;
    
    public function setDatumZapadlosti($datum_zapadlosti)
    {
        $this->datum_zapadlosti = $datum_zapadlosti;
    }
    
    public function getDatumZapadlosti()
    {
        return $this->datum_zapadlosti;
    }
}
