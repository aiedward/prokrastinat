<?php
namespace Datoteke\Form;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\InputFilter\Factory;
use Zend\InputFilter;
use Zend\Validator;

class DatotekaForm extends Form {
    /*public function __construct()
    {
        parent::__construct('fileUpload');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');

        $this->add(array(
            'name' => 'file',
            'type' => 'File',
            'options' => array(
                'label' => 'Datoteka',
                'required' => true
            ),
            'attributes' => array(
                'id' => 'file',
            )
        ));
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter\InputFilter();

        // File Input
        $file = new InputFilter\FileInput('file');
        //$file->setRequired(true);

        $inputFilter->add($file);
        
        return $inputFilter;
    }

    public function fill($data) {
        $this->setData(array(
            'file' => $data['file'],
        ));
    }
    
    public function createInputFilter()
    {
        $inputFilter = new InputFilter\InputFilter();

        // File Input
        $file = new InputFilter\FileInput('file');
        $file->setRequired(true);
        $file->getFilterChain()->attachByName(
            'file',
            array(
                'target'          => dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data/uploads/',
                'randomize'       => true,
                'overwrite'       => true,
                'use_upload_name' => true,
            )
        );
        $inputFilter->add($file);

        return $inputFilter;
    }*/
    
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->addElements();
        $this->setInputFilter($this->createInputFilter());
    }

    public function addElements()
    {
        // Text Input
        $text = new Element\Text('text');
        $text->setLabel('Text Entry');
        $this->add($text);
        
                // File Input
        $file = new Element\File('file');
        $file
            ->setLabel('File Input')
            ->setAttributes(array(
                'id' => 'file',
            ));
        $this->add($file);
        
                $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Nalozi datoteko',
                'class' => 'btn btn-primary'
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
        /*$file->getFilterChain()->attachByName(
            'filerenameupload',
            array(
                'target'          => dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data/uploads/',
                'randomize'       => true,
                'overwrite'       => true,
                'use_upload_name' => true,
            )
        );*/
        $inputFilter->add($file);

        // Text Input
        $text = new InputFilter\Input('text');
        $text->setRequired(true);
        $inputFilter->add($text);

        return $inputFilter;
    }
}