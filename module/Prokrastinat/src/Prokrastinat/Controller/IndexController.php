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
    
    
}
