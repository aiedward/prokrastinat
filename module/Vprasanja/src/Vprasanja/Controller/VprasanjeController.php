<?php
namespace Vprasanja\Controller;

use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\ViewModel;

use Prokrastinat\Controller\BaseController;
use Vprasanja\Entity\Vprasanje;
use Vprasanja\Entity\Odgovor;
use Vprasanja\Form\VprasanjeForm;
use Vprasanja\Form\OdgovorForm;

class VprasanjeController extends BaseController
{
    /** @var Vprasanja\Repository\VprasanjeRepository */
    protected $vprasanjeRepository;

    /** @var Vprasanja\Repository\StackVprasanjeRepository */
    protected $stackVprasanjeRepository;

    /** @var Vprasanja\Repository\OdgovorRepository */
    protected $odgovorRepository;

    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);

        $this->vprasanjeRepository = $this->em->getRepository('Vprasanja\Entity\Vprasanje');
        $this->stackVprasanjeRepository = $this->em->getRepository('Vprasanja\Entity\StackVprasanje');
        $this->odgovorRepository = $this->em->getRepository('Vprasanja\Entity\Odgovor');
     }

    public function indexAction()
    {
        if (!$this->imaPravico('vprasanje_index')) {
            return $this->dostopZavrnjen();
        }

        $tip = $this->params()->fromRoute('tip');
        $tip = $tip == null ? 'novo' : $tip;

        $vprasanja = array();
        if ($tip == 'novo')
            $vprasanja = $this->vprasanjeRepository->findAllNew();
        else if ($tip == 'teden')
            $vprasanja = $this->vprasanjeRepository->findTopWeekly();
        else if ($tip == 'mesec')
            $vprasanja = $this->vprasanjeRepository->findTopMonthly();
        else if ($tip == 'stackoverflow')
            $vprasanja = $this->stackVprasanjeRepository->findTopWeekly();
        else
            throw new \Exception('Neznani tip izpisa vprašanj');

        return new ViewModel(array(
            'vprasanja' => $vprasanja,
            'selected' => $tip,
        ));
    }

    public function pregledAction()
    {
        if (!$this->imaPravico('vprasanje_pregled')) {
            return $this->dostopZavrnjen();
        } 

        $id = (int) $this->params()->fromRoute('id');
        $user = $this->auth->getIdentity();

        $vprasanje = $this->vprasanjeRepository->find($id);
        $rating = null;
        $has_rated = null;
        if ($vprasanje) {
            $rating = $vprasanje->users_rated->rating;
            $has_rated = $vprasanje->users_rated->contains($user);
        } else {
            $vprasanje = $this->stackVprasanjeRepository->find($id);
            $rating = $vprasanje->rating;
        }
        

        $form = new OdgovorForm();
        $form->setAttribute('action', $this->url()->fromRoute('odgovor', array('action' => 'dodaj', 'ido' => $id)));
        $form->setData(array('vprasanje_id' => $id));

        return new ViewModel(array(
            'vprasanje' => $vprasanje,
            'rating' => $rating,
            'has_rated' => $has_rated,
            'user' => $user,
            'form' => $form
        ));
    }

    public function dodajAction()
    {
        if (!$this->imaPravico('vprasanje_dodaj')) {
            return $this->dostopZavrnjen();
        } 

        $form = new VprasanjeForm();

        if ($this->request->isPost()) {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $user = $this->auth->getIdentity();
                $vprasanje = new Vprasanje();

                $this->vprasanjeRepository->dodaj($vprasanje, $user, $form);
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
        $id = (int) $this->params()->fromRoute('id', 0);
        $vprasanje = $this->vprasanjeRepository->find($id);

        if (!$this->imaPravico('vprasanje_uredi', $vprasanje->user)) {
            return $this->dostopZavrnjen();
        }

        $form = new VprasanjeForm();

        if ($this->request->isPost()) {
            $form->setInputFilter($form->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $this->vprasanjeRepository->uredi($vprasanje, $form);
                $this->em->flush();

                return $this->redirect()->toRoute('preglej', array('id' => $vprasanje->id));
            }
        }

        $form->fill($vprasanje);

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function brisiAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $vprasanje = $this->vprasanjeRepository->find($id);

        if (!$this->imaPravico('vprasanje_brisi', $vprasanje->user)) {
            return $this->dostopZavrnjen();
        }

        $this->vprasanjeRepository->brisi($vprasanje);
        $this->em->flush();

        return $this->redirect()->toRoute('vprasanje');
    }

    public function voteAction()
    {
        if (!$this->imaPravico('vprasanje_vote')) {
            return $this->dostopZavrnjen();
        }

        $id = (int) $this->params()->fromRoute('id', 0);
        $vprasanje = $this->vprasanjeRepository->find($id);

        $user = $this->auth->getIdentity();
        $this->vprasanjeRepository->vote($vprasanje, $user);
        $this->em->flush();

        return $this->redirect()->toRoute('preglej', array('id' => $vprasanje->id));
    }

    public function unvoteAction()
    {
        if (!$this->imaPravico('vprasanje_vote')) {
            return $this->dostopZavrnjen();
        }

        $id = (int) $this->params()->fromRoute('id', 0);
        $vprasanje = $this->vprasanjeRepository->find($id);

        $user = $this->auth->getIdentity();
        $this->vprasanjeRepository->unvote($vprasanje, $user);
        $this->em->flush();

        return $this->redirect()->toRoute('preglej', array('id' => $vprasanje->id));
    }
}
