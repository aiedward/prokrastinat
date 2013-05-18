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
            
            $File = $this->params()->fromFiles('file');
            $adapter = new \Zend\File\Transfer\Adapter\Http(); 
            if ($form->isValid()) {

                if(!$adapter->isValid()){
                $dataError = $adapter->getMessages();
                    $error = array();
                    foreach($dataError as $key=>$row)
                    {
                        $error[] = $row;
                    }
                    $form->setMessages(array('file'=>$error ));
                } else {
                    $adapter->addFilter('File\Rename',
                    array('target' => dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data/uploads/'.$File['name'],
                        'randomize' => true,
                        'overwrite' => true));
                    $adapter->setDestination(dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data/uploads');
                    if ($adapter->receive($File['name'])) {

                    }
                    else{ 
                    }
                    
                    $em = $this->getEntityManager();
                    $file = new \Datoteke\Entity\Datoteka();
                    $file->opis = "test";
                    $file->imeDatoteke = $File['name'];
                    $file->datum_uploada = new DateTime('now');
                    $file->st_prenosov = 0;
                    $file->st_ogledov = 0;
                    $file->velikost = $File['size'];
                    $file->user = $this->auth->getIdentity();
                    //DODAJ CELOTNO IME
                    //$file->uniqueName = $adapter->getFilter('File\Rename')->getFile();
                    
                    $em->persist($file);
                    $em->flush();
                    
                    return $this->redirect()->toRoute('datoteke');
            }
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
        
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d ORDER BY d.".$order." ".$sort1);
        $datoteke = $query->getResult();
        
        return new ViewModel(array('datoteke' => $datoteke));
    }
    
    public function deleteAction()
    {
        $this->zahtevajLogin();
    
        $em = $this->getEntityManager();
        $datRep = $em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
        if($dat->user == $this->auth->getIdentity()){ //da ni mogoče brisati tujih datotek
                    
            $id = (int) $this->params()->fromRoute('id', 0);
            if (!$id) {
                return $this->redirect()->toRoute('datoteke');
            }

            $em = $this->getEntityManager();
            $datRep = $em->getRepository('Datoteke\Entity\Datoteka');
            $dat = $datRep->find($id);

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'Ne');
                if ($del == 'Da') {
                    $em->flush();
                    unlink(dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data/uploads/'.$dat->imeDatoteke);
                    $datRep->deleteDatoteka($dat);
                    $em->flush();
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
        $em = $this->getEntityManager();
        $datRep = $em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
        $datRep->increaseDownloadCounter($dat);
        $em->flush();
        
        $file = dirname(dirname(dirname(dirname(dirname(__DIR__))))).'\data\\uploads\\'.$dat->imeDatoteke;

        $response = $this->getResponse();
        $response->getHeaders()
             ->addHeaderLine('content-type', 'application/force-download')
             ->addHeaderLine('content-length', filesize($file))
             ->addHeaderLine('content-Description','File Transfer')
             ->addHeaderLine('content-disposition', "attachment; filename=\"".basename($file)."\"");

        $response->setContent(file_get_contents($file));

        return $response;
    }
    
    public function viewAction(){
        $em = $this->getEntityManager();
        $datRep = $em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);

        $datRep->increaseViewCounter($dat);
        $em->flush();
        
        return new ViewModel(array('datoteke' => $dat));        
    }
    
    public function editAction(){
        $this->zahtevajLogin();
        
        $form = new EditForm();
        
        //$form->setInputFilter($dat->getInputFilter());
        
        $request = $this->getRequest();  
        $em = $this->getEntityManager();
        $datRep = $em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
        $form->get('opis')->setValue($dat->opis);
        
        if ($request->isPost()) {
            $dat->opis = $request->getPost('opis');
            $em->persist($dat);
            $em->flush();
            return $this->redirect()->toRoute('datoteke');

        }
        return array('datoteke' => $dat, 'form' => $form, 'id' => $id);        
        }
       
    
    public function myfilesAction()
    {
        $user = $this->auth->getIdentity();
        $this->zahtevajLogin();
        $em = $this->getEntityManager();
        
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
        
        
        $query = $em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d WHERE d.user=".$user->id."ORDER BY d.".$order." ".$sort1);
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
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d WHERE d.opis LIKE '%".$iskalniNiz."%' OR d.imeDatoteke LIKE '%".$iskalniNiz."%' ORDER BY d.".$order." ".$sort1);
        $datoteke = $query->getResult();
        
        return new ViewModel(array('datoteke' => $datoteke));
    }
    
    
    public function getUploadSize($user)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT d FROM Datoteke\Entity\Datoteka d WHERE d.user=".$user->id);
        $datoteke = $query->getResult(); 
        $skupna_velikost = 0;
        foreach ($datoteke as $row)
        {
            $skupna_velikost += $row->velikost;            
        }
        return $skupna_velikost;
    }
    
    
}

