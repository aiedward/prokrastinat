<?php

namespace Deska\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Deska\Entity\Oglas;
use Deska\Form\DeskaForm;

class DeskaController extends BaseController 
{
    protected $deska_repository;

    public function indexAction() 
    {   
        $oglasi = $this->em->getRepository('Deska\Entity\Oglas')->findAll();

        return new ViewModel(array(
                'oglasi' => $oglasi,
            ));
        // test
    }

    public function dodajAction() 
    {
        $form = new DeskaForm();
        $this->deska_repository = $this->em->getRepository('Deska\Entity\Oglas');

        if ($this->request->isPost()) 
        {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());
            
            if ($form->isValid())
            {
                $oglas = new Oglas();
                $vals = array(
                    'user' => $this->auth->getIdentity(),
                    'naslov' => $form->get('naslov')->getValue(),
                    'vsebina' => $form->get('vsebina')->getValue(),
                    'datum-zapadlosti' => $form->get('datum-zapadlosti')->getValue(),
                );
                    
                $this->deska_repository->saveOglas($oglas, $vals);
                $this->getEntityManager()->flush();
                return $this->redirect()->toRoute('deska');
            }
        }

        return array('form' => $form);
    }

    public function preglejAction() 
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->deska_repository = $this->em->getRepository('Deska\Entity\Oglas');

        $oglas = $this->deska_repository->find($id);

        return new ViewModel(array('oglas' => $oglas));
    }
    
    public function urediAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        $this->deska_repository = $this->em->getRepository('Deska\Entity\Oglas');

        $oglas = $this->deska_repository->getOglasById($id);        
        $form = new DeskaForm();
        
        $form->setData(array(
            'id' => $oglas->id,
            'naslov' => $oglas->naslov,
            'vsebina' => $oglas->vsebina,
            'datum-zapadlosti' => $oglas->datum_zapadlosti,
        ));
        
        $form->get('submit')->setAttribute('value', 'Uredi');
        
        if ($this->request->isPost())
        {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());
            
            if ($form->isValid())
            {
                $vals = array(
                    'user' => $this->auth->getIdentity(),
                    'naslov' => $form->get('naslov')->getValue(),
                    'vsebina' => $form->get('vsebina')->getValue(),
                    'datum-zapadlosti' => $form->get('datum-zapadlosti')->getValue(),
                );
                    
                $this->deska_repository->saveOglas($oglas, $vals);
                $this->em->flush();
                return $this->redirect()->toRoute('deska');
            }
        }
        
        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    
    public function brisiAction()
    {
        // TODO: Brisanje 
        $id = (int)$this->params()->fromRoute('id', 0);
        
        
    }
}
