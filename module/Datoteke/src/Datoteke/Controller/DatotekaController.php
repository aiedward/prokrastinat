<?php
namespace Datoteke\Controller;
 
use Datoteke\Form\DatotekaForm;
use Datoteke\Form\UrediForm;
use Datoteke\Form\IsciForm;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\DateTime;

use Prokrastinat\Controller\BaseController;

class DatotekaController extends BaseController
{
    
    public function dodajAction()
    {
        if (!$this->isGranted('datoteke_dodaj')) {
            return $this->dostopZavrnjen();
        } 
        
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $options = $this->kategorija_repository->getKategorijeInArray();
        
        $form = new DatotekaForm($options);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);

            if ($form->isValid()) {
                    $formData = $form->getData();
                    $user = $this->auth->getIdentity();
                    $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
                    $datRep->saveDatoteka($formData, $user);
                    $this->em->flush();              
                    $this->flashMessenger()->addMessage('Datoteka '. $formData['file']['name'] . ' je bila uspešno nalozena!');
                    return $this->redirect()->toRoute('datoteke');
            }
        }
        return array('form' => $form);
    }
   
    
    
    public function indexAction()
    {
        if (!$this->isGranted('datoteke_index')) {
            return $this->dostopZavrnjen();
        } 

        $orderBy = array('imeDatoteke', 'datum_uploada', 'st_prenosov', 'opis', 'velikost', 'kategorija');

        $order = 'st_prenosov';
        if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
            $order = $_GET['orderBy'];
        }      
        $sort = array('asc', 'desc');
        $sort1 = 'desc';
        if (isset($_GET['sort']) && in_array($_GET['sort'], $sort)) {
            $sort1 = $_GET['sort'];
        }
        $form = new IsciForm();
        $isci = $this->request->getPost('iskalniNiz'); 
        if (!$isci) {
            $query = $this->em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d ORDER BY d.".$order." ".$sort1);
            $datoteke = $query->getResult();
        }
        else {
            $query = $this->em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d WHERE d.opis LIKE '%".$isci."%' OR d.imeDatoteke LIKE '%".$isci."%' ORDER BY d.".$order." ".$sort1);
            $datoteke = $query->getResult();
        }       
        
        $user = $this->auth->getIdentity();
        
        return new ViewModel(array('datoteke' => $datoteke, 'form' => $form, 'user' => $user, 'flashMessages' => $this->flashMessenger()->getMessages()));
    }
    
    public function brisiAction()
    {
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
        if (!($this->imaPravico('datoteke_brisi', $dat->user))) {
            return $this->dostopZavrnjen();
        } 
            $datRep->deleteDatoteka($dat);
            $this->em->flush();
            $this->flashMessenger()->addMessage('Datoteka je bila uspešno izbrisana!');
            return $this->redirect()->toRoute('datoteke');    
    }
    
    public function downloadAction()
    {
        if (!$this->isGranted('datoteke_download')) {
            return $this->dostopZavrnjen();
        } 
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
        $datRep->increaseDownloadCounter($dat);
        
        $response = $this->getResponse();
        $datRep->downloadDatoteka($dat, $response);
        
        $this->em->flush();
        
        return $response;
    }
    
    public function pregledAction(){
        if (!$this->isGranted('datoteke_pregled')) {
            return $this->dostopZavrnjen();
        } 
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);

        $datRep->increaseViewCounter($dat);
        $this->em->flush();
        
        return new ViewModel(array('datoteka' => $dat));        
    }
    
    public function urediAction(){        
        $request = $this->getRequest();  
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
       
        if (!($this->imaPravico('datoteke_uredi', $dat->user))) {
            return $this->dostopZavrnjen();
        }  
        
        $this->kategorija_repository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
        $options = $this->kategorija_repository->getKategorijeInArray();
        
        $form = new UrediForm($options);     
        $form->get('opis')->setValue($dat->opis);
        $form->get('kategorija')->setValue($dat->kategorija);
        $form->setData($request->getPost());
        
        if ($request->isPost()) {
            if($form->isValid()){
                //$form->setInputFilter($form->getInputFilter());
                $dat->opis = $request->getPost('opis');
                $dat->kategorija = $this->em->find('Prokrastinat\Entity\Kategorija', $form->get('kategorija')->getValue());
                $this->em->persist($dat);
                $this->em->flush();
                return $this->redirect()->toRoute('datoteke');
            }

        }
        return array('datoteke' => $dat, 'form' => $form, 'id' => $id);        
    }
       
    
    public function mojeAction()
    {
        if (!$this->isGranted('datoteke_moje')) {
            return $this->dostopZavrnjen();
        } 
        $user = $this->auth->getIdentity();
        
        $orderBy = array('imeDatoteke', 'datum_uploada', 'st_prenosov', 'opis', 'velikost', 'kategorija');
        $order = 'st_prenosov';
        if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
            $order = $_GET['orderBy'];
        }      
        $sort = array('asc', 'desc');
        $sort1 = 'desc';
        if (isset($_GET['sort']) && in_array($_GET['sort'], $sort)) {
            $sort1 = $_GET['sort'];
        }
     
        $query = $this->em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d WHERE d.user=?1 ORDER BY d.".$order." ".$sort1);
        $query->setParameter(1, $user->id);
        $datoteke = $query->getResult();
        
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $skupna_velikost = $datRep->getUploadSize($user);
        
        return new ViewModel(array('datoteke' => $datoteke, 'velikost' => $skupna_velikost, 'user' => $user));
    }    
    
    
    
}

