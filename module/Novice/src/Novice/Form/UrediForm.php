<?php

namespace Novice\Form;
 
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory;
use Zend\Validator;
 
class UrediForm extends Form
{
    public function __construct()
    {
        parent::__construct('Novica');
        $this->addElements();
        /*$this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');*/
    }
     
    public function addElements()
    {
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
                'class' => 'editor',
                'rows' => 15
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
                        'max' => 5000,
                    )
                )
            )
        )));
        
        return $filter;
    }
}
?>