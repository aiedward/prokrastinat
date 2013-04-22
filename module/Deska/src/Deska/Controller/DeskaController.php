<?php
namespace Deska\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Deska\Form\DeskaForm;

class DeskaController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function dodajAction()
    {
        $form = new DeskaForm();
        return array('form' => $form);
    }
}
