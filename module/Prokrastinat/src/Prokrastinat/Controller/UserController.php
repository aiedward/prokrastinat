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
            parent::zahtevajLogin();
            $form = new \Prokrastinat\Form\EditForm();
            $urejanje = false;
            $user = $this->auth->getIdentity();
            
            if ($this->request->isPost()) {
                $form->setInputFilter($form->getInputFilter());
                $form->setData($this->request->getPost());

                if ($form->isValid()) {
                    $user->ime = $form->get('ime')->getValue();
                    $user->priimek = $form->get('priimek')->getValue();
                    $user->email = $form->get('email')->getValue();
                    $user->naslov = $form->get('naslov')->getValue();
                    $user->mesto = $form->get('mesto')->getValue();
                    $user->drzava = $form->get('drzava')->getValue();
                    $user->jezik = $form->get('jezik')->getValue();
                    $user->opis = $form->get('opis')->getValue();
                    $user->splet = $form->get('splet')->getValue();
                    $user->telefon = $form->get('telefon')->getValue();

                    $this->em->persist($user);
                    $this->em->flush();
                    
                    $urejanje = true;
                }
            }
            
            if($user)
                $form->populateValues($user->toArray());
  
            
            return new ViewModel (array(
                'form' => $form,
                'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL,
                'urejanje' => $urejanje));

	}
        
        public function viewAction()
        {
            parent::zahtevajLogin();
            $id = $this->getEvent()->getRouteMatch()->getParam('id');
            $this->userRepository = $this->getEntityManager()->getRepository('Prokrastinat\Entity\User');
            $user = is_numeric($id) ? $this->userRepository->find($id) : null;
            
            
            if($user == null)
                throw new \Exception('Uporabnik ne obstaja');
            
            return new ViewModel(array('user' => $user));
        }
        
        public function changepasswordAction()
        {
            parent::zahtevajLogin();
            $form = new \Prokrastinat\Form\ChangepasswordForm();
            $sporocilo = false;
            $napaka = false;
            
            
            
            if ($this->request->isPost()) {
                $form->setInputFilter($form->getInputFilter());
                $form->setData($this->request->getPost());

                if ($form->isValid()) {
                    $bcrypt = new \Zend\Crypt\Password\Bcrypt();
                    $user = $this->auth->getIdentity();
                    
                    if($bcrypt->verify($form->get('password')->getValue(), $user->password))
                    {
                        if(($form->get('password_novo')->getValue()) == ($form->get('password_novo_conf')->getValue()))
                        {
                            $hashed = $bcrypt->create($form->get('password_novo')->getValue());
                            $user->password = $hashed;
                            
                            $this->em->persist($user);
                            $this->em->flush();
                            $sporocilo = "Uspešno!";
                        }else
                        {
                            $sporocilo = "Potrditveno geslo se ne ujema!";
                            $napaka = true;
                        }
                    }else
                    {
                        $sporocilo = "Napačno geslo!";
                        $napaka = true;
                    }
                }
            }
            
            
            return new ViewModel (array(
                'form' => $form,
                'formType' => \DluTwBootstrap\Form\FormUtil::FORM_TYPE_VERTICAL,
                'sporocilo' => $sporocilo,
                'napaka' => $napaka));
        }
}
