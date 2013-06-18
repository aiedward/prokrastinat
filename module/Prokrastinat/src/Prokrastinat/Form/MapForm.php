<?php 
namespace Prokrastinat\Form;

use Zend\Form\Form;

class MapForm extends Form {
    
    public function __construct($maps, $rooms)
    {
        parent::__construct('map');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'zemljevid',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Zemljevidi',
                'value_options' => $maps,
                'required' => true,
            ),
            'attributes' => array(
                'id' => 'select-zemljevid',
            ),
        ));
        
        $this->add(array(
            'name' => 'ucilnica',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Učilnica',
                'value_options' => $rooms,
                'required' => true,
            ),
            'attributes' => array(
                'id' => 'select-ucilnica',
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
        ));
    }
}