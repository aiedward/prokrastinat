<?php

namespace Urniki\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Urniki\Form\UrnikiForm;

class UrnikiController extends BaseController
{   
    public function indexAction()
    {
        
        
        $form = new UrnikiForm(null);
        
        return new ViewModel(array('form' => $form));
    }
}
