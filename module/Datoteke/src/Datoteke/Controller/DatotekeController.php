<?php
namespace Datoteke\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
     
use Datoteke\Model\Datoteke,
    Datoteke\Form\DatotekeForm;
 
use Zend\Validator\File\Size;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\DateTime;
 
class DatotekeController extends AbstractActionController
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
                    $adapter->setDestination(dirname(__DIR__).'/assets');
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
            $file->setOpis($form->get('opis')->getValue());
            $file->setImeDatoteke($form->get('fileupload')->getValue());
            $file->setDatum_uploada(new DateTime('now'));
            $file->setSt_prenosov(0);

            $objectManager->persist($file);
            $objectManager->flush();
            return $this->redirect()->toRoute('datoteke');
            }
            
        }
        return array('form' => $form);
    }
    
    
    protected $datotekeTable;
    public function indexAction()
    {
        return new ViewModel(array('datoteke' => $this->getDatotekeTable()->fetchAll(),
        ));
    }
    
      public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('datoteke');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Ne');
            if ($del == 'Da') {
                $id = (int) $request->getPost('id');
                $datoteka = $this->getEvent()->getRouteMatch()->getParam('file');
                unlink(dirname(__DIR__).'/assets/'.$datoteka);
                $this->getDatotekeTable()->deleteDatoteke($id);
            }

            return $this->redirect()->toRoute('datoteke');
        }

        return array(
            'id'    => $id,
            'datoteke' => $this->getDatotekeTable()->getDatoteke($id)
        );
    }
    
    public function getDatotekeTable()
    {
        if (!$this->datotekeTable) {
            $sm = $this->getServiceLocator();
            $this->datotekeTable = $sm->get('Datoteke\Model\DatotekeTable');
        }
        return $this->datotekeTable;
    }
    
    public function downloadAction()
    {
        $datoteka = $this->getEvent()->getRouteMatch()->getParam('file');
        $file = dirname(__DIR__).'/assets/'.$datoteka;

        $response = $this->getResponse();
        $response->getHeaders()
             ->addHeaderLine('content-type', 'application/force-download')
             ->addHeaderLine('content-length', filesize($file))
             ->addHeaderLine('content-Description','File Transfer')
             ->addHeaderLine('content-disposition', "attachment; filename=\"".basename($file)."\"");

        $response->setContent(file_get_contents($file));

        return $response;
    }
}

