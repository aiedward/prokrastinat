<?php
namespace Deska\Form;

use Zend\Form\Form;

class DeskaForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'naslov',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Naslov',
            ),
        ));
        
        $this->add(array(
            'name' => 'vsebina',
            'attributes' => array(
                'type' => 'textarea',
                'cols' => '50',
                'rows' => '10',
            ),
            'options' => array(
                'label' => 'Vsebina',
            ),
        ));
        
        // TODO: oznake
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Date',
            'name' => 'datum-zapadlosti',
            'options' => array(
                'label' => 'Datum zapadlosti',
            ),
            'attributes' => array(
                'min' => '01.01.2013',
                'max' => '31.12.2013',
                'step' => '1',
            ),
        ));
        
        $this->add(array(
           'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Dodaj',
                'id' => 'submitbutton',
            ),
            'options' => array(
                'primary' => true,
            ),
        ));
    }
}