<?php
namespace Vprasanja\Controller;

use Zend\View\Model\ViewModel,
Prokrastinat\Controller\BaseController;

class VprasanjeController extends BaseController
{
    public function indexAction()
    {
        $query = $this->getEntityManager()->createQuery('SELECT v FROM Vprasanja\Entity\Vprasanje v');
        $vprasanja = $query->getResult();

        return new ViewModel(array(
            'vprasanja' => $vprasanja
        ));
    }

    public function pregledAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        $vprasanje = $this->getEntityManager()->find('Vprasanja\Entity\Vprasanje', $id);

        return new ViewModel(array(
            'vprasanje' => $vprasanje
        ));
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
        $vprasanje = $this->getEntityManager()->find('Vprasanja\Entity\Vprasanje', $id);

        $form = new \Vprasanja\Form\Vprasanje();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $vprasanje->naslov = $form->get('naslov')->getValue();
                $vprasanje->vsebina = $form->get('vsebina')->getValue();
                $vprasanje->datum_objave = new \DateTime("now");

                $this->getEntityManager()->persist($vprasanje);
                $this->getEntityManager()->flush();

                return $this->redirect()->toRoute('index');
            }
        } else {
            $form->bind($vprasanje);
        }

        return new ViewModel(array(
            'form' => $form,
            'vprasanje' => $vprasanje
        ));
    }

    public function brisiAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        // PREVERI UPORABNIKA
    }
}
