<?php
namespace Prokrastinat\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class KategorijeForm extends Form {
    public function __construct ($kategorije) {
        parent::__construct('KategorijeForm');

        if (!empty($kategorije)) {
           $this->add(array(
                'type' => 'Zend\Form\Element\MultiCheckbox',
                'name' => 'kategorije',
                'options' => array(
                    'label' => 'Kategorije',
                    'value_options' => $kategorije,
                ),
                'attributes' => array(
                    'value' => array_keys($kategorije)
                )
            ));
        }

        $this->add(array(
            'name' => 'kategorija',
            'type' => 'Text',
            'options' => array(
                'label' => 'Dodaj kategorijo',

            ),
            'attributes' => array(
                'class' => 'kategorija input-xxlarge',
                'data-provide' => 'typeahead',
            )
        ));

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
       
    public function fill (\Prokrastinat\Entity\User $user) {

    }
}

?>
