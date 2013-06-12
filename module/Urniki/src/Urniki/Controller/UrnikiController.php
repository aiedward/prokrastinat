<?php

namespace Urniki\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Urniki\Form\UrnikiForm;

use Zend;

class UrnikiController extends BaseController
{   
    protected $program_repository;
    protected $predmet_repository;
    protected $prostor_repository;
    protected $smer_repository;
    
    public function indexAction()
    {
        /*$this->program_repository = $this->em->getRepository('Urniki\Entity\Program');
        $programi = $this->program_repository->getProgrami();
        
        $this->smer_repository = $this->em->getRepository('Urniki\Entity\Smer');
        $smeri = $this->smer_repository->getSmeri();
        
        $form = new UrnikiForm($programi, $smeri, null);*/
        $form = null;
        $studijRepository = $this->getServiceLocator()->get('doctrine.entitymanager.orm_aips')->getRepository('Prokrastinat\EntityAips\Studij');

        $user = $this->auth->getIdentity();
        $program_id = $studijRepository->getStudij($user)->getVpisi()[0]->ProgramID;
        //$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_urniki');
        //$test = $em->getRepository('Urniki\Entity\TBCourse')->findAll();
        $programRepository = $this->getServiceLocator()->get('doctrine.entitymanager.orm_aips')->getRepository('Prokrastinat\EntityAips\Program');
        $program = $programRepository->find(5);
        return new ViewModel(array('form' => $form, 'test' => $program));
    }
}
