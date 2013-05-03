<?php

namespace Deska\Controller;

use Prokrastinat\Controller\BaseController;
use Zend\View\Model\ViewModel;
use Deska\Entity\Oglas;
use Deska\Form\DeskaForm;

class DeskaController extends BaseController 
{

    /**
     * @var Deska\Repository\Oglas
     */
    protected $deska_repository;

    public function indexAction() 
    {
        $query = $this->getEntityManager()->createQuery("SELECT o FROM Deska\Entity\Oglas o");
        $oglasi = $query->getResult();

        return new ViewModel(array('oglasi' => $oglasi));
    }

    public function dodajAction() 
    {
        $form = new DeskaForm();
        $request = $this->getRequest();
        $this->deska_repository = $this->getEntityManager()->getRepository('Deska\Entity\Oglas');

        if ($request->isPost()) 
        {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid())
            {
                $oglas = new Oglas();
                $vals = array(
                    'user' => $this->auth->getIdentity(),
                    'naslov' => "{$form->get('naslov')->getValue()}",
                    'vsebina' => "{$form->get('vsebina')->getValue()}",
                    'datum-zapadlosti' => "{$form->get('datum-zapadlosti')->getValue()}",
                );
                $this->deska_repository->saveOglas($oglas, $vals);

                return $this->redirect()->toRoute('deska');
            }
        }

        return array('form' => $form);
    }

    public function preglejAction() 
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->deska_repository = $this->getEntityManager()->getRepository('Deska\Entity\Oglas');

        $oglas = $this->deska_repository->getOglasById($id);

        return new ViewModel(array('oglas' => $oglas));
    }

}
