<?php

namespace Urniki\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Urniki\Form\UrnikiForm;

class UrnikiController extends BaseController
{
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_urniki');
        $program_repository = $em->getRepository('Urniki\Entity\TBProgram');
        $programi = $program_repository->getProgrami();
        
        $smer_repository = $em->getRepository('Urniki\Entity\TBBranch');
        $smeri = $smer_repository->getSmeri();
        
        $form = new UrnikiForm($programi, $smeri, null);
        
        //$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_urniki');
        //$test = $em->getRepository('Urniki\Entity\TBCourse')->findAll();
        return new ViewModel(array('form' => $form, 'test' => null));
    }
}
