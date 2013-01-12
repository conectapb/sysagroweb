<?php
require_once 'Zend/Session/Namespace.php';
class AuthController extends Zend_Controller_Action
{
    public function init(){
        /* Initialize action controller here */
        $this->_helper->layout->setLayout('auth');
    }
    public function indexAction(){
        $form = new Application_Form_Login();
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                if ($this->_process($form->getValues()))
                {
                  $auth = Zend_Auth::getInstance();
                    if ($auth->hasIdentity())
                    {
                        $username = $auth->getIdentity()->username;
                        /* obtendo a sessao referente ao namespace Login */
                        $session_login = new Zend_Session_Namespace('session_login');
                        /* incluindo dados na sessao do namespace Login */
                        $session_login->usuario = $username;
                    }
                    // We're authenticated! Redirect to the home page
                    $this->_helper->redirector('menu', 'administrador');

                    //Redireciona para o Controller protegido
		    //return $this->_helper->redirector->goToRoute(array('controller' => 'administrador'), null, true);

                }
            }
        }
        $this->view->form = $form;
    }
    protected function _process($values){
        // in the Zend_Auth component
        // Get our authentication adapter and check credentials
        $adapter = $this->_getAuthAdapter();
        $adapter->setIdentity($values['username']);
        $adapter->setCredential($values['password']);
        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($adapter);
        if ($result->isValid()) {
            $user = $adapter->getResultRowObject();
            $auth->getStorage()->write($user);
            return true;
        }
        return false;
    }
    protected function _getAuthAdapter(){
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

        $authAdapter->setTableName('users')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password')
                    ->setCredentialTreatment('SHA1(CONCAT(?,salt))');

        return $authAdapter;
    }
    public function logoutAction(){
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index'); // back to login page
    }
    public function loginkAction(){
       if (strtolower($_SERVER['REQUEST_METHOD']) == 'post')
       {
        // collect the data from the user
        Zend_Loader::loadClass('Zend_Filter_StripTags');
        $filter = new Zend_Filter_StripTags();
        $username = $filter->filter($this->_request->getPost('username'));
        $password = $filter->filter($this->_request->getPost('password'));

            if (empty($username)) {
                $this->view->message = 'Please provide a username.';
            }
            else
            {
                // setup Zend_Auth adapter for a database table
                $dbAdapter = Zend_Db_Table::getDefaultAdapter();

                //Zend_Loader::loadClass('Zend_Auth_Adapter_DbTable');
                $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
                $authAdapter->setTableName('login');
                $authAdapter->setIdentityColumn('email');
                $authAdapter->setCredentialColumn('password');

                // Set the input credential values to authenticate against
                $authAdapter->setIdentity($username);
                $authAdapter->setCredential($password);

                // do the authentication
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
                if ($result->isValid()) {
                    // success : store database row to auth's storage system (not the password though!)
                    $data = $authAdapter->getResultRowObject(null, 'password');
                    $auth->getStorage()->write($data);
                    // I THINK I NEED TO CHANGE THIS LINE
                    $this->_redirect('/');
                } else {
                    // failure: clear database row from session
                    $this->view->message = 'Login failed.';
                }
            }
        }
        $this->render();
     }

}



