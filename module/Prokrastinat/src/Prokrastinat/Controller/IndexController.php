<?php
namespace Prokrastinat\Controller;

use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Prokrastinat\Form\MapForm;

class IndexController extends BaseController
{    
    public function indexAction() 
    {
        $query = $this->em->createQuery("SELECT n FROM Novice\Entity\Novica n ORDER BY n.datum_objave DESC");
        $query->setMaxResults(5);
        $novice = $query->getResult();
        
        $query2 = $this->em->createQuery("SELECT o FROM Deska\Entity\Oglas o WHERE o.datum_zapadlosti > CURRENT_DATE()");
        $query2->setMaxResults(5);
        $oglasi = $query2->getResult();
        
        return new ViewModel(array('novice' => $novice, 'oglasi' => $oglasi));
    }
    
    public function mapAction()
    {
        $mapRepository = $this->em->getRepository('Prokrastinat\Entity\Mape');
        $mape = $mapRepository->getMaps();
        $roomGet = $this->getEvent()->getRouteMatch()->getParam('room');
        $form = new MapForm($mape, null);
        $room = null;
        $map = null;
        
        if($roomGet != null)
        {
            $roomRepository = $this->em->getRepository('Prokrastinat\Entity\Ucilnice');
            $room = $roomRepository->findOneBy(array('ime' => $roomGet));
            if(empty($room))
            {
                $map = $mapRepository->findOneBy(array('ime' => $roomGet));
                if(empty($map))
                {
                    //TO-DO: Flash messenger
                }
            }else
            {
                $map = $room->mapa;
            }
        }
        
        if ($this->getRequest()->isPost()) {
            $form->setData($this->request->getPost());
            $mapaID = $form->get('zemljevid')->getValue();
            $roomID = $form->get('ucilnica')->getValue();
            if($roomID === "all")
            {
                $zemljevid = $mapRepository->find($mapaID);
                return $this->redirect()->toRoute('map', array('room' => $zemljevid->ime));
            }else
            {
                $roomRepository = $this->em->getRepository('Prokrastinat\Entity\Ucilnice');
                $ucilnica = $roomRepository->find($roomID);
                return $this->redirect()->toRoute('map', array('room' => $ucilnica->ime));
            }
        }
            
        return new ViewModel(array(
            'form' => $form,
            'room' => $room,
            'map' => $map,
        ));
    }
    
    public function getUcilniceAction()
    {
        $mapa = $this->getEvent()->getRouteMatch()->getParam('mapa');
        $roomRepository = $this->em->getRepository('Prokrastinat\Entity\Ucilnice');
        $ucilnice = $roomRepository->getRooms($mapa);
        return new JsonModel(array(
            'ucilnice' => $ucilnice
        ));
        
    }
    
    public function iskanjeAction()
    {
        
        $form = new \Prokrastinat\Form\IskanjeForm();
        $search = $this->getRequest()->getQuery('isci');
        $objave = array();
        
        if (!empty($search)) {
            $search = preg_replace('/ /', '%20', $search);
            //$client = new \Zend\Soap\Client("http://localhost:8080/LemService.asmx?WSDL");
            //$results = $client->Lematiziraj($search);
            $client = new \Zend\Http\Client();
            $req = new \Zend\Http\Request();
            $req->setUri('http://localhost:8080/LemService.asmx/Lematiziraj?text=' . $search);
            
            $response = $client->dispatch($req);
            $xml = simplexml_load_string($response->getBody());
            $search_strings = (array) $xml->string;
    
            $besede = $this->em->getRepository('Prokrastinat\Entity\Beseda')->getBesede($search_strings);
            
            foreach ($besede as $b) {
                foreach ($b->objave as $o) {
                    var_dump($o->objava);
                    if (key_exists($o->objava->id, $objave)) {
                        $objave[$o->objava->id]['idf'] += $b->idf * $o->tf;
                    } else {
                        $objave[$o->objava->id] = array('idf' => $b->idf * $o->tf, 'objava' => $o->objava);
                    }
                }
            }
            /*usort($results, function($a, $b)
            {
                return strcmp($b->TFIDF(), $a->TFIDF());
            });*/
        }
/*
        foreach ($result as $ob) {
            echo $ob->beseda->beseda . '<br>';
            echo $ob->TFIDF() . '<br>';
            echo $ob->objava->naslov . '<br>';
            echo '<br>';
        }*/

        //$form = new \Prokrastinat\Form\IskanjeForm();
        //$results = $this->getRequest()->getQuery('isci');
        
        return new ViewModel(array('form' => $form, 'iskanje' => $objave));
    }
}
