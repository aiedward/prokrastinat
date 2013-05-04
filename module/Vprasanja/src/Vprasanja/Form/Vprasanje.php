<?php 
namespace Vprasanja\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class Vprasanje extends Form {
    public function __construct()
    {
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
                'required' => true

            ),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'vsebina',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Besedilo',
                'required' => true
            ),
            'attributes' => array(
                'class' => 'input-xxlarge',
                'rows' => 8
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Objavi'
            ),
            'options' => array(
                'primary' => true
            ),
        ));
    }

    public function getInputFilter()
    {
        $fac = new Factory();
        $filter = new InputFilter();
        
        $filter->add($fac->createInput(array(
            'name' => 'naslov',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 10,
                        'max' => 100,
                    )
                )
            )
        )));
        
        $filter->add($fac->createInput(array(
            'name' => 'vsebina',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 10,
                        'max' => 1000,
                    )
                )
            )
        )));
        
        return $filter;
    }
}