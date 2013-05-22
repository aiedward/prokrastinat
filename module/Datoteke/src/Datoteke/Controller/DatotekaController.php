<?php
namespace Datoteke\Controller;
 
use Datoteke\Model\Datoteke;
use Datoteke\Form\DatotekaForm;
use Datoteke\Form\EditForm;
use Datoteke\Form\IsciForm;
use Datoteke\Entity\Datoteka;
use Prokrastinat\Entity\User;
use Zend\Validator\File\Size;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\DateTime;

use Prokrastinat\Controller\BaseController;

class DatotekaController extends BaseController
{
    
    public function addAction()
    {
        if (!$this->isGranted('datoteke_add')) {
            return $this->dostopZavrnjen();
        } 
        
        $form = new DatotekaForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);

            if ($form->isValid()) {
                    $formData = $form->getData();
                    $file = new \Datoteke\Entity\Datoteka();
                    $file->opis = $formData['opis'];
                    $file->imeDatoteke = $formData['file']['name'];
                    $file->datum_uploada = new DateTime('now');
                    $file->st_prenosov = 0;
                    $file->st_ogledov = 0;
                    $file->velikost = $formData['file']['size'];
                    $file->user = $this->auth->getIdentity();
                    
                    $keys = parse_url($formData['file']['tmp_name']);
                    $path = explode("/", $keys['path']);
                    $last = end($path);
                    $file->randomImeDatoteke = $last;
                    
                    $this->em->persist($file);
                    $this->em->flush();              
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
        
        $orderBy = array('imeDatoteke', 'datum_uploada', 'st_prenosov', 'opis', 'velikost');

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
        
        
        return new ViewModel(array('datoteke' => $datoteke, 'form' => $form));
    }
    
    public function deleteAction()
    {
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
        if (!(($this->isGranted('datoteke_delete'))||$this->jeAvtor($dat->user))) {
            return $this->dostopZavrnjen();
        } 
        
        if($dat->user == $this->auth->getIdentity()){ //da ni mogoče brisati tujih datotek
                    
            $id = (int) $this->params()->fromRoute('id', 0);
            if (!$id) {
                return $this->redirect()->toRoute('datoteke');
            }

            $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
            $dat = $datRep->find($id);

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'Ne');
                if ($del == 'Da') {
                    $this->em->flush();
                    unlink(dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data/uploads/'.$dat->imeDatoteke);
                    $datRep->deleteDatoteka($dat);
                    $this->em->flush();
                }
                return $this->redirect()->toRoute('datoteke');
            }
            return array(
                'id'    => $id,
                'datoteke' => $dat
            );
            
        }

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
    
    public function viewAction(){
        if (!$this->isGranted('datoteke_view')) {
            return $this->dostopZavrnjen();
        } 
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);

        $datRep->increaseViewCounter($dat);
        $this->em->flush();
        
        return new ViewModel(array('datoteke' => $dat));        
    }
    
    public function editAction(){
        $request = $this->getRequest();  
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
       
        if (!(($this->isGranted('datoteke_edit'))||$this->jeAvtor($dat->user))) {
            return $this->dostopZavrnjen();
        }  
        
        $form = new EditForm();
        
        //$form->setInputFilter($dat->getInputFilter());
        
        
        $form->get('opis')->setValue($dat->opis);
        
        if ($request->isPost()) {
            $dat->opis = $request->getPost('opis');
            $this->em->persist($dat);
            $this->em->flush();
            return $this->redirect()->toRoute('datoteke');

        }
        return array('datoteke' => $dat, 'form' => $form, 'id' => $id);        
        }
       
    
    public function myfilesAction()
    {
        if (!$this->isGranted('datoteke_myfiles')) {
            return $this->dostopZavrnjen();
        } 
        $user = $this->auth->getIdentity();
      //  $this->zahtevajLogin();
        
        $orderBy = array('imeDatoteke', 'datum_uploada', 'st_prenosov', 'opis', 'velikost');

        $order = 'st_prenosov';
        if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
            $order = $_GET['orderBy'];
        }      
        $sort = array('asc', 'desc');
        $sort1 = 'desc';
        if (isset($_GET['sort']) && in_array($_GET['sort'], $sort)) {
            $sort1 = $_GET['sort'];
        }
        
        
        $query = $this->em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d WHERE d.user=".$user->id."ORDER BY d.".$order." ".$sort1);
        $datoteke = $query->getResult();
        
        $skupna_velikost = $this->getUploadSize($user);
        
        return new ViewModel(array('datoteke' => $datoteke, 'velikost' => $skupna_velikost));
    }    
    
    public function getUploadSize($user)
    {
        $query = $this->em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d WHERE d.user=".$user->id);
        $datoteke = $query->getResult(); 
        $skupna_velikost = 0;
        foreach ($datoteke as $row)
        {
            $skupna_velikost += $row->velikost;            
        }
        return $skupna_velikost;
    }
    
    
}

