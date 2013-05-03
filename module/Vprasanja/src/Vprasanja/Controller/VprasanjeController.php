<?php
namespace Vprasanja\Controller;

use Zend\View\Model\ViewModel;
use Prokrastinat\Controller\BaseController;

class VprasanjeController extends BaseController
{
    public function indexAction()
    {
        $vprasanja = $this->em->getRepository('Vprasanja\Entity\Vprasanje')->findAll();

        return new ViewModel(array(
            'vprasanja' => $vprasanja
        ));
    }

    public function pregledAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        $vprasanje = $this->em->find('Vprasanja\Entity\Vprasanje', $id);

        $form = new \Vprasanja\Form\Odgovor();
        $form->setAttribute('action', $this->url()->fromRoute('odgovor', array('action' => 'dodaj', 'ido' => $id)));
        $form->setData(array('vprasanje_id' => $id));

        return new ViewModel(array(
            'vprasanje' => $vprasanje,
            'form' => $form
        ));
    }

    public function dodajAction()
    {
        $this->zahtevajLogin();

        $form = new \Vprasanja\Form\Vprasanje();

        if ($this->request->isPost()) {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $vprasanje = new \Vprasanja\Entity\Vprasanje();

                $vprasanje->user = $this->auth->getIdentity();
                $vprasanje->naslov = $form->get('naslov')->getValue();
                $vprasanje->vsebina = $form->get('vsebina')->getValue();
                $vprasanje->datum_objave = new \DateTime("now");

                $this->em->persist($vprasanje);
                $this->em->flush();

                return $this->redirect()->toRoute('preglej', array('id' => $vprasanje->id));
            }
        }

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function urediAction()
    {
        $this->zahtevajLogin();

        $id = (int) $this->params()->fromRoute('id', 0);
        $vprasanje = $this->em->find('Vprasanja\Entity\Vprasanje', $id);

        $form = new \Vprasanja\Form\Vprasanje();

        if ($this->request->isPost()) {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $vprasanje->naslov = $form->get('naslov')->getValue();
                $vprasanje->vsebina = $form->get('vsebina')->getValue();

                $this->em->persist($vprasanje);
                $this->em->flush();

                return $this->redirect()->toRoute('preglej', array('id' => $vprasanje->id));
            }
        }

        $form->setData(array(
            'id' => $vprasanje->id,
            'naslov' => $vprasanje->naslov,
            'vsebina' => $vprasanje->vsebina
        ));

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function brisiAction()
    {
        $this->zahtevajLogin();

        $id = (int) $this->params()->fromRoute('id', 0);
        $vprasanje = $this->em->find('Vprasanja\Entity\Vprasanje', $id);

        $this->em->remove($vprasanje);
        $this->em->flush();

        return $this->redirect()->toRoute('vprasanje');
    }
}
