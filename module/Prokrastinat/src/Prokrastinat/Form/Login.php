<?php 
namespace Prokrastinat\Form;

use Zend\Form\Element;
use Zend\Form\Form;

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
				'primary' => true
			),
		));
	}
}