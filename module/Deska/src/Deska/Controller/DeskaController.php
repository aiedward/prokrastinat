<?php
namespace Deska\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DeskaController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
