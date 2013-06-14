<?php
namespace Prokrastinat\Controller;

use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class UserController extends BaseController
{
    /** @var Prokrastinat\Repository\UserRepository */
    protected $userRepository;

    /** @var Prokrastinat\Repository\StudijRepository */
    protected $studijRepository;

    /** @var Zend\Authentication\AuthenticationService */
    protected $authService;

    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);

        $this->authService = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        $this->userRepository = $this->em->getRepository('Prokrastinat\Entity\User');
        $this->roleRepository = $this->em->getRepository('Prokrastinat\Entity\Role');
        $this->studijRepository = $this->getServiceLocator()->get('doctrine.entitymanager.orm_aips')->getRepository('Prokrastinat\EntityAips\Studij');
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
        $form = new \Prokrastinat\Form\LoginForm();
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            $form->setInputFilter($form->getInputFilter());
            $form->setData($data);
            
            if ($form->isValid()) {
                $username = $form->get('username')->getValue();
                $password = $form->get('password')->getValue();

                // ce je uporabnik v aipsu, ga prenesmo ali posodobimo v nasi bazi
                $aips_user = $this->studijRepository->findOneBy(array('VpisnaStevilka' => $username));
                if ($aips_user) {
                    $user = $this->userRepository->findOneBy(array('username' => $username));

                    // prvi login, dodamo student role
                    if ($user == null) { 
                        $memberRole = $this->roleRepository->findOneBy(array('name' => 'student'));
                        $user = new \Prokrastinat\Entity\User();
                        $user->roles->add($memberRole);
                    }

                    $this->userRepository->syncUser($aips_user, $user);
                    $this->em->flush();
                }

                // uporabnika avtenticiramo
                $adapter = $this->authService->getAdapter();
                $adapter->setIdentityValue($username);
                $adapter->setCredentialValue($password);
                $result = $this->authService->authenticate();

                if ($result->isValid()) {
                    $user = $this->authService->getIdentity();
                    $first = ($user->datum_logina == null);
                    $user->datum_logina = new \DateTime("now");
                    $this->em->persist($user);
                    $this->em->flush();

                    if ($first) {
                        return $this->redirect()->toRoute('user', array('action' => 'edit', 'id' => $user->id));
                    } else {
                        return $this->redirect()->toRoute('home');
                    }
                } else {
                    $form->get('password')->setMessages(array(
                        'Kombinacija uporabniškega imena in gesla je napačna'
                    ));
                }
            }
        }

        return new ViewModel (array(
            'form' => $form,
        ));
    }
    
    public function logoutAction()
    {
        $this->authService->clearIdentity();
        return $this->redirect()->toRoute('home');
    }
    
    public function editAction()
    {
        if (!$this->auth->hasIdentity()) $this->dostopZavrnjen();
            $form = new \Prokrastinat\Form\EditForm();
            $form->setInputFilter(new \Prokrastinat\Form\EditFilter());
            $urejanje = false;
            
            if (!$this->imaPravico('user_uredi')) {
                $form->get('vpisna_st')->setAttributes(array('disabled' => true));
                $form->get('ime')->setAttributes(array('disabled' => true));
                $form->get('priimek')->setAttributes(array('disabled' => true));
                
                $form->getInputFilter()
                     ->remove('ime')
                     ->remove('priimek')
                     ->remove('vpisna_st');
            }
            
            $id = $this->getEvent()->getRouteMatch()->getParam('id');
            $user = $this->userRepository->find($id);
            
            if ($this->imaPravico('user_uredi', $user))
            {
                if ($this->request->isPost()) {
                    $form->setData($this->request->getPost());
                    
                    if ($form->isValid()) {
                        $this->userRepository->updateUser($user, $form);
                        $this->em->flush();

                        $urejanje = true;
                    }
                }

                $form->fill($user);
            } else {
                return $this->dostopZavrnjen();
            }
            
            return new ViewModel(array(
                'form' => $form,
                'urejanje' => $urejanje
            ));

    }
        
        public function viewAction()
        {
            if (!$this->auth->hasIdentity()) $this->dostopZavrnjen();
            $id = $this->getEvent()->getRouteMatch()->getParam('id');
            $user = $this->userRepository->find($id);
            $studij = $this->studijRepository->getStudij($user);
			
            if ($user == null) {
                return $this->dostopZavrnjen();
            }
            
            return new ViewModel(array(
                'user' => $user,
                'uid' => $this->auth->getIdentity()->id, 
                'studij' => $studij
            ));
        }
        
        public function changepasswordAction()
        {
            if (!$this->auth->hasIdentity()) $this->dostopZavrnjen();
            $form = new \Prokrastinat\Form\ChangepasswordForm();
            $sporocilo = false;
            $napaka = false;
            
            if ($this->request->isPost()) {
                $form->setInputFilter($form->getInputFilter());
                $form->setData($this->request->getPost());

                if ($form->isValid()) {
                    $bcrypt = new \Zend\Crypt\Password\Bcrypt();
                    $user = $this->auth->getIdentity();
                    
                    if($bcrypt->verify($form->get('password')->getValue(), $user->password)) {
                        if(($form->get('password_novo')->getValue()) == ($form->get('password_novo_conf')->getValue())) {
                            $this->userRepository->changePass($user, $form->get('password_novo')->getValue());
                            $this->em->flush();
                            $sporocilo = "Uspešno!";
                        } else {
                            $sporocilo = "Potrditveno geslo se ne ujema!";
                            $napaka = true;
                        }
                    } else {
                        $sporocilo = "Napačno geslo!";
                        $napaka = true;
                    }
                }
            }
            
            
            return new ViewModel(array(
                'form' => $form,
                'sporocilo' => $sporocilo,
                'napaka' => $napaka
            ));
        }
        
        public function listAction()
        {
            if (!$this->imaPravico('user_pregled')) $this->dostopZavrnjen();
            $users = $this->userRepository->findAll();
            
            return new ViewModel(array(
                'users' => $users
            ));
            
        }
}
