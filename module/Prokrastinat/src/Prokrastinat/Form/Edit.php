<?php
namespace Prokrastinat\Form;

use Zend\Form\Element;
use Zend\Form\Form;

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
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'min' => 2,
						'max' => 30,
					),
				),
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
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'min' => 2,
						'max' => 30,
					),
				),
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
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'min' => 6,
						'max' => 100,
					),
				),
			),
		));
		//NASLOV
		$this->add(array(
			'name' => 'naslov',
			'type' => 'Text',
			'options' => array(
				'label' => 'Naslov',
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 64,
					),
				),
			),
		));
		//MESTO
		$this->add(array(
			'name' => 'mesto',
			'type' => 'Text',
			'options' => array(
				'label' => 'Mesto',
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 64,
					),
				),
			),
		));
		//DRŽAVA
		$this->add(array(
			'name' => 'drzava',
			'type' => 'Text',
			'options' => array(
				'label' => 'Država',
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 64,
					),
				),
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
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 255,
					),
				),
			),
		));
		//SPLETNA STRAN
		$this->add(array(
			'name' => 'splet',
			'type' => 'Text',
			'options' => array(
				'label' => 'Spletna stran',
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 64,
					),
				),
			),
		));
		//ICQ
		$this->add(array(
			'name' => 'icq',
			'type' => 'Text',
			'options' => array(
				'label' => 'ICQ',
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 16,
					),
				),
			),
		));
		//SKYPE
		$this->add(array(
			'name' => 'skype',
			'type' => 'Text',
			'options' => array(
				'label' => 'Skype',
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 64,
					),
				),
			),
		));
		//AIM
		$this->add(array(
			'name' => 'aim',
			'type' => 'Text',
			'options' => array(
				'label' => 'AIM',
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 64,
					),
				),
			),
		));
		//YAHOO
		$this->add(array(
			'name' => 'yahoo',
			'type' => 'Text',
			'options' => array(
				'label' => 'Yahoo',
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 64,
					),
				),
			),
		));
		//TELEFON
		$this->add(array(
			'name' => 'telefon',
			'type' => 'Text',
			'options' => array(
				'label' => 'Telefon',
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'max' => 32,
					),
				),
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
