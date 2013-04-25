<?php
namespace Deska\Form;

use Zend\Form\Form;

class DeskaForm extends Form
{
	public function __construct()
	{
		parent::__construct('dodaj_oglas');
		$this->setAttribute('method', 'post');

		$this->add(array(
			'name' => 'id',
			'type' => 'hidden',
		));

		$this->add(array(
			'type' => 'Zend\Form\Element\Text',
			'name' => 'naslov',
			'options' => array(
				'label' => 'Naslov ',
			),
			'attributes' => array(
				'id' => 'txt-naslov',
			),
		));

		$this->add(array(
			'type' => 'Zend\Form\Element\Textarea',
			'name' => 'vsebina',
			'options' => array(
				'label' => 'Vsebina ',
			),
			'attributes' => array(
				'id' => 'form-textarea',
				'cols' => '250',
				'rows' => '10',
			),
		));

		// TODO: oznake

		$this->add(array(
			'type' => 'Zend\Form\Element\Date',
			'name' => 'datum-zapadlosti',
			'options' => array(
				'label' => 'Zapade ', //
			),
			'attributes' => array(
				'id' => 'dp-zapadlost',
				'min' => '2013-01-01',
				'max' => '2013-12-12',
				'step' => '1',
			),
		));

		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'type' => 'submit',
				'value' => 'Dodaj',
				'id' => 'submitbutton',
				'class' => 'btn btn-primary',
			),
			'options' => array(
				'primary' => true,
			),
		));
	}
}