<?php
namespace Novice\Controller;

use Zend\View\Model\ViewModel;
use Novice\Entity\Novica;
use Novice\Entity\DodatnaNovica;
use Novice\Form\NovicaForm;
use Prokrastinat\Controller\BaseController;
use Novice\Form\UrediForm;
use Novice\Form\ParseForm;
use Zend;
use Novice\Entity\ExtremeNovica;
use Novice\Form\KategorijaForm;
use Novice\Form\IskanjeForm;

class NovicaController extends BaseController
{
    public function indexAction()
    {
        if (!$this->isGranted('novica_index')) {
            return $this->dostopZavrnjen();
        } 
        $query = $this->em->createQuery("SELECT n FROM Novice\Entity\Novica n ORDER BY n.datum_objave DESC");
        $novice = $query->getResult();
        $user = $this->auth->getIdentity();
        
        return new ViewModel(array('novice' => $novice, 'user' => $user, 'flashMessages' => $this->flashMessenger()->getMessages()));
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
                    return $this->redirect()->toRoute('novice', array('action' => 'ostale'));
                }
        }
        return array('form' => $form);
    }
    
    public function ostaleAction()
    {
        if (!$this->isGranted('novica_index')) {
            return $this->dostopZavrnjen();
        } 
        $query = $this->em->createQuery("SELECT n FROM Novice\Entity\DodatnaNovica n");
        $novice = $query->getResult();
        $user = $this->auth->getIdentity();
        
        return new ViewModel(array('novice' => $novice, 'action' => 'ostale', 'user' => $user,'flashMessages' => $this->flashMessenger()->getMessages()));
    }
    
    public function studentskeAction()
    {
        if (!$this->isGranted('novica_index')) {
            return $this->dostopZavrnjen();
        } 
        $query = $this->em->createQuery("SELECT n FROM Novice\Entity\DodatnaNovica n");
        $novice = $query->getResult();
        $user = $this->auth->getIdentity();
        
        return new ViewModel(array('novice' => $novice, 'action' => 'ostale', 'user' => $user,'flashMessages' => $this->flashMessenger()->getMessages()));
    }
    
    public function ostalepregledAction()
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
}
