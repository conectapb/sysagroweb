<?php


include(APPLICATION_PATH.'/views/helpers/Analytics.php');
include(APPLICATION_PATH.'/views/helpers/Linkvoltar.php');
include(APPLICATION_PATH.'/views/helpers/Img.php');
include(APPLICATION_PATH.'/views/helpers/OutputLink.php');
include(APPLICATION_PATH.'/views/helpers/Photo.php');
include(APPLICATION_PATH.'/views/helpers/FormateDate.php');
include(APPLICATION_PATH.'/views/helpers/ParseDate.php');


//define('BASE_URL', "http://localhost/sysagroweb/public/") ;
//define('BASE_URL', "http://www.dididjmix.com/public//") ;

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{
    
    /**
    * Initialize application Doctype
    * @return void
    */
    protected function _initDoctype(){
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT'); 
        $view->headTitle( 'Painel de Control Agro Web :: Regsitrar' );
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
     
    }
      

    public function _initView(){
      $view = new Zend_View();    
        //return $this; 
        //Return it, so that it can be stored by the bootstrap
       return $view;
    }

    /*
    protected function _initRoute()
    {
      $this->_route = $this->_frontcontroller->getRouter();
      $this->_route->addRoute('default', new Zend_Controller_Router_Route(
          ':controller/:action/*', array(
              'module'     => 'default',
              'controller' => 'index',
              'action'     => 'index'
          )
      ));
  }*/

    
    public function _initHelpers(){
      $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
      $viewRenderer->initView();
      // add zend view helper path
      $viewRenderer->view->addHelperPath('/View/Helper/', 'Agro_View_Helper');
    }
    
    public function _initTranslate(){
      try
         {
           $translate = new Zend_Translate('Array', APPLICATION_PATH . '/languages/es/Zend_Validate.php', 'pt_BR');
           Zend_Validate_Abstract::setDefaultTranslator($translate);
         }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    /**
    * Initialize application DB
    * @return void
    */
    public function _initDb(){
        
        $db = new Zend_Db_Adapter_Pdo_Mysql(
           array( 'host' => 'localhost', 'username' => 'root','password'  => '','dbname' => 'mestre')
           //array( 'host'=>'mysql.hostinger.com.br;port=20693', 'username'=>'mestre','password' => '766312','dbname' => 'mestre')     
           //array( 'host'=>'mysql.hostinger.com.br', 'username'=>'u877420549_mestr','password' => '766312','dbname' => 'u877420549_mestre')     
        );
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        Zend_Registry::set('db', $db);
    }
}