<?php
namespace Novice\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\Factory;
use Zend\InputFilter;
use Zend\Validator;

class ParseForm extends Form {
    public function __construct($options)
    {
        parent::__construct();
        $this->addElements($options);
        $this->setInputFilter($this->createInputFilter());
    }

    public function addElements($options)
    {     
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'kategorija',
            'options' => array(
                'label' => 'Kategorija: ',
                'value_options' => $options,
            ),
            'attributes' => array(
                'id' => 'select-kategorija',
            ),
        ));
 
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Najdi novice',
                'class' => 'btn btn-primary'
            ),
            'options' => array(
                'primary' => true
            ),
        ));
    }

    public function createInputFilter()
    {
        $inputFilter = new InputFilter\InputFilter();

        // Kategorija Input
        $kategorija = new InputFilter\Input('kategorija');
        $kategorija->setRequired(true);
        $inputFilter->add($kategorija);

        return $inputFilter;
    }
}