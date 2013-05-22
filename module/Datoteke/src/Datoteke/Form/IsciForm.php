<?php
namespace Datoteke\Form;

use Zend\Form\Form;

class IsciForm extends Form
{
    public function __construct()
    {
        parent::__construct('isci');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'iskalniNiz',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Iskalni niz',
            ),
            'attributes' => array(
                'id' => 'iskalniNiz',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Isci',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}