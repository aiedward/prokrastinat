<?php

namespace Urniki\Form;

use Zend\Form\Form;

class UrnikiForm extends Form
{
    public function __construct($options)
    {
        parent::__construct('urniki');
        $this->setAttribute('method', 'get');
        
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