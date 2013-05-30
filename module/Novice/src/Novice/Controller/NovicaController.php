<?php
namespace Novice\Controller;

use Zend\View\Model\ViewModel;
use Novice\Entity\Novica;
use Novice\Form\NovicaForm;
use Prokrastinat\Controller\BaseController;

class NovicaController extends BaseController
{
    public function indexAction()
    {
        $query = $this->em->createQuery("SELECT n FROM Novice\Entity\Novica n");
        $novice = $query->getResult();
        
        return new ViewModel(array('novice' => $novice));
    }
    
    public function dodajAction()
    {
        
        if (!$this->isGranted('vprasanje_dodaj')) {
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

                return $this->redirect()->toRoute('novica');
            }
        }
        
        return new ViewModel(array(
            'form' => $form
        ));
    }
}
