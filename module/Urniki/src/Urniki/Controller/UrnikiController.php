<?php

namespace Urniki\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Urniki\Form\UrnikiForm;

class UrnikiController extends BaseController
{
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_urniki');
        $program_repository = $em->getRepository('Urniki\Entity\TBProgram');
        $programi = $program_repository->getProgrami();
        
        
        
        $form = new UrnikiForm($programi, null, null);
        
        //$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_urniki');
        //$test = $em->getRepository('Urniki\Entity\TBCourse')->findAll();
        return new ViewModel(array('form' => $form, 'test' => null));
    }
    
    public function getUrnikAction()
    {
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_urniki');
        $smer_repository = $em->getRepository('Urniki\Entity\TBBranch');
        
        $program = $this->getEvent()->getRouteMatch()->getParam("program");
        $smer = $this->getEvent()->getRouteMatch()->getParam("smer");
        $letnik = $this->getEvent()->getRouteMatch()->getParam("letnik");
        $datum = new \DateTime($this->getEvent()->getRouteMatch()->getParam("datum"));
        
        $urnik = $smer_repository->find($smer)->courses;
        return new JsonModel(array(
            'urnik' => $urnik));
    }
    
    public function getSmeriAction()
    {
        $program = $this->getEvent()->getRouteMatch()->getParam("program");
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_urniki');
        $smer_repository = $em->getRepository('Urniki\Entity\TBBranch');
        $smeri = $smer_repository->getSmeri($program);
        return new JsonModel(array(
            'smeri' => $smeri));
    }
}
