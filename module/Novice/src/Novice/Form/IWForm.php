<?php 
namespace Novice\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class IWForm extends Form {
    public function __construct () {
        parent::__construct('IWForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Posodobi',
            ),
            'options' => array(
                'primary' => true,
            ),
        ));
    }
}