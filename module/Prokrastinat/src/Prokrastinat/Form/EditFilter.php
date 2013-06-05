<?php
namespace Prokrastinat\Form;


use Zend\InputFilter\InputFilter;
use Zend\Validator;

class EditFilter extends InputFilter {
    public function __construct ()
    {
        $this->add(array(
            'name' => 'ime',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 2,
                        'max' => 30,
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'priimek',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 2,
                        'max' => 30,
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'vpisna_st',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 2,
                        'max' => 30,
                    )
                )
            )
        ));
                
        $this->add(array(
            'name' => 'email',
            'required' => true,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'EmailAddress'
                )
            )
        ));
                
        $this->add(array(
            'name' => 'naslov',
            'required' => false,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'max' => 64,
                    )
                )
            )
        ));
                
        $this->add(array(
            'name' => 'mesto',
            'required' => false,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'max' => 64,
                    )
                )
            )
        ));
                
        $this->add(array(
            'name' => 'drzava',
            'required' => false,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'max' => 64,
                    )
                )
            )
        ));
                
        $this->add(array(
            'name' => 'opis',
            'required' => false,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'max' => 255,
                    )
                )
            )
        ));
                
        $this->add(array(
            'name' => 'splet',
            'required' => false,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'max' => 64,
                    )
                )
            )
        ));
                
        $this->add(array(
            'name' => 'telefon',
            'required' => false,
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'Digits',
                )
            )
        ));
    }
}
