<?php
namespace Novice\Form;

use Zend\Form\Form;

class KategorijaForm extends Form
{
    public function __construct($kategorije)
    {
        parent::__construct('kategorija_form');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
           'name' => 'kategorija',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Kategorija: ',
                'value_options' => $kategorije,
                'required' => true,
            ),
            'attributes' => array(
                'id' => 'select-kategorija'
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Filtriraj po kategoriji',
                'id' => 'filtersubmit',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}
