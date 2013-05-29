<?php

namespace Urniki\Form;

use Zend\Form\Form;

class UrnikiForm extends Form
{
    public function __construct($programi, $smeri, $letniki)
    {
        parent::__construct('urniki');
        $this->setAttribute('method', 'get');
        
        $this->add(array(
            'name' => 'program',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Izberi program: ',
            ),
            'attributes' => array(
                'id' => 'select-program',
            ),
        ));
        
        $this->add(array(
            'name' => 'letnik',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Izberi letnik: ',
            ),
            'attributes' => array(
                'id' => 'select-letnik',
            ),
        ));
        
        $this->add(array(
            'name' => 'smer',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Izberi smer: ',
            ),
            'attributes' => array(
                'id' => 'select-smer',
            ),
        ));
    }
}