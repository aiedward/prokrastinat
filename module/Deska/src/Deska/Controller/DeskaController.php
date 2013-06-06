<?php

namespace Deska\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Deska\Entity\Oglas;
use Deska\Form\DeskaForm;
use Deska\Form\FilterForm;
use Deska\Form\DodajKategorijoForm;
use Prokrastinat\Entity\Kategorija;

class DeskaController extends BaseController 
{
    protected $deska_repository;
    protected $kategorija_repository;
    
    public function indexAction() 
    {   
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $options = $this->kategorija_repository->getKategorijeInArray();
        
        $form = new FilterForm($options);
        $id = (int)$this->request->getPost('kategorija');
        
        if (!$id) {
            $query = $this->em->createQuery("SELECT o FROM Deska\Entity\Oglas o WHERE o.datum_zapadlosti > CURRENT_DATE()");
            $oglasi = $query->getResult();
        } else {
            $oglasi = $this->deska_repository->getOglasiByKategorija($id);
        }
        
        return new ViewModel(array(
            'oglasi' => $oglasi,
            'form' => $form,
            'id' => $id,
        ));
    }
    
    public function dodajAction() 
    {
        if (!$this->isGranted('deska_dodaj')) 
            $this->dostopZavrnjen();
        
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $options = $this->kategorija_repository->getKategorijeInArray();
        $form = new DeskaForm($options);
        
        if ($this->request->isPost()) {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());
            
            if ($form->isValid()) {
                $oglas = new Oglas();
                $vals = array(
                    'user' => $this->auth->getIdentity(),
                    'naslov' => $form->get('naslov')->getValue(),
                    'vsebina' => $form->get('vsebina')->getValue(),
                    'datum-zapadlosti' => $form->get('datum-zapadlosti')->getValue(),
                    'kategorija' => $this->em->find('Prokrastinat\Entity\Kategorija', $form->get('kategorija')->getValue()),
                );
                    
                $this->deska_repository->saveOglas($oglas, $vals);
                $this->em->flush();
                
                return $this->redirect()->toRoute('deska');
            }
        }

        return array('form' => $form);
    }

    public function preglejAction() 
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $oglas = $this->em->find('Deska\Entity\Oglas', $id);

        return new ViewModel(array('oglas' => $oglas));
    }
    
    public function urediAction()
    {
        if (!$this->isGranted('deska_dodaj')) 
            $this->dostopZavrnjen();
        
        $id = (int)$this->params()->fromRoute('id', 0);
        $oglas = $this->em->find('Deska\Entity\Oglas', $id);
        
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $options = $this->kategorija_repository->getKategorijeInArray();
        $form = new DeskaForm($options);
        
        $form->fill($oglas);
        $form->get('submit')->setAttribute('value', 'Uredi');
        
        if ($this->request->isPost()) {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $vals = array(
                    'user' => $this->auth->getIdentity(),
                    'naslov' => $form->get('naslov')->getValue(),
                    'vsebina' => $form->get('vsebina')->getValue(),
                    'datum-zapadlosti' => $form->get('datum-zapadlosti')->getValue(),
                    'kategorija' => $this->em->find('Prokrastinat\Entity\Kategorija', $form->get('kategorija')->getValue()),
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
        if (!$this->isGranted('deska_dodaj')) 
            $this->dostopZavrnjen();
        
        $id = (int)$this->params()->fromRoute('id', 0);
        
        if ($this->request->isPost()) {
            $del = $this->request->getPost('del', 'No');
            
            if ($del == 'Yes') {
                $id = (int) $this->request->getPost('id');
                
                $oglas = $this->em->find('Deska\Entity\Oglas', $id);
                $this->em->remove($oglas);
                $this->em->flush();
            }
            
            return $this->redirect()->toRoute('deska');
        }
        
        return array(
            'id' => $id,
            'oglas' => $this->em->find('Deska\Entity\Oglas', $id)
        );
    }
    
    public function kategorijeAction()
    {
        if (!$this->isGranted('kategorije_pregled')) 
            $this->dostopZavrnjen();
        
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $kategorije = $this->deska_repository->getKategorije();
        
        return array('kategorije' => $kategorije);
    }
    
    public function dodajkategorijoAction()
    {
        if (!$this->isGranted('kategorije_dodaj'))
            $this->dostopZavrnjen();
        
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $form = new DodajKategorijoForm();
        
        if ($this->request->isPost()) {
            // set input filter
            $form->setData($this->request->getPost());
            
            // is valid
            $kategorija = new Kategorija();
            $vals = array(
                'ime' => $form->get('ime')->getValue(),
            );
            
            $this->kategorija_repository->saveKategorija($kategorija, $vals);
            $this->em->flush();
            
            return $this->redirect()->toRoute('deska');
        }
        
        return array(
            'form' => $form,
            'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL,
        );
    }
}
