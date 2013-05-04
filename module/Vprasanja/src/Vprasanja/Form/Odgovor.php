<?php 
namespace Vprasanja\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class Odgovor extends Form {
    public function __construct()
    {
        parent::__construct('odgovor');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'));

        $this->add(array(
            'name' => 'vprasanje_id',
            'type' => 'Hidden'));

        $this->add(array(
            'name' => 'vsebina',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Besedilo',
                'required' => true
            ),
            'attributes' => array(
                'class' => 'input-xxlarge',
                'rows' => 5
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
                        'max' => 5000,
                    )
                )
            )
        )));
        
        return $filter;
    }
}