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

    /** @var Prokrastinat\Repository\KategorijaRepository */
    protected $kategorijaRepository;

    /** @var Zend\Authentication\AuthenticationService */
    protected $authService;

    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);

        $this->authService = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        $this->userRepository = $this->em->getRepository('Prokrastinat\Entity\User');
        $this->roleRepository = $this->em->getRepository('Prokrastinat\Entity\Role');
        $this->kategorijaRepository = $this->em->getRepository('Prokrastinat\Entity\Kategorija');
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
                $authcode = $form->get('authcode')->getValue();
                $validAuth = true;
                $user = $this->userRepository->findOneBy(array('username' => $username));
                if($user != null){
                    if($user->authentiator)
                    {
                        $genauth = $this->userRepository->generateAuthcode($user);
                        if($authcode != $genauth)
                            $validAuth = false;
                    }
                }

                // ce je uporabnik v aipsu, ga prenesmo ali posodobimo v nasi bazi
                $aips_user = $this->studijRepository->findOneBy(array('VpisnaStevilka' => $username));
                if ($aips_user) {

                    // prvi login, dodamo student role
                    if ($user == null) { 
                        $memberRole = $this->roleRepository->findOneBy(array('name' => 'student'));
                        $user = new \Prokrastinat\Entity\User();
                        $user->roles->add($memberRole);
                    }

                    $this->userRepository->syncUser($aips_user, $user);
                    $this->em->flush();
                }
                
                if($validAuth)
                {
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
                }else{
                    $form->get('authcode')->setMessages(array(
                            'Neveljavnja avtentikacijska koda'
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

    public function kategorijeAction()
    {
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        $user = $this->userRepository->find($id);

        if ($this->request->isPost()) {
            // odstranimo neoznacene kategorije
            $kategorije_ids = $this->request->getPost('kategorije');
            $kategorije = $this->kategorijaRepository->getKategorijeByList($kategorije_ids);
            $user->kategorije->clear();
            foreach ($kategorije as $kategorija) {
                $user->kategorije->add($kategorija);
            }

            // dodamo novo kategorijo
            $kategorija_ime = $this->request->getPost('kategorija');
            if ($kategorija_ime && !$this->userRepository->imaKategorijo($user, $kategorija_ime)) {
                $kategorija = $this->kategorijaRepository->findOneBy(array('ime' => $kategorija_ime));
                if (!$kategorija) throw new \Exception('Kategorija ne obstaja');
                $user->kategorije->add($kategorija);
            }

            $this->em->persist($user);
            $this->em->flush();

            return $this->redirect()->toRoute('user', array('action' => 'kategorije', 'id' => $id));
        }

        $kategorije = array();
        foreach ($user->kategorije as $kategorija) {
            $kategorije[$kategorija->id] = $kategorija->ime;
        }

        $form = new \Prokrastinat\Form\KategorijeForm($kategorije);

        return new ViewModel(array(
            'form' => $form,
        ));
    }
    
    public function editAction()
    {
        if (!$this->auth->hasIdentity()) $this->dostopZavrnjen();       
            $roleRep = $this->em->getRepository('Prokrastinat\Entity\Role');
            $roles = $roleRep->getRoles();
            $id = $this->getEvent()->getRouteMatch()->getParam('id');
            $user = $this->userRepository->find($id);
            
            if($this->imaPravico('user_uredi'))
            {
                $userRoles = array();
                foreach($user->roles as $role)
                {
                    array_push($userRoles, $role->id);
                }
                
                
                
                $form = new \Prokrastinat\Form\EditForm($roles, $userRoles);
            }else
            {
                $form = new \Prokrastinat\Form\EditForm(null, null);   
            }
            
            if($user->authentiator)
                    $form->get('authenticator')->setChecked(true);
            $form->setInputFilter(new \Prokrastinat\Form\EditFilter());
            $urejanje = false;
            $form->remove('uporabnisko');
            $form->remove('geslo');
            $form->getInputFilter()
                      ->remove('geslo')
                      ->remove('uporabnisko')
                      ->remove('authenticator');
            
            if (!$this->imaPravico('user_uredi')) {
                $form->get('vpisna_st')->setAttributes(array('disabled' => true));
                $form->get('ime')->setAttributes(array('disabled' => true));
                $form->get('priimek')->setAttributes(array('disabled' => true));
                
                $form->getInputFilter()
                     ->remove('ime')
                     ->remove('priimek')
                     ->remove('vpisna_st');
            }
                        
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
                'urejanje' => $urejanje,
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
        
        public function addAction()
        {
            if (!$this->auth->hasIdentity()) $this->dostopZavrnjen();       
                $roleRep = $this->em->getRepository('Prokrastinat\Entity\Role');
                $roles = $roleRep->getRoles();

                if($this->imaPravico('user_dodaj'))
                {
                    $form = new \Prokrastinat\Form\EditForm($roles, null);
                    $form->setInputFilter(new \Prokrastinat\Form\EditFilter());

                    $form->getInputFilter()
                         ->remove('vpisna_st');
          
                    if ($this->request->isPost()) {
                        $form->setData($this->request->getPost());

                        if ($form->isValid()) {
                            $newid = $this->userRepository->addUser($form);
                            return $this->redirect()->toRoute('user', array('action' => 'view', 'id' => $newid));
                        }
                    }

                } else {
                    return $this->dostopZavrnjen();
                }

                return new ViewModel(array(
                    'form' => $form,
                ));
        }
}