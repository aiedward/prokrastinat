<?php

namespace Deska\Form;

use Zend\Form\Form;


class DodajKategorijoForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('dodaj_kategorijo');
        $this->setAttribute('method', 'post');
        
        // IME KATEGORIJE
        $this->add(array(
            'name' => 'ime',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Ime: ',
            ),
        ));
        
        // GUMB DODAJ
        $this->add(array(
            'name' => 'dodaj',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Dodaj',
                'id' => 'btn_dodaj',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}