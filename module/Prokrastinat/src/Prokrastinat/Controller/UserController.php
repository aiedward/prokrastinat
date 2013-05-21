<?php
namespace Prokrastinat\Controller;
use Zend\View\Model\ViewModel;

class UserController extends BaseController
{
        /** @var Prokrastinat\Repository\UserRepository */
        protected $userRepository;
    
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
                $authService = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
                $adapter = $authService->getAdapter();
                $adapter->setIdentityValue($form->get('username')->getValue());
                $adapter->setCredentialValue($form->get('password')->getValue());
                $result = $authService->authenticate();

                if ($result->isValid()) {
                    $user = $authService->getIdentity();
                    $user->datum_logina = new \DateTime("now");
                    $this->em->persist($user);
                    $this->em->flush();
                    return $this->redirect()->toRoute('index');
                } else {
                    $form->get('password')->setMessages(array(
                        'Kombinacija uporabniškega imena in gesla je napačna'
                    ));
                }
            }
        }

        return new ViewModel (array(
            'form' => $form,
            'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL,
        ));
    }
    
    public function logoutAction()
    {
        $authService = $this->getServiceLocator()->get('Prokrastinat\Authentication\AuthenticationService');
        $authService->clearIdentity();
        
        return $this->redirect()->toRoute('index');
    }
    
    public function editAction()
    {
            if (!$this->isGranted('member')) $this->dostopZavrnjen();
            $form = new \Prokrastinat\Form\EditForm();
            $urejanje = false;
            
            $id = $this->getEvent()->getRouteMatch()->getParam('id');
            $this->userRepository = $this->getEntityManager()->getRepository('Prokrastinat\Entity\User');
            $userEdit = is_numeric($id) ? $this->userRepository->find($id) : null;
            $user = $this->auth->getIdentity();
            
            if($userEdit == null)
            {
                $view = $this->dostopZavrnjen();
                return $view;
            }
            
            if((!($user === $userEdit)&&($this->isGranted('user_uredi')))||($user === $userEdit))
            {
                if ($this->request->isPost()) {
                    $form->setInputFilter($form->getInputFilter());
                    $form->setData($this->request->getPost());

                    if ($form->isValid()) {
                        $this->userRepository = $this->getEntityManager()->getRepository('Prokrastinat\Entity\User');
                        $this->userRepository->updateUser($userEdit, $form);
                        $this->em->flush();

                        $urejanje = true;
                    }
                }

                if($userEdit)
                    $form->fill($userEdit);
            }else
            {
                $view = $this->dostopZavrnjen();
                return $view;
            }
  
            
            return new ViewModel (array(
                'form' => $form,
                'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL,
                'urejanje' => $urejanje));

    }
        
        public function viewAction()
        {
            if (!$this->isGranted('member')) $this->dostopZavrnjen();
            $id = $this->getEvent()->getRouteMatch()->getParam('id');
            $this->userRepository = $this->getEntityManager()->getRepository('Prokrastinat\Entity\User');
            $user = is_numeric($id) ? $this->userRepository->find($id) : null;
            
            
            if($user == null)
            {
                $view = $this->dostopZavrnjen();
                return $view;
            }
            
            return new ViewModel(array('user' => $user));
        }
        
        public function changepasswordAction()
        {
            if (!$this->isGranted('member')) $this->dostopZavrnjen();
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
                            $this->userRepository = $this->getEntityManager()->getRepository('Prokrastinat\Entity\User');
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
            
            
            return new ViewModel (array(
                'form' => $form,
                'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL,
                'sporocilo' => $sporocilo,
                'napaka' => $napaka
            ));
        }
}
