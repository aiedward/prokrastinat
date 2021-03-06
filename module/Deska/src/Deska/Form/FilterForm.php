<?php
namespace Deska\Form;

use Zend\Form\Form;

class FilterForm extends Form
{
    public function __construct($options)
    {
        parent::__construct('sort_oglas');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'kategorija',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Kategorija',
                'value_options' => $options,
                'required' => true,
            ),
            'attributes' => array(
                'id' => 'select-kategorija',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Filtriraj',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}