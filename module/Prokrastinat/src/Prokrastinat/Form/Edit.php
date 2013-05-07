<?php
namespace Prokrastinat\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class Edit extends Form {
	public function __construct () {
		parent::__construct('Edit');
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
		//JEZIK
		$this->add(array(
			'name' => 'jezik',
			'type' => 'Select',
			'options' => array(
				'label' => 'Jezik strani*',
				'value_options' => array(
					'sl_SL' => 'Slovenščina',
					'en_US' => 'English',
				),
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

}

?>
