<?php
namespace Prokrastinat\Controller;

use Zend\View\Model\ViewModel;

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
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        if ($id > 6)
        {
            $id = NULL;
        }
            
        return new ViewModel(array(
            'id' => $id,
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
            if (!is_null($besede[0])) {
                foreach ($besede as $b) {
                    foreach ($b->objave as $o) {
                        if (key_exists($o->objava->id, $objave)) {
                            $objave[$o->objava->id]['tfidf'] += $b->idf * $o->tf;
                        } else {
                            $objave[$o->objava->id] = array('tfidf' => $b->idf * $o->tf, 'objava' => $o->objava);
                        }
                    }
                }
                usort($objave, function($a, $b)
                {
                    return strcmp($b['tfidf'], $a['tfidf']);
                });
            }
            
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
        
        return new ViewModel(array('form' => $form, 'objave' => $objave));
    }
}
