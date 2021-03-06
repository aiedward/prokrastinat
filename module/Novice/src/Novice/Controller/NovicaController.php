<?php
namespace Novice\Controller;

use Zend\View\Model\ViewModel;
use Novice\Entity\Novica;
use Novice\Entity\DodatnaNovica;
use Novice\Form\NovicaForm;
use Prokrastinat\Controller\BaseController;
use Novice\Form\UrediForm;
use Novice\Form\ParseForm;
use Novice\Form\IWForm;
use Zend;
use Novice\Entity\ExtremeNovica;
use Novice\Entity\IWNovica;
use Novice\Form\KategorijaForm;
use Novice\Form\IskanjeForm;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;

class NovicaController extends BaseController
{
    public function indexAction()
    {
        if (!$this->isGranted('novica_index')) {
            return $this->dostopZavrnjen();
        } 
    $user = $this->auth->getIdentity();
        
        
    $repository = $this->em->getRepository('Novice\Entity\Novica');
    $adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('novica')
                                                                ->add('where', 'novica instance of \Novice\Entity\Novica')
                                                                ->add('orderBy', 'novica.datum_objave DESC')));
    $paginator = new Paginator($adapter);
    $paginator->setDefaultItemCountPerPage(5);
   
    $page = (int) $this->params()->fromRoute('page', 0);
    if($page)
    {
        $paginator->setCurrentPageNumber($page);
    }
        
        return new ViewModel(array('user' => $user, 'flashMessages' => $this->flashMessenger()->getMessages(), 'paginator' => $paginator));
    }
    
    public function dodajAction()
    {
        if (!$this->isGranted('novica_dodaj')) {
            return $this->dostopZavrnjen();
        } 

        $form = new NovicaForm();

        if ($this->request->isPost()) {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $novica = new Novica();
                $novica->user = $this->auth->getIdentity();
                $novica->naslov = $form->get('naslov')->getValue();
                $novica->vsebina = $form->get('vsebina')->getValue();
                $novica->datum_objave = new \DateTime("now");
                $novica->opis = "test";

                $this->em->persist($novica);
                $this->em->flush();

                return $this->redirect()->toRoute('novice');
            }
        }
        
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function pregledAction()
    {
        if (!$this->isGranted('novica_pregled')) {
            return $this->dostopZavrnjen();
        } 
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $novica = $this->em->find('Novice\Entity\Novica', $id);
        $url = $this->getRequest()->getRequestUri();

        return new ViewModel(array('novica' => $novica, 'url' => $url));
    }
    
    
    public function urediAction()
    {
        $request = $this->getRequest();  
        $novicaRep = $this->em->getRepository('Novice\Entity\Novica');
        $id = (int) $this->params()->fromRoute('id', 0);
        $novica = $novicaRep->find($id);
        
        if (!($this->imaPravico('novica_uredi', $novica->user))) {
            return $this->dostopZavrnjen();
        } 
         
        $form = new UrediForm();     
        $form->get('naslov')->setValue($novica->naslov);
        $form->get('vsebina')->setValue($novica->vsebina);
        $form->setData($request->getPost());
        $form->setInputFilter($form->getInputFilter());
        if ($request->isPost()) {
            if($form->isValid()){
                $novica->naslov = $request->getPost('naslov');
                $novica->vsebina = $request->getPost('vsebina');
                $this->em->persist($novica);
                $this->em->flush();
                return $this->redirect()->toRoute('novice');
            }

        }
        return new ViewModel(array('form' => $form));
    }
    
    public function parseAction()
    {
        if (!$this->isGranted('novica_dodaj')) {
            return $this->dostopZavrnjen();
        } 
        
        $options = array('Vse','Ekskluzivno', 'Družba', 'Šport', 'Potovanja', 'Kultura', 'Zabava', 'Izobraževanje', 'Novice');
        
        $form = new ParseForm($options);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
                $kategorija = $form->get('kategorija')->getValue();
                $options = $form->get('kategorija')->getValueOptions();
                $kategorija_ime = $options[$kategorija];
                $client = new Zend\Soap\Client("http://localhost:63640/Service1.asmx?WSDL");
                $result1 = $client->VrniNovice(array('kategorija' => $kategorija_ime, 'keywords'=>$form->get('isci')->getValue()))->vrniNoviceResult;
                $stevec = 0;
                foreach($result1->Novica as $nov)
                {
                    $zeObstaja = false;
                    
                    $novice = $this->em->getRepository('Novice\Entity\DodatnaNovica')->findAll();
                    
                    foreach($novice as $staraNovica)
                    {
                        if($staraNovica->naslov == $nov->naslov)
                        {
                            $zeObstaja = true;
                        }
                    }
                    if(!$zeObstaja)
                    {
                        $novica = new DodatnaNovica();
                        $novica->user = $this->auth->getIdentity();
                        $novica->naslov = $nov->naslov;
                        $novica->vsebina = $nov->vsebina;
                        $novica->opis = $nov->opis;
                        $novica->date = $nov->datum;
                        $novica->vir = $nov->vir;
                        $novica->datum_objave = new \DateTime("now");
                        $this->em->persist($novica);
                        $this->em->flush();
                        $stevec++;
                    }
                }
                    $this->flashMessenger()->addMessage('Dodanih je bilo '.$stevec. ' novic.');
                    return $this->redirect()->toRoute('novice_studentske');
                }
        }
        return array('form' => $form);
    }
    
    
    public function studentskeAction()
    {
        if (!$this->isGranted('novica_index')) {
            return $this->dostopZavrnjen();
        } 
        
        $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $repository = $entityManager->getRepository('Novice\Entity\DodatnaNovica');
        $adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('novica')->add('orderBy', 'novica.datum_objave DESC')));
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(5);

        $page = (int) $this->params()->fromRoute('page', 0);
        if($page)
        {
            $paginator->setCurrentPageNumber($page);
        }
        $user = $this->auth->getIdentity();
        
        
        
        return new ViewModel(array('action' => 'studentske', 'user' => $user,'flashMessages' => $this->flashMessenger()->getMessages(), 'paginator' => $paginator));
    }
    
    public function studentskepregledAction()
    {
        if (!$this->isGranted('novica_pregled')) {
            return $this->dostopZavrnjen();
        } 
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $novica = $this->em->find('Novice\Entity\DodatnaNovica', $id);

        return new ViewModel(array('novica' => $novica));
    }
    
    public function brisiAction()
    {
        $novRep = $this->em->getRepository('Novice\Entity\Novica');
        $id = (int) $this->params()->fromRoute('id', 0);
        $novica = $novRep->find($id);
        
        if (!($this->imaPravico('novica_brisi', $novica->user))) {
            return $this->dostopZavrnjen();
        } 
        $novRep->deleteNovica($novica);
        $this->em->flush();
        $this->flashMessenger()->addMessage('Novica je bila uspešno izbrisana!');
        return $this->redirect()->toRoute('novice');
    }
    
    // eXtreme tech novice - MaTTo
    public function extremeAction()
    {
        $client = new Zend\Soap\Client("http://localhost:59491/Service1.asmx?WSDL");
        $novice = $client->getAll()->getAllResult;
        
        $kategorije = array('vse', 'gaming', 'deals', 'mobile', 'computing', 'extreme');
        $form_kategorija = new KategorijaForm($kategorije);
        $form_iskanje = new IskanjeForm();
        
        if ($this->request->isPost()) {
            $id = (int)$this->request->getPost('kategorija');
            
            if (!$id) {
                // selectam glede na iskalni niz
                $iskalni_niz = $this->request->getPost('iskalni_niz');
                $novice = $client->getNoviceByIskalniNiz(array('iskalni_niz' => $iskalni_niz))->getNoviceByIskalniNizResult;
            } else {
                // selectam kategorijo
                $kategorija_index = $this->request->getPost('kategorija');
                //var_dump($kategorija_index);
                //exit;
                $kategorija = $kategorije[$kategorija_index];
                //var_dump($kategorija);
                //exit;
                
                $novice = $client->getNoviceByKategorija(array('kategorija' => $kategorija))->getNoviceByKategorijaResult;
            }
        }     
        
        return array(
            'novice' => $novice, 
            'form_kategorija' => $form_kategorija,
            'form_iskanje' => $form_iskanje,
        );
    }
    
    public function extremepregledAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        //$client = new Zend\Soap\Client("http://localhost:59491/Service1.asmx?WSDL");
        //$novica = $client->getNovicaById(array('id' => $id))->getNovicaByIdResult;
        $novica = $this->em->find('Novice\Entity\ExtremeNovica', $id);
        
        return array('novica' => $novica);
    }
    
    public function infoworldAction()
    {
        if (!$this->isGranted('novica_index')) {
            return $this->dostopZavrnjen();
        } 
        
        $form = new IWForm();
        $repository = $this->em->getRepository('Novice\Entity\IWNovica');
        $adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('novica')->add('orderBy', 'novica.datum_objave DESC')));
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(10);

        $page = (int) $this->params()->fromRoute('page', 0);
        if($page)
        {
            $paginator->setCurrentPageNumber($page);
        }
        $user = $this->auth->getIdentity();
        
        if ($this->request->isPost())
        {
            $client = new \SoapClient("http://localhost:4762/Service1.svc?wsdl");
            $result = $client->pridobiNovice(array('strani' => 1));
            $result = get_object_vars($result->pridobiNoviceResult);
	    $result = $result["ArrayOfstring"];
            $max = count($result);
            if($result)
            {
                $counter = 0;
                $stareNovice = $this->em->getRepository('Novice\Entity\IWNovica')->findAll();
                for($i=0; $i < $max; $i++)
                {
                    $exists = false;
                    $novica = get_object_vars($result[$i]);
                    $novica = $novica["string"];
                    foreach($stareNovice as $sNovica)
                    {
                        if($sNovica->naslov == $novica[0])
                        {
                            $exists = true;
                            break;
                        }
                    }
                    
                    if(!$exists)
                    {
                        $iwnovica = new IWNovica();
                        $iwnovica->user = $this->auth->getIdentity();
                        $iwnovica->naslov = $novica[0];
                        $iwnovica->opis = $novica[1];
                        $iwnovica->vsebina = $novica[2];
                        $iwnovica->datum = $novica[3];
                        $iwnovica->link = $novica[4];
                        $iwnovica->datum_objave = new \DateTime("now");
                        $this->em->persist($iwnovica);
                        $this->em->flush();
                        $counter++;
                    }
                }
                $this->flashMessenger()->addMessage('Dodanih je bilo '. $counter. ' IW novic.');
            }     
        }
        
        return new ViewModel(array('user' => $user,'flashMessages' => $this->flashMessenger()->getMessages(), 'paginator' => $paginator, 'form' => $form));
    }
}
