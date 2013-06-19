<?php
namespace Deska\Entity;

use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Objava;


/** 
 * @ORM\Entity(repositoryClass="Deska\Repository\OglasRepository")
 * @ORM\Table(name="oglas")
 */
class Oglas extends Objava
{
    /**
     * @ORM\Column(type="date")
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
    /*
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            
            // ID
            $inputFilter->add($factory->createInput(array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            // NASLOV
            $inputFilter->add($factory->createInput(array(
                'name' => 'naslov',
                'required' => 'true',
                'filters' => array(
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                Validator\NotEmpty::IS_EMPTY => 'Vnesite naslov oglasa!',
                            ),
                        ),
                    ),
                ),
            )));
            
            // VSEBINA
            $inputFilter->add($factory->createInput(array(
                'name' => 'vsebina',
                'required' => 'true',
                'filters' => array(
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                Validator\NotEmpty::IS_EMPTY => 'Vnesite vsebino oglasa!',
                             ),
                        ),
                    ),
                ),
            )));
            
            // DATUM ZAPADLOSTI
            $inputFilter->add($factory->createInput(array(
                'name' => 'datum-zapadlosti',
                'required' => 'true',
                'validators' => array(
                    
                ),
            )));
            
            $this->inputFilter = $inputFilter;
        }
    }*/
}
