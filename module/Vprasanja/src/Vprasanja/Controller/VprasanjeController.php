<?php
namespace Vprasanja\Controller;

use Zend\View\Model\ViewModel,
Prokrastinat\Controller\BaseController;

class VprasanjeController extends BaseController
{
    public function indexAction()
    {
        $query = $this->getEntityManager()->createQuery("SELECT o FROM Vprasanja\Entity\Vprasanje o");
        $vprasanja = $query->getResult();

        return new ViewModel(array(
            'vprasanja' => $vprasanja
        ));
    }

    public function pregledAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
    }

    public function dodajAction()
    {
        $form = new \Vprasanja\Form\Vprasanje();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $vprasanje = new \Vprasanja\Entity\Vprasanje();

                $vprasanje->naslov = $form->get('naslov')->getValue();
                $vprasanje->vsebina = $form->get('vsebina')->getValue();
                $vprasanje->datum_objave = new \DateTime("now");

                $this->getEntityManager()->persist($vprasanje);
                $this->getEntityManager()->flush();

                return $this->redirect()->toRoute('index');
            }
        }

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function urediAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
    }

    public function brisiAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
    }
}
