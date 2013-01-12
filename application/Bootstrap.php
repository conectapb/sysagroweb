<?php
include(APPLICATION_PATH.'/views/helpers/Analytics.php');
include(APPLICATION_PATH.'/views/helpers/Linkvoltar.php');
include(APPLICATION_PATH.'/views/helpers/Img.php');
include(APPLICATION_PATH.'/views/helpers/OutputLink.php');
include(APPLICATION_PATH.'/views/helpers/Photo.php');
include(APPLICATION_PATH.'/views/helpers/AddEvent.php');

define('BASE_URL', "http://localhost/agronegoio/public/") ;
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
        $view->headTitle( 'Painel de Control DjDiDiMix :: Regsitrar' );
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
     
    }
    /**
    * Initialize application Autoload
    * @return void
    */
    protected function _initAutoload(){
      /*
        $autoloader = new Zend_Application_Module_Autoloader(array(
	'basePath' => APPLICATION_PATH,
	'namespace' => ''
     ));
    return $autoloader; */
    }
    /**
    * Initialize application AppAutoload
    *
    * @return void
    */
    protected function _initAppAutoload() {
      //$autoloader = Zend_Loader_Autoloader::getInstance ();
      //$autoloader->registerNamespace ('Ingot_');
      //$autoloader->registerNamespace ('ZendX_');
      /*
      $autoloader = new Zend_Application_Module_Autoloader(array(
      'namespace' => 'App',
      'basePath' => dirname(__FILE__),));
      */
      
      return $autoloader;
    }
    /**
    * Initialize application Namespace
    * @return void
    */
    protected function _initNamespace(){
     //$autoloader = Zend_Loader_Autoloader::getInstance();
     //$autoloader->registerNamespace('Simp_');
    }

    public function _initView(){
      $view = new Zend_View();
      //$view->setScriptPath(APPLICATION_PATH);
      //$view->addHelperPath('../application/views/helpers/', 'Zend_View_Helper');
      //Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')->setView($view);
      
      // jquery X
      //ZendX_JQuery::enableView($view);
      //$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
      //$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
      //$view->jQuery()
                //->addStylesheet(BASE_URL ."ui-themes/prata/jquery.ui.all.css")
                //->setLocalPath(BASE_URL .'jquery/jquery-1.7.2.js')
                //->setUiLocalPath(BASE_URL ."jquery-ui/jquery-ui-1.8.11.custom.js");
      //$viewRenderer->setView($view);   
      //Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
      //$this->bootstrap("layout");
      //$layout = $this->getResource("layout");
      //$view = $layout->getView();

     
      //$view->addHelperPath ( 'ZendX/JQuery/View/Helper', 'ZF_View_Helper_Calander' );
      //$view->addHelperPath('../application/views/helpers/', 'ZF_View_Helper_Calander');
      //$view->addHelperPath('/views/helpers/', 'ZF_View_Helper_Calander');
   
        // Initialize view
       // Add it to the ViewRenderer
       
        //$view->addHelperPath ( '/views/Helper', 'ZF_View_Helper_Calander' );
        //$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer ();
       
        //$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer ();
        //Zend_Controller_Action_HelperBroker::addHelper ( $viewRenderer );
        //$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        //$viewRenderer->setView($view);
        
        //$this->bootstrap("layout");
        //layout = $this->getResource("layout");
        //$view = $layout->getView();
        
        //return $this; 
        //Return it, so that it can be stored by the bootstrap
       return $view;
    }

    protected function _initViewHelpers(){
     //$this->bootstrap('view');
     //$view = $this->getResource('view');
     //$view->addHelperPath( APPLICATION_PATH.'/views/helpers', 'Zend_View_Helper');
    }
    
    public function _initHelpers(){
      $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
      $viewRenderer->initView();
      // add zend view helper path
      $viewRenderer->view->addHelperPath('/View/Helper/', 'Didi_View_Helper');
       // add zend view helper Google Analytics
      //$viewRenderer->view->addHelperPath('/View/Helper/', 'ZF_View_Helper');
    }
    
    public function _initActionHelpers(){
      //Zend_Controller_Action_HelperBroker::addHelper(new HtmlSelect());
      //Zend_Controller_Action_HelperBroker::addHelper(new DaySelect());
      //Zend_Controller_Action_HelperBroker::addHelper(new History());
      //Zend_Controller_Action_HelperBroker::addHelper(new OutputLink());
      //Zend_Controller_Action_HelperBroker::addHelper(new Calander());
    }

    public function _initPlugins(){
    /*
        $frontController = Zend_Controller_Front::getInstance();
        $frontController->registerPlugin(new Application_Plugin_Calendario());
     * 
     */
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

    public function _initSession(){
      // Zend_Controller_Action_HelperBroker::addHelper(new History());
      // Zend_Controller_Action_HelperBroker::addHelper($helper);
    }

   
   
    /**
    * Initialize application DB
    * @return void
    */ 
    public function _initDb(){
         $db = new Zend_Db_Adapter_Pdo_Mysql(
           array( 'host' => 'localhost', 'username' => 'root','password'  => '','dbname' => 'mestre')
           
           //array( 'host'=>'instance32148.db.xeround.com;port=20693', 'username'=>'mestre','password' => '766312','dbname' => 'mestre')     
        

        // $dbh = new PDO("mysql:host=instance123.db.xeround.com;port=4567;dbname=mydb", "john", "malon");


        );
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        Zend_Registry::set('db', $db);
   }
}
?>