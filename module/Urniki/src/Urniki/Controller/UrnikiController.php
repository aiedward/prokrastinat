<?php

namespace Urniki\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Urniki\Form\UrnikiForm;

class UrnikiController extends BaseController
{   
    protected $program_repository;
    protected $predmet_repository;
    protected $prostor_repository;
    protected $smer_repository;
    
    public function indexAction()
    {
        $this->program_repository = $this->em->getRepository('Urniki\Entity\Program');
        $programi = $this->program_repository->getProgrami();
        
        $this->smer_repository = $this->em->getRepository('Urniki\Entity\Smer');
        $smeri = $this->smer_repository->getSmeri();
        
        $form = new UrnikiForm($programi, $smeri, null);
        
        return new ViewModel(array('form' => $form));
    }
}
