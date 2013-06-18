<?php 
namespace Prokrastinat\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class IskanjeForm extends Form {
    public function __construct () {
        parent::__construct('iskanjeForm');
        $this->setAttribute('method', 'get');
        
        $this->add(array(
            'name' => 'isci',
            'type' => 'Text',
            'options' => array(
                'label' => 'Iskalni niz'
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Isci',
            ),
            'options' => array(
                'primary' => true,
            ),
        ));
    }
    
    public function getInputFilter () {
        $fac = new Factory();
        $filter = new InputFilter();
        
        $filter->add($fac->createInput(array(
            'name' => 'isci',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 3
                    )
                )
            )
        )));
        
        return $filter;
    }
}