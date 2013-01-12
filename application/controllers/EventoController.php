<?php
/**
 * Description of DeejayController
 *
 * @author Administrador
 */
class EventoController extends Zend_Controller_Action{


    public function init(){
        $this->evento = new Application_Model_DbTable_Evento(); // DbTable
    }
    // region administador
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Pсgina que a paginaчуo irс iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        $dados = $this->evento->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por pсgina
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serуo exibidas
        $paginator->setPageRange(10);
        // Seta a pсgina atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->evento = $paginator;
    }
    public function newAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Evento();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $title    = $form->getValue('title');
                $start    = $form->getValue('start');
                $end      = $form->getValue('end') ;
                $url      = $form->getValue('url');
                $body     = $form->getValue('body');
                $ativo    = $form->getValue('ativo');
                $this->evento->add($title,
                                    $start,
                                    $end, 
                                    $url, 
                                    $body, 
                                    $ativo);

                    if($this->evento)
                    {
                       $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro Gravado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } else {
                $form->populate($formData);
            }
        }
    }
    public function editarAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Evento();
        $this->view->form = $form;
        if ($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $locale = 'en_GB';
                $id       = (int) $form->getValue('id');
                $title    = $form->getValue('title');
                $start    = $form->getValue('start');
                $end      = $form->getValue('end') ;
                $url      = $form->getValue('url');
                $body     = $form->getValue('body');
                $ativo    = $form->getValue('ativo');
                //$date          = explode("/",$form->getValue('data') );
                //$date1         = explode("/",$form->getValue('data') );
                $this->evento->update($id,
                                    $title,
                                    $start,
                                    $end, 
                                    $url, 
                                    $body, 
                                    $ativo);
              if($this->evento)
              {
                       $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro alterado com sucesso'));
                       $this->_helper->redirector('sucesso');
              }
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                
                $form->populate($this->evento->getId($id));
            }
        }
    }
    public function editAction(){
     $params = array('host'	=>'localhost',
                     'username'	=>'root',
		     'password' =>'admin',
		     'dbname'	=>'zend'
               );
        $DB = new Zend_Db_Adapter_Pdo_Mysql($params);

        $request = $this->getRequest();
        $id 	 = $request->getParam("id");

        $sql = "SELECT * FROM `user` WHERE id='".$id."'";
        $result = $DB->fetchRow($sql);

        $this->view->assign('data',$result);
        $this->view->assign('action', $request->getBaseURL()."/user/processedit");
        $this->view->assign('title','Member Editing');
        $this->view->assign('label_fname','First Name');
        $this->view->assign('label_lname','Last Name');	
        $this->view->assign('label_uname','User Name');	
        $this->view->assign('label_pass','Password');
        $this->view->assign('label_submit','Edit');		
        $this->view->assign('description','Please update this form completely:');		
    }
    public function excluirAction() {
       $this->assecoAction();
       $this->_helper->layout->setLayout('administrator');
       // Recupera o id
       $id = $this->_request->getParam("id", 0);
       // Verifica se existe id
        if($id > 0) {
           // Cria o where
           // Remove o registro
           $this->evento->comandDelete(array("id = ?" => $id));
        }
        // Redireciona
        $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
    }
    public function showAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
            if ($id > 0) 
            {
                //// or $this->Posts->fetchRow("id = $id");
                $evento = $this->evento->find($id)->current();
                $this->view->evento = $evento;
            }
            else $this->view->message = 'registro nуo existe';
    }
    public function viewAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        try {

            $id = $this->_getParam('id', 0);
            if ($id > 0)
            {
                //$deejay = new Application_Model_DbTable_Deejay();
                $evento = new Application_Model_Evento();
                $dados = $evento->select("id = $id", "id", 1);
                $this->view->assign("dados", $dados);
            }
        } catch (Zend_Db_Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }
    public function sucessoAction(){
        $this->_helper->layout->setLayout('administrator');
        $dados = "sucesso";
	$this->view->assign("dados", $dados);
    }
    public function assecoAction(){
        // valida sessуo
         if (!Zend_Auth::getInstance()->hasIdentity() )
         {
            return $this->_helper->redirector->goToRoute(
                    array('controller' => 'auth'), null, true);
         }
    }
    public function deletesAction(){
        // verificamos se realmente foi informado algum ID
        if ( $this->_hasParam('id') == false )
        {
            $this->_redirect('List');
        }

        $id = $this->_request->getParam("id", 0);
        //$id = (int) $this->_getParam('id');
        $where = $this->evento->getAdapter()->quoteInto('id = ?', $id);
        $this->Evento->delete($where);
        $this->_redirect('eventos/list');
    }
    // region administador
    public function listarAction(){
        $this->_helper->layout->setLayout('layout');
        $model_evento = new Application_Model_Evento();
        $model_red    = new Application_Model_Red();
        $dadose       = $model_evento->select(null, "id" , 4 );
        $dado_red     = $model_red->select();
        $this->view->assign ( 'title', 'Eventos' );
        $this->view->assign("dado_red", $dado_red);
	$this->view->assign("dadoe", $dadose);
    }  
    public function geteventosAction() {
        $db = Zend_Registry::get('db');
         $stmt = $db->query("SELECT id, title, body, url,
			DATE_FORMAT(start, '%Y-%m-%dT%H:%i' ) AS start, DATE_FORMAT(end, '%Y-%m-%dT%H:%i' ) AS end
		   FROM site_evento
		   ORDER BY start DESC");
         $stmt->setFetchMode(Zend_Db::FETCH_ASSOC);
         $dados = $stmt->fetchAll();
         //echo $dados;
        $i=0;
       $responce = NULL;
       foreach($dados as $row) {
            $responce[$i]['id']=$row['id'];
            $responce[$i]['title']= utf8_encode($row['title']);
            $responce[$i]['body']= utf8_encode($row['body']);
            $responce[$i]['url']= utf8_encode($row['url']);   
            $responce[$i]['start']= $row['start'] ;
            $responce[$i]['end']= $row['end'] ;  
           $i++;
        }
        $this->_helper->json($responce);
    }
    public function eventosAction(){
     try{
          
          $model_evento = new Application_Model_Evento();
          $model_red    = new Application_Model_Red();
          $dadose       = $model_evento->select(null, "id" , 4 );
          $dado_red     = $model_red->select();
          $db = Zend_Registry::get('db');
          $stmt = $db->query('SELECT * FROM site_evento WHERE ativo = "Si" ');
          $stmt->setFetchMode(Zend_Db::FETCH_ASSOC);
          $dados = $stmt->fetchAll();
          $this->view->assign("dados", $dados);
          $this->view->assign("dado_red", $dado_red);
	  $this->view->assign("dadoe", $dadose);
         }
         catch (Zend_Db_Exception $exc)
         {
             echo $exc->getTraceAsString();
         }
    }
    public function verAction(){
     try {
         $id = $this->_getParam('id', 0);
            if ($id > 0)
            {
                $model_evento = new Application_Model_Evento();
                $model_red    = new Application_Model_Red();
                $evento = new Application_Model_Evento();
                $dadose       = $model_evento->select(null, "id" , 4 );
                $dado_red     = $model_red->select();
                $dados        = $evento->select("id = $id", "id",1);
                $this->view->assign("dado_red", $dado_red);
                $this->view->assign("dadoe", $dadose);
                $this->view->assign("dados", $dados);
            }
        } catch (Zend_Db_Exception $exc) {

            echo $exc->getTraceAsString();
        }

    }
    # region validations
    protected  function ConvertDataUD( $date ){
          $date1         = explode("/",$date );
         return $date1 = $date[2]."-".$date[1]."-".$date[0];
     }
}
?>