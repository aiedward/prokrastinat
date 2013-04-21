<?php 
namespace Prokrastinat\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class Login extends Form {
	public function __construct () {
		$this->add(array(
			'name' => 'username',
			'options' => array(
				'label' => 'Uporabniško ime'
			)
		));
		
		$this->add(array(
			'name' => 'password',
			'type' => 'password',
			'option' => array(
				'label' => 'Geslo'
			)
		));
		
		$this->add(array(
			'type' => 'submit'
		));
	}
}