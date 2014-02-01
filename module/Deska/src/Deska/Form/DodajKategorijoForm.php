<?php

namespace Deska\Form;

use Zend\Form\Form;
use Prokrastinat\Entity\Kategorija;


class DodajKategorijoForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('dodaj_kategorijo');
        $this->setAttribute('method', 'post');
        
        // ID
        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));
        
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
    
    public function fill(Kategorija $kat)
    {
        $this->get('id')->setValue($kat->id);
        $this->get('ime')->setValue($kat->ime);
    }
}