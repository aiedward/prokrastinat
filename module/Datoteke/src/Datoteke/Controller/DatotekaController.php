<?php
namespace Datoteke\Controller;
 
use Datoteke\Model\Datoteke;
use Datoteke\Form\DatotekaForm;
use Datoteke\Form\EditForm;
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
        $user = $this->auth->getIdentity();
        
        //$this->zahtevajLogin();
        
        $form = new DatotekaForm();
        $request = $this->getRequest();

        if ($this->getRequest()->isPost()) {
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
       
        $query = $this->em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d ORDER BY d.".$order." ".$sort1);
        $datoteke = $query->getResult();
        
        return new ViewModel(array('datoteke' => $datoteke));
    }
    
    public function deleteAction()
    {
        $this->zahtevajLogin();
    
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
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
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
        $datRep->increaseDownloadCounter($dat);
        $this->em->flush();
        
        $file = $_SERVER['DOCUMENT_ROOT'] .'prokrastinat/data/uploads/'.$dat->randomImeDatoteke;

        if(!file_exists($file)) {

        }
        else{
            $fileContents = file_get_contents($file);

            $response = $this->getResponse();
            $response->setContent($fileContents);

            $headers = $response->getHeaders();

            $headers->clearHeaders()
                ->addHeaderLine('Content-Type', 'application/octet-stream')
                ->addHeaderLine('Content-Disposition', 'attachment; filename="' . $dat->imeDatoteke . '"')
                ->addHeaderLine('Content-Length', strlen($fileContents));

            return $this->response;
        }
    }
    
    public function viewAction(){
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);

        $datRep->increaseViewCounter($dat);
        $this->em->flush();
        
        return new ViewModel(array('datoteke' => $dat));        
    }
    
    public function editAction(){
        $this->zahtevajLogin();
        
        $form = new EditForm();
        
        //$form->setInputFilter($dat->getInputFilter());
        
        $request = $this->getRequest();  
        $datRep = $this->em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
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
        $user = $this->auth->getIdentity();
        $this->zahtevajLogin();
        
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

    public function searchAction()
    {
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
        $iskalniNiz = $this->getRequest()->getPost('isci', null);
        $query = $this->em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d WHERE d.opis LIKE '%".$iskalniNiz."%' OR d.imeDatoteke LIKE '%".$iskalniNiz."%' ORDER BY d.".$order." ".$sort1);
        $datoteke = $query->getResult();
        
        return new ViewModel(array('datoteke' => $datoteke));
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

