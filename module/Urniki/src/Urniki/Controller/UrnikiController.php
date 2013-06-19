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
        
        $authService = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        if ($authService->hasIdentity()) {
            $user = $authService->getIdentity();
            if ($this->getRequest()->isPost()) {
                $form->setData($this->getRequest()->getPost());
                $program = $form->get('program')->getValue();
                $letnik = $form->get('letnik')->getValue();
                $smer = $form->get('smer')->getValue();
                
                if ($program && $letnik && $smer) {
                    $user->urnik_program = $program;
                    $user->urnik_letnik = $letnik;
                    $user->urnik_smer = $smer;
                    $this->em->persist($user);
                    $this->em->flush($user);
                }
            } else {
                $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_urniki');
                $smer_repository = $em->getRepository('Urniki\Entity\TBBranch');
                $smeri = $smer_repository->getSmeri($user->urnik_program);
                
                $form->get('smer')->setAttribute('options', $smeri);
                $form->setDefaults($user);
            }
        } else {
            $form->remove('save');
        }
        
        return new ViewModel(array('form' => $form, 'test' => null));
    }
    
    public function getUrnikAction()
    {
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_urniki');
        
        $smer_repository = $em->getRepository('Urniki\Entity\TBBranch');
        //$program_repository = $em->getRepository('Urniki\Entity\TBProgram');
        $week_repository = $em->getRepository('Urniki\Entity\TBWeek');
        
        $program = $this->getEvent()->getRouteMatch()->getParam("program");
        $letnik = $this->getEvent()->getRouteMatch()->getParam("letnik");
        $smer = $this->getEvent()->getRouteMatch()->getParam("smer");
        $datum = new \DateTime($this->getEvent()->getRouteMatch()->getParam("datum"));
        
        $predmeti = $smer_repository->find($smer)->courses;
        //$predmeti2 = $program_repository->find($program)->getSmer($letnik)->courses;
        //$predmeti = array_merge($predmeti, $predmeti2);
        $teden = $week_repository->getWeek($datum);
        
        $urnik = array();
        foreach ($predmeti as $p) {
            array_push($urnik, $p->Name);
        }
        
        $urnik_repository = $em->getRepository('Urniki\Entity\TBSchedule');
        $urnik = $urnik_repository->getUrnik($predmeti, $teden);
        
        $output = array();
        
        foreach ($urnik as $u) {
            $konec = $em->createQuery('SELECT c.Start_Hour FROM \Urniki\Entity\TBTime c WHERE c.Time_Id = ?1')
                ->setParameter(1, $u->cas->Time_Id + $u->Duration)
                ->getResult()[0];
            array_push($output, array(
                'ime' => $u->predmet->Name,
                'cas' => $u->cas->Start_Hour,
                'cas_do' => $konec['Start_Hour'],
                'duration' => $u->Duration / 2,
                'ucilnica' => $u->ucilnica->Name,
                'dan' => $u->Day_Id - 1,
                //'profesor_ime' => $u->izvajalec->First_Name,
                //'profesor_priimek' => $u->izvajalec->Last_Name,
            ));
        }
        return new JsonModel(array(
            'urnik' => $output));
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
