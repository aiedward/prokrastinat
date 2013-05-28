<?php
namespace Aips\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Prokrastinat\Controller\BaseController;
use Aips\Entity\Profesor;

class AipsController extends BaseController
{
    public function indexAction()
    {
        // izpis profesorjev
        $profesorji = $this->em->getRepository('Aips\Entity\Profesor')->findAll();
        
        return array(
            'profesorji' => $profesorji,
        );
    }
    
    public function preglejAction()
    {
        $id = (int)$this->params()->fromRoute('id',0);
        $profesor = $this->em->find('Aips\Entity\Profesor', $id);
        
        return array(
            'profesor' => $profesor,
        );
    }
}