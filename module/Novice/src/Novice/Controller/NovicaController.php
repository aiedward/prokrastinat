<?php
namespace Novice\Controller;

use Zend\View\Model\ViewModel;
use Novice\Entity\Novica;
use Novice\Form\NovicaForm;
use Prokrastinat\Controller\BaseController;
use Novice\Form\UrediForm;

class NovicaController extends BaseController
{
    public function indexAction()
    {
        if (!$this->isGranted('novica_index')) {
            return $this->dostopZavrnjen();
        } 
        $query = $this->em->createQuery("SELECT n FROM Novice\Entity\Novica n");
        $novice = $query->getResult();
        $user = $this->auth->getIdentity();
        
        return new ViewModel(array('novice' => $novice, 'user' => $user));
    }
    
    public function dodajAction()
    {
        
        if (!$this->isGranted('novica_dodaj')) {
            return $this->dostopZavrnjen();
        } 

        $form = new NovicaForm();

        if ($this->request->isPost()) {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $novica = new Novica();
                $novica->user = $this->auth->getIdentity();
                $novica->naslov = $form->get('naslov')->getValue();
                $novica->vsebina = $form->get('vsebina')->getValue();
                $novica->datum_objave = new \DateTime("now");

                $this->em->persist($novica);
                $this->em->flush();

                return $this->redirect()->toRoute('novice');
            }
        }
        
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function pregledAction()
    {
        if (!$this->isGranted('novica_pregled')) {
            return $this->dostopZavrnjen();
        } 
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $novica = $this->em->find('Novice\Entity\Novica', $id);

        return new ViewModel(array('novica' => $novica));
    }
    
    public function urediAction()
    {
        $request = $this->getRequest();  
        $novicaRep = $this->em->getRepository('Novice\Entity\Novica');
        $id = (int) $this->params()->fromRoute('id', 0);
        $novica = $novicaRep->find($id);
        
        if (!(($this->isGranted('novica_uredi'))||$this->jeAvtor($novica->user))) {
            return $this->dostopZavrnjen();
        } 
         
        $form = new UrediForm();     
        $form->get('naslov')->setValue($novica->naslov);
        $form->get('vsebina')->setValue($novica->vsebina);
        $form->setData($request->getPost());
        $form->setInputFilter($form->getInputFilter());
        if ($request->isPost()) {
            if($form->isValid()){
                $novica->naslov = $request->getPost('naslov');
                $novica->vsebina = $request->getPost('vsebina');
                $this->em->persist($novica);
                $this->em->flush();
                return $this->redirect()->toRoute('novice');
            }

        }
        return new ViewModel(array('form' => $form));
    }
}
