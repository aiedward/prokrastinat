<?php
namespace Prokrastinat\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class EditForm extends Form {
    public function __construct () {
        parent::__construct('EditForm');
        $this->setAttribute('method', 'post');
        //ID
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'
        ));
        //IME
        $this->add(array(
            'name' => 'ime',
            'type' => 'Text',
            'options' => array(
                'label' => 'Ime*',
                'required' => true,
            ),
        ));
        //PRIIMEK
        $this->add(array(
            'name' => 'priimek',
            'type' => 'Text',
            'options' => array(
                'label' => 'Priimek*',
                'required' => true,
            ),
        ));
        // Vpisna številka
        $this->add(array(
            'name' => 'vpisna_st',
            'type' => 'Text',
            'options' => array(
                'label' => 'Vpisna številka*',
                'required' => true,
            ),
        ));
        //EMAIL
        $this->add(array(
            'name' => 'email',
            'type' => 'Email',
            'options' => array(
                'label' => 'Email*',
                'required' => true,
            ),
        ));
        //NASLOV
        $this->add(array(
            'name' => 'naslov',
            'type' => 'Text',
            'options' => array(
                'label' => 'Naslov',
            ),
        ));
        //MESTO
        $this->add(array(
            'name' => 'mesto',
            'type' => 'Text',
            'options' => array(
                'label' => 'Mesto',
            ),
        ));
        //DRŽAVA
        $this->add(array(
            'name' => 'drzava',
            'type' => 'Text',
            'options' => array(
                'label' => 'Država',
            ),
        ));
        //OPIS
        $this->add(array(
            'name' => 'opis',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Opis',
            ),
                        'attributes' => array(
                            'class' => 'input-xxlarge',
                            'rows' => 5
                        ),
        ));
        //SPLETNA STRAN
        $this->add(array(
            'name' => 'splet',
            'type' => 'Text',
            'options' => array(
                'label' => 'Spletna stran',
            ),
        ));
        //TELEFON
        $this->add(array(
            'name' => 'telefon',
            'type' => 'Text',
            'options' => array(
                'label' => 'Telefon',
            ),
        ));
        //GUMB
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Posodobi',
            ),
            'options' => array(
                'primary' => true
            ),
        ));
    }
        
        public function getInputFilter () {
        $fac = new Factory();
        $filter = new InputFilter();
        
        $filter->add($fac->createInput(array(
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
        )));
                
        $filter->add($fac->createInput(array(
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
        )));
        
        $filter->add($fac->createInput(array(
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
        )));
                
        $filter->add($fac->createInput(array(
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
        )));
                
                $filter->add($fac->createInput(array(
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
        )));
                
                $filter->add($fac->createInput(array(
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
        )));
                
                $filter->add($fac->createInput(array(
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
        )));
                
                $filter->add($fac->createInput(array(
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
        )));
                
                $filter->add($fac->createInput(array(
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
        )));
                
                $filter->add($fac->createInput(array(
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
        )));
                
        return $filter;
        }
        
        public function fill (\Prokrastinat\Entity\User $user) {
            $this->get('ime')->setValue($user->ime);
            $this->get('priimek')->setValue($user->priimek);
            $this->get('email')->setValue($user->email);
            $this->get('naslov')->setValue($user->naslov);
            $this->get('mesto')->setValue($user->mesto);
            $this->get('drzava')->setValue($user->drzava);
            $this->get('opis')->setValue($user->opis);
            $this->get('splet')->setValue($user->splet);
            $this->get('telefon')->setValue($user->telefon);
        }
}

?>
