<?php
namespace Prokrastinat\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends BaseController
{
    public function indexAction() 
    {
        $query = $this->em->createQuery("SELECT n FROM Novice\Entity\Novica n");
        $query->setMaxResults(5);
        $novice = $query->getResult();
        
        return new ViewModel(array('novice' => $novice));
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
