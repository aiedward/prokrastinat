<?php
namespace Deska\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Deska\Entity\Oglas;
use Deska\Form\DeskaForm;

class DeskaController extends BaseController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function dodajAction()
    {
        $form = new DeskaForm();
        $request = $this->getRequest();
        
        if ($request->isPost())
        {
            $form->setData($request->getPost());
            
            $naslov = $request->getPost('naslov');
            $vsebina = $request->getPost('vsebina');
            $zapade = $request->getPost('datum-zapadlosti');
            
            $oglas = new Oglas();
            $oglas->setNaslov($naslov);
            $oglas->setVsebina($vsebina);
            $oglas->setDatumObjave(new \DateTime("now"));
            $oglas->setDatumZapadlosti($zapade);
            
            $this->getEntityManager()->persist($oglas);
            $this->getEntityManager()->flush();
            
            return $this->redirect()->toRoute('deska');
        }
        
        return array('form' => $form);
    }
}
