<?php
namespace Vprasanja\Controller;

use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\ViewModel;

use Prokrastinat\Controller\BaseController;
use Vprasanja\Entity\Odgovor;
use Vprasanja\Form\OdgovorForm;

class OdgovorController extends BaseController
{
    /** @var Vprasanja\Repository\VprasanjeRepository */
    protected $vprasanjeRepository;

    /** @var Vprasanja\Repository\OdgovorRepository */
    protected $odgovorRepository;

    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);

        $this->vprasanjeRepository = $this->em->getRepository('Vprasanja\Entity\Vprasanje');
        $this->odgovorRepository = $this->em->getRepository('Vprasanja\Entity\Odgovor');
     }

    public function indexAction()
    {
        // anchor na odgovor v vprasanju
    }

    public function dodajAction()
    {
        if (!$this->imaPravico('odgovor_dodaj')) {
            return $this->dostopZavrnjen();
        }

        if ($this->request->isPost()) {
            $form = new OdgovorForm();
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $id = $form->get('vprasanje_id')->getValue();
                $user = $this->auth->getIdentity();
                $vprasanje = $this->vprasanjeRepository->find($id);
                $odgovor = new Odgovor();

                $this->odgovorRepository->dodaj($odgovor, $vprasanje, $user, $form);
                $this->em->flush();

                $url = $this->url()->fromRoute('preglej', array('id' => $vprasanje->id));
                return $this->redirect()->toUrl($url . "#{$odgovor->id}");
            }
        }

        // to-do: is not post
    }

    public function urediAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $odgovor = $this->odgovorRepository->find($id);
        $vprasanje = $odgovor->objava;

        if (!$this->imaPravico('odgovor_uredi', $odgovor->user)) {
            return $this->dostopZavrnjen();
        }

        $form = new OdgovorForm();

        if ($this->request->isPost()) {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $this->odgovorRepository->uredi($odgovor, $form);
                $this->em->flush();

                $url = $this->url()->fromRoute('preglej', array('id' => $vprasanje->id));
                return $this->redirect()->toUrl($url . "#{$odgovor->id}");
            }
        }

        $form->fill($odgovor);

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function brisiAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $odgovor = $this->odgovorRepository->find($id);

        if (!$this->imaPravico('odgovor_brisi', $odgovor->user)) {
            return $this->dostopZavrnjen();
        }

        $odgovor = $this->odgovorRepository->find($id);
        $this->odgovorRepository->brisi($odgovor);
        $this->em->flush();

        return $this->redirect()->toRoute('preglej', array('id' => $odgovor->objava->id));
    }

    public function voteAction()
    {
        if (!$this->imaPravico('odgovor_vote')) {
            return $this->dostopZavrnjen();
        }

        $id = (int) $this->params()->fromRoute('id', 0);
        $odgovor = $this->odgovorRepository->find($id);

        $user = $this->auth->getIdentity();
        $this->odgovorRepository->vote($odgovor, $user);
        $this->em->flush();

        return $this->redirect()->toRoute('preglej', array('id' => $odgovor->objava->id));
    }

    public function unvoteAction()
    {
        if (!$this->imaPravico('odgovor_vote')) {
            return $this->dostopZavrnjen();
        }
        
        $id = (int) $this->params()->fromRoute('id', 0);
        $odgovor = $this->odgovorRepository->find($id);

        $user = $this->auth->getIdentity();
        $this->odgovorRepository->unvote($odgovor, $user);
        $this->em->flush();

        return $this->redirect()->toRoute('preglej', array('id' => $odgovor->objava->id));
    }
}
