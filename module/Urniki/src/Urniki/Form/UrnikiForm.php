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
                'value_options' => $programi,
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
                'value_options' => array(1 => 1, 2 => 2, 3 => 3),
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
                'value_options' => $smeri,
            ),
            'attributes' => array(
                'id' => 'select-smer',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Prikaži',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
            'options' => array(
                'primary' => true,
            ),
        ));
    }
}