<?php 
namespace Vprasanja\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class Vprasanje extends Form {
    public function __construct () {
        parent::__construct('vprasanje');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'));

        $this->add(array(
            'name' => 'naslov',
            'type' => 'Text',
            'options' => array(
                'label' => 'Naslov',
                'required' => true,
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 10,
                        'max' => 30,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'vsebina',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Besedilo',
                'required' => true,
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 10,
                        'max' => 500,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Objavi',
            ),
            'options' => array(
                'primary' => true
            ),
        ));
    }
}