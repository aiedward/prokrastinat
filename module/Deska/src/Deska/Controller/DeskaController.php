<?php

namespace Deska\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Deska\Entity\Oglas;
use Deska\Form\DeskaForm;

class DeskaController extends BaseController 
{

    /**
     * @var Deska\Repository\Oglas
     */
    protected $deska_repository;

    public function indexAction() 
    {
        $query = $this->getEntityManager()->createQuery("SELECT o FROM Deska\Entity\Oglas o");
        $oglasi = $query->getResult();

        return new ViewModel(array(
                'oglasi' => $oglasi,
            ));
    }

    public function dodajAction() 
    {
        $form = new DeskaForm();
        $this->deska_repository = $this->getEntityManager()->getRepository('Deska\Entity\Oglas');

        if ($this->request->isPost()) 
        {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());
            
            if ($form->isValid())
            {
                $oglas = new Oglas();
                $vals = array(
                    'user' => $this->auth->getIdentity(),
                    'naslov' => "{$form->get('naslov')->getValue()}",
                    'vsebina' => "{$form->get('vsebina')->getValue()}",
                    'datum-zapadlosti' => "{$form->get('datum-zapadlosti')->getValue()}",
                );
                    
                $this->deska_repository->saveOglas($oglas, $vals);
                return $this->redirect()->toRoute('deska');
            }
        }

        return array('form' => $form);
    }

    public function preglejAction() 
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->deska_repository = $this->getEntityManager()->getRepository('Deska\Entity\Oglas');

        $oglas = $this->deska_repository->getOglasById($id);

        return new ViewModel(array('oglas' => $oglas));
    }
    
    public function urediAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        $this->deska_repository = $this->getEntityManager()->getRepository('Deska\Entity\Oglas');

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
                    'naslov' => "{$form->get('naslov')->getValue()}",
                    'vsebina' => "{$form->get('vsebina')->getValue()}",
                    'datum-zapadlosti' => "{$form->get('datum-zapadlosti')->getValue()}",
                );
                    
                $this->deska_repository->saveOglas($oglas, $vals);
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
