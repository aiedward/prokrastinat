<?php

namespace Datoteke\Form;
 
use Zend\Form\Form;
use Zend\InputFilter;
 
class EditForm extends Form
{
    public function __construct($options)
    {
        parent::__construct('Datoteke');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');
         
        $this->add(array(
            'name' => 'opis',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Opis',
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'kategorija',
            'options' => array(
                'label' => 'Kategorija: ',
                'value_options' => $options,
            ),
            'attributes' => array(
                'id' => 'select-kategorija',
            ),
        ));
 

         
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Uveljavi spremembe',
                'class' => 'btn btn-primary'
            ),
        )); 
    }
    public function getInputFilter()
    {
        $inputFilter = new InputFilter\InputFilter();

        // Text Input
        $text = new InputFilter\Input('opis');
        $text->setRequired(true);
        $inputFilter->add($text);
        
        // Kategorija Input
        $kategorija = new InputFilter\Input('kategorija');
        $kategorija->setRequired(true);
        $inputFilter->add($kategorija);

        return $inputFilter;
    }
}
?>