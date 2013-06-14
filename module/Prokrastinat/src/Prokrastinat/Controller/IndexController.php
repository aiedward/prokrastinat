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
        /*
        $form = new \Prokrastinat\Form\IskanjeForm();
        $search = $this->getRequest()->getQuery('isci');
        
        $search = preg_replace('/ /', '%20', $search);
        //$client = new \Zend\Soap\Client("http://localhost:8080/LemService.asmx?WSDL");
        //$results = $client->Lematiziraj($search);
        $client = new \Zend\Http\Client();
        $req = new \Zend\Http\Request();
        $req->setUri('http://localhost:8080/LemService.asmx/Lematiziraj?text=' . $search);
        
        $results = array();
        $response = $client->dispatch($req);
        $xml = simplexml_load_string($response->getBody());
        $results = (array) $xml;
        */

        $result = $this->em->getRepository('Prokrastinat\Entity\Beseda')->search(array('ali', 'biti', 'knez'));
        usort($result, function($a, $b)
        {
            return strcmp($b->TFIDF(), $a->TFIDF());
        });

        foreach ($result as $ob) {
            echo $ob->beseda->beseda . '<br>';
            echo $ob->TFIDF() . '<br>';
            echo $ob->objava->naslov . '<br>';
            echo '<br>';
        }

        die;

        //$form = new \Prokrastinat\Form\IskanjeForm();
        //$results = $this->getRequest()->getQuery('isci');
        
        //return new ViewModel(array('form' => $form, 'iskanje' => $results));
    }
}
