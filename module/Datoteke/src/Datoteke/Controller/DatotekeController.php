<?php
namespace Datoteke\Controller;
 
use Datoteke\Model\Datoteke;
use Datoteke\Form\DatotekeForm;
use Datoteke\Form\EditForm;
use Datoteke\Entity\Datoteka;
use Zend\Validator\File\Size;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\DateTime;

use Prokrastinat\Controller\BaseController;
 
class DatotekeController extends BaseController
{

    public function addAction()
    {
        $form = new DatotekeForm();
        $request = $this->getRequest();  
        if ($request->isPost()) {
             
            $datoteka = new Datoteke();
            $form->setInputFilter($datoteka->getInputFilter());
             
            $nonFile = $request->getPost()->toArray();
            $File = $this->params()->fromFiles('fileupload');
            $data = array_merge(
                 $nonFile,
                 array('fileupload'=> $File['name'])
             );
            $form->setData($data);
              
            if ($form->isValid()) {
                 
                $size = new Size(array('min'=>1));
                 
                $adapter = new \Zend\File\Transfer\Adapter\Http(); 
                $adapter->setValidators(array($size), $File['name']);
                if (!$adapter->isValid()){
                    $dataError = $adapter->getMessages();
                    $error = array();
                    foreach($dataError as $key=>$row)
                    {
                        $error[] = $row;
                    }
                    $form->setMessages(array('fileupload'=>$error ));
                } else {
                    $adapter->setDestination(dirname(dirname(dirname(dirname(dirname(__DIR__))))).'/data');
                    if ($adapter->receive($File['name'])) {
                        $datoteka->exchangeArray($form->getData());
                        //echo 'Datoteka '.$datoteka->fileupload. ' uspešno naložena!';
                    }
                }  
             
            $form->setInputFilter($datoteka->getInputFilter());
             
            $objectManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');

            $file= new \Datoteke\Entity\Datoteka();
            $file->opis = $form->get('opis')->getValue();
            $file->imeDatoteke = $form->get('fileupload')->getValue();
            $file->datum_uploada = new DateTime('now');
            $file->st_prenosov = 0;

            $objectManager->persist($file);
            $objectManager->flush();
            return $this->redirect()->toRoute('datoteke');
            }
            
        }
        return array('form' => $form);
    }
    
    
    public function indexAction()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT o FROM Datoteke\Entity\Datoteka o");
        $datoteke = $query->getResult();
        
        return new ViewModel(array('datoteke' => $datoteke));
    }
    
      public function deleteAction()
    {
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
                unlink(dirname(dirname(dirname(dirname(dirname(__DIR__))))).'\data\\'.$dat->imeDatoteke);
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

    
    public function downloadAction()
    {
        $em = $this->getEntityManager();
        $datRep = $em->getRepository('Datoteke\Entity\Datoteka');
        $id = (int) $this->params()->fromRoute('id', 0);
        $dat = $datRep->find($id);
        
        $datRep->increaseCounter($dat);
        $em->flush();
        
        $file = dirname(dirname(dirname(dirname(dirname(__DIR__))))).'\data\\'.$dat->imeDatoteke;

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
        
        return new ViewModel(array('datoteke' => $dat));        
    }
    
    public function editAction(){
        
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
    
    }

