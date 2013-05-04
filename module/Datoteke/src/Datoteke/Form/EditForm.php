<?php

namespace Datoteke\Form;
 
use Zend\Form\Form;
 
class EditForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('Datoteke');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');
         
        $this->add(array(
            'name' => 'opis',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Opis',
            ),
        ));
 
         
         
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Uveljavi spremembe',
                'class' => 'btn btn-primary'
            ),
        )); 
    }
}
?>