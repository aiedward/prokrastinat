<?php

namespace Deska\Form;

use Zend\Form\Form;

// za validacijo
use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class DeskaForm extends Form 
{
    public function __construct() 
    {
        parent::__construct('dodaj_oglas');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'naslov',
            'options' => array(
                'label' => 'Naslov ',
            ),
            'attributes' => array(
                'id' => 'txt-naslov',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'vsebina',
            'options' => array(
                'label' => 'Vsebina ',
            ),
            'attributes' => array(
                'id' => 'form-textarea',
                'cols' => '250',
                'rows' => '10',
            ),
        ));

        // TODO: oznake

        $this->add(array(
            'type' => 'Zend\Form\Element\Date',
            'name' => 'datum-zapadlosti',
            'options' => array(
                'label' => 'Zapade ', //
            ),
            'attributes' => array(
                'id' => 'dp-zapadlost',
                'min' => '2013-01-01',
                'max' => '2013-12-12',
                'step' => '1',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Dodaj',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
            'options' => array(
                'primary' => true,
            ),
        ));
    }
    
    public function getInputFilter()
    {
        $factory = new Factory();
        $filter = new InputFilter();
        
        $filter->add($factory->createInput(array(
            'name' => 'id',
            'required' => true,
            'filters' => array(
                array('name' => 'Int'),
            ),
        )));
        
        $filter->add($factory->createInput(array(
            'name' => 'naslov',
            'required' => 'true',
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            Validator\NotEmpty::IS_EMPTY => 'Vnesite naslov oglasa!',
                        ),
                    ),
                ),
            ),
        )));
        
        $filter->add($factory->createInput(array(
            'name' => 'vsebina',
            'required' => 'true',
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            Validator\NotEmpty::IS_EMPTY => 'Vnesite vsebino oglasa!',
                        ),
                    ),
                ),
            ),
        )));
        
        return $filter;
    }
}