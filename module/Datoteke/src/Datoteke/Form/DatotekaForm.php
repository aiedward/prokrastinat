<?php
namespace Datoteke\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter;
use Zend\Validator;

class DatotekaForm extends Form {
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->addElements();
        $this->setInputFilter($this->createInputFilter());
    }

    public function addElements()
    {
        // Text Input
        $text = new Element\Text('opis');
        $text->setLabel('Opis');
        $this->add($text);
        
                // File Input
        $file = new Element\File('file');
        $file
            ->setLabel('Datoteka')
            ->setAttributes(array(
                'id' => 'file',
            ));
        $this->add($file);
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Nalozi datoteko',
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

        //DATOTEKA
        $file = new InputFilter\FileInput('file');
        $file->setRequired(true);
        $file->getValidatorChain()
            ->attachByName('filesize', array('max' => 20480000));  
        $file->getFilterChain()->attachByName(
            'filerenameupload',
            array(
                'target'          => dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data/uploads/',
                'randomize'       => true,
                'overwrite'       => true,
                'use_upload_name' => true,
            )
        );
        $inputFilter->add($file);

        // Text Input
        $text = new InputFilter\Input('opis');
        $text->setRequired(true);
        $inputFilter->add($text);

        return $inputFilter;
    }
}