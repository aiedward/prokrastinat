<?php 
namespace Prokrastinat\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class Changepw extends Form {
	public function __construct () {
		parent::__construct('changepw');
		$this->setAttribute('method', 'post');
                
		$this->add(array(
			'name' => 'id',
			'type' => 'Hidden'));
                
		$this->add(array(
			'name' => 'password',
			'type' => 'Password',
			'options' => array(
				'label' => 'Trenutno geslo*',
				'required' => true,
			)
		));

		$this->add(array(
			'name' => 'password_novo',
			'type' => 'Password',
			'options' => array(
				'label' => 'Novo geslo*',
				'required' => true,
			)
		));
                
                $this->add(array(
			'name' => 'password_novo_conf',
			'type' => 'Password',
			'options' => array(
				'label' => 'Novo geslo (ponovno)*',
				'required' => true,
			)
		));

		$this->add(array(
			'name' => 'submit',
			'type' => 'Submit',
			'attributes' => array(
				'value' => 'Zamenjaj',
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
			'name' => 'password',
			'required' => true,
			'filters' => array(
				array('name' => 'StringTrim')
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'min' => 4,
                                                'max' => 16,
					)
				)
			)
		)));
                
                $filter->add($fac->createInput(array(
			'name' => 'password_novo',
			'required' => true,
			'filters' => array(
				array('name' => 'StringTrim')
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'min' => 6,
                                                'max' => 16,
					)
				)
			)
		)));
                
                $filter->add($fac->createInput(array(
			'name' => 'password_novo_conf',
			'required' => true,
			'filters' => array(
				array('name' => 'StringTrim')
			),
			'validators' => array(
				array(
					'name' => 'StringLength',
					'options' => array(
						'min' => 6,
                                                'max' => 16,
					)
				)
			)
		)));
		
		
		
		return $filter;
	}
}