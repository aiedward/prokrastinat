<?php
namespace Novice\Form;

use Zend\Form\Form;

class IskanjeForm extends Form
{
    public function __construct()
    {
        parent::__construct('iskanje_form');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'iskalni_niz',
            'options' => array(
                'label' => 'Iskalni niz: ',
            ),
            'attributes' => array(
                'id' => 'txt-iskalni',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Poisci',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
            'options' => array(
                'primary' => true,
            ),
        ));
    }
}
