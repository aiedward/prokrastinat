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
        if (!$this->isGranted('deska_index')) {
            return $this->dostopZavrnjen();
        }
        
        $this->deska_repository = $this->em->getRepository('Deska\Entity\Oglas');

        $user = $this->auth->getIdentity();
        $kategorije = ($user) ? $user->kategorije : array();
        $options = array();
        foreach ($kategorije as $kategorija) {
            array_push($options, $kategorija->ime);
        }
        
        $form = new FilterForm($options);
        $id = (int)$this->request->getPost('kategorija');
        
        if (!$id) {
            $query = $this->em->createQuery("SELECT o FROM Deska\Entity\Oglas o WHERE o.datum_zapadlosti > CURRENT_DATE() ORDER BY o.datum_objave DESC");
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
        
        $this->deska_repository = $this->em->getRepository('Deska\Entity\Oglas');
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $options = $this->kategorija_repository->getKategorijeInArray();
        $form = new DeskaForm($options);
        
        if ($this->request->isPost()) {
            $oglas = new Oglas();
            $form->setInputFilter($oglas->getInputFilter());
            $form->setData($this->request->getPost());
            
            if ($form->isValid()) {
                //$oglas = new Oglas();
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
        if (!$this->isGranted('deska_pregled')) {
            return $this->dostopZavrnjen();
        }
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $oglas = $this->em->find('Deska\Entity\Oglas', $id);

        return new ViewModel(array('oglas' => $oglas));
    }
    
    public function urediAction()
    {     
        $id = (int)$this->params()->fromRoute('id', 0);
        $oglas = $this->em->find('Deska\Entity\Oglas', $id);
        
        if (!($this->imaPravico('deska_uredi', $oglas->user))) {
            return $this->dostopZavrnjen();
        } 
        
        $this->deska_repository = $this->em->getRepository('Deska\Entity\Oglas');
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $options = $this->kategorija_repository->getKategorijeInArray();
        $form = new DeskaForm($options);
        
        $form->fill($oglas);
        $form->get('submit')->setAttribute('value', 'Uredi');
        
        if ($this->request->isPost()) {
            $form->setInputFilter($oglas->getInputFilter());
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
        if (!$this->isGranted('deska_brisi')) 
            $this->dostopZavrnjen();
        
        $id = (int)$this->params()->fromRoute('id', 0);   
        $oglas = $this->em->find('Deska\Entity\Oglas', $id);
        $this->em->remove($oglas);
        $this->em->flush();    
            
        return $this->redirect()->toRoute('deska');   
    }
    
    public function kategorijeAction()
    {
        if (!$this->isGranted('kategorije_pregled')) 
            $this->dostopZavrnjen();
        
        //$this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        //$kategorije = $this->kategorija_repository->getKategorije();
        $kategorije = $this->em->getRepository('Prokrastinat\Entity\Kategorija')->findAll();
        
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
            $kategorija = new Kategorija();
            $form->setInputFilter($kategorija->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                //$kategorija = new Kategorija();
                $vals = array(
                    'ime' => $form->get('ime')->getValue(),
                );

                $this->kategorija_repository->saveKategorija($kategorija, $vals);
                $this->em->flush();

                return $this->redirect()->toRoute('deska', array('action' => 'kategorije'));
            }
        }
        
        return array(
            'form' => $form,
            'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL,
        );
    }
    
    public function uredikategorijoAction()
    {
        if (!$this->isGranted('kategorije_uredi'))
            $this->dostopZavrnjen();
        
        $id = (int)$this->params()->fromRoute('id', 0);
        $kategorija = $this->em->find('Prokrastinat\Entity\Kategorija', $id);
        
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $options = $this->kategorija_repository->getKategorijeInArray();
        
        $form = new DodajKategorijoForm();
        $form->get('dodaj')->setAttribute('Value', 'Uredi');
        $form->fill($kategorija);
        
        if ($this->request->isPost()) {
            $form->setInputFilter($kategorija->getInputFilter());
            $form->setData($this->request->getPost());
            
            // form is valid
            if ($form->isValid()) {
                $vals = array(
                    'ime' => $form->get('ime')->getValue(),
                );

                $this->kategorija_repository->saveKategorija($kategorija, $vals);
                $this->em->flush();

                return $this->redirect()->toRoute('deska', array('action' => 'kategorije'));
            }
        }
        
        return array(
            'form' => $form,
            'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL,
        );
    }
    
    public function brisikategorijoAction()
    {
        if (!$this->isGranted('kategorije_brisi'))
            $this->dostopZavrnjen();
        
        $id = (int)$this->params()->fromRoute('id', 0);
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        
        $kategorija = $this->em->find('Prokrastinat\Entity\Kategorija', $id);
        $this->em->remove($kategorija);
        $this->em->flush();
        
        return $this->redirect()->toRoute('deska');
        
    }
}
?>