<?php 
namespace Prokrastinat\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class Login extends Form {
	public function __construct () {
		parent::__construct('login');
		$this->setAttribute('method', 'post');
		$this->add(array(
			'name' => 'id',
			'type' => 'Hidden'));
		$this->add(array(
			'name' => 'username',
			'type' => 'Text',
			'options' => array(
				'label' => 'Uporabniško ime',
				'required' => true,
			),
		));

		$this->add(array(
			'name' => 'password',
			'type' => 'Password',
			'options' => array(
				'label' => 'Geslo',
				'required' => true,
			)
		));

		$this->add(array(
			'name' => 'submit',
			'type' => 'Submit',
			'attributes' => array(
				'value' => 'Prijava',
			),
			'options' => array(
				'primary' => true,
			),
		));
	}
	
	public function getInputFilter () {
		$fac = new Factory();
		$filter = new InputFilter();
		
		$filter->add($fac->createInput(array(
			'name' => 'username',
			'required' => true,
			'filters' => array(
				array('name' => 'StringTrim')
			),
			'validators' => array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							Validator\NotEmpty::IS_EMPTY => 'Vnesite uporabniško ime'
						)
					)
				)
			)
		)));
		
		$filter->add($fac->createInput(array(
			'name' => 'password',
			'required' => true,
			'validators' => array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							Validator\NotEmpty::IS_EMPTY => 'Vnesite geslo'
						)
					)
				)
			)
		)));
		
		return $filter;
	}
}