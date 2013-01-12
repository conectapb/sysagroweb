<?php
/**
 * Description of DeejayController
 *
 * @author Administrador
 */
class ArtigoController extends Zend_Controller_Action{


    public function init(){
        
        $this->artigo = new Application_Model_DbTable_Artigo(); // DbTable
    }
    
    // region administador
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Pсgina que a paginaчуo irс iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        $dados = $this->artigo->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por pсgina
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serуo exibidas
        $paginator->setPageRange(10);
        // Seta a pсgina atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->artigo = $paginator;
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
                $titulo        = $form->getValue('titulo');
                $destaque      = $form->getValue('destaque');
                $data          = $form->getValue('data');
                $data_evento   = $form->getValue('data_evento');
                $ativo         = $form->getValue('ativo');
                //$evento = new Application_Model_DbTable_Evento();
                $this->artigo->comandInsert($titulo
                                    , $destaque
                                    , $data
                                    , $data_evento
                                    , $ativo);

                    if($this->artigo)
                    {
                       $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro Gravado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } else {
                $form->populate($formData);
            }
        }
    }
    public function showAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
            if ($id > 0) 
            {
                //// or $this->Posts->fetchRow("id = $id");
                $evento = $this->artigo->find($id)->current();
                $this->view->artigo = $evento;
            }
            else $this->view->message = 'registro nуo existe';
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
                $id            = (int) $form->getValue('id');
                $titulo        = $form->getValue('titulo');
                $destaque      = $form->getValue('destaque');
                $data          = $form->getValue('data');
                $data_evento   = $form->getValue('data_evento');
                $ativo         = $form->getValue('ativo');
                $date          = explode("/",$form->getValue('data') );
                $date1         = explode("/",$form->getValue('data') );
                //$data        = $date[2]."-".$date[1]."-".$date[0];
                //$data_evento = $date1[2]."-".$date1[1]."-".$date1[0];
                $this->artigo->comandUpdate($id
                                    , $titulo
                                    , $destaque
                                    , $data
                                    , $data_evento
                                    , $ativo);
              if($this->artigo)
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
                
                $form->populate($this->artigo->getId($id));
            }
        }
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
           $this->artigo->delete(array("id = ?" => $id));
        }
        // Redireciona
        $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
    }
    public function viewAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        try {

            $id = $this->_getParam('id', 0);
            if ($id > 0)
            {
                
                $evento = new Application_Model_Artigo();
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
        $where = $this->artigo->getAdapter()->quoteInto('id = ?', $id);
        $this->artigo->delete($where);
        $this->_redirect('eventos/list');
    }
    // region administador
    public function agendarAction() {
     $this->view->assign ( 'action', "Agenda/process" );
     $this->view->assign ( 'title', 'Agenda Eventos' );
     $this->view->assign ( 'label_nome', 'Nombre' );
     $this->view->assign ( 'label_telefone', 'Telefono' );
     $this->view->assign ( 'label_celular', 'Celular' );
     $this->view->assign ( 'label_solicitacao', 'Solicitacion' );
     $this->view->assign ( 'label_destaque', 'Observacion' );
     $this->view->assign ( 'label_data_evento', 'Dia del Evento' );
     $this->view->assign ( 'label_submit', 'Gravar' );
     $this->view->assign ( 'label_buscar', 'Ver' );
     $this->view->assign ( 'label_cancelar', 'Cancelar' );
     $this->view->assign ( 'mensaje', 'Por favor, introduzca este formulario en su totalidad' );
     $model_evento = new Application_Model_Evento();
     $model_red    = new Application_Model_Red();
     //$servicos     = new Application_Model_Servico();
     //$ser          = $servicos->select();
     $dadose       = $model_evento->select(null, "id" , 4 );
     $dado_red     = $model_red->select();
     $this->view->assign("dado_red", $dado_red);
     $this->view->assign("dadoe", $dadose);
     //$this->view->assign("dadoser", $ser);
    }
    public function processAction() {
        try 
        {
           $DB = Zend_Registry::get('db');
           //$DB = new Zend_Db_Adapter_Pdo_Mysql ( $this->params );
           $request     = $this->getRequest ();
           $data_evento = explode("/",$request->getParam('data_evento') );
           $data        = $data_evento[2]."-".$data_evento[1]."-".$data_evento[0];
           $sql = "INSERT INTO site_agenda 
        	(`nome`
                ,`telefone`
                ,`celular`
                ,`solicitacao`
                ,`destaque`
                ,`data`
                ,`data_evento`
                ,`status`
                 )
        	VALUES 
        	(
                  '" . $request->getParam ( 'nome' ) . "'
                , '" . $request->getParam ( 'telefone' ) . "'
                , '" . $request->getParam ( 'celular' ) . "'
                , '" . $request->getParam ( 'solicitacao' ) . "'
                , '" . $request->getParam ( 'destaque' ) . "'
                , '" . date("d/m/y") . "'
                , '" . $data . "'
                , 'indefinido' )";
        	       $DB->query ( $sql );
                   $this->view->assign ( 'title', 'Por favor aguarde la respuesta en breve entraremos en contato!' );
        	       $this->view->assign ( 'description', 'solicitud enviado com sucesso' );
      } 
      catch (Zend_Db_Exception $exc){
        echo $exc->getTraceAsString();
      }
    }
    public function postagendaAction() {
       try
         {
            $dao = new Application_Model_Agenda();
            $request = $this->getRequest ();
            $data = array(
                    `nome`        => $request->getParam('nome' ) ,
                    `telefone`    => $request->getParam('telefone'),
                    `celular`     => $request->getParam('celular'),
                    `solicitacao` => $request->getParam('solicitacao'),
                    `destaque`    => $request->getParam('destaque'),
                    `data`        => date("d/m/y"),
                    `data_evento` => $request->getParam('data_evento'),
                    `status`      => 'idefinido');
            $dao->insert($data);  
            $this->view->assign ( 'title', 'Registration Process' );
            $this->view->assign ( 'description', 'Registration succes' ); 
        } 
        catch (Zend_Db_Exception $exc){
            echo $exc->getTraceAsString();
        }
     }
     
    public function testeAction() {
        try {
           $model_evento = new Application_Model_Evento();
           $model_red    = new Application_Model_Red();
           $dadose       = $model_evento->select(null, "id" , 4 );
           $dado_red     = $model_red->select();
         
         
           $db = Zend_Registry::get('db');
           $stmt = $db->query('SELECT * FROM deejay');
           $stmt->setFetchMode(Zend_Db::FETCH_ASSOC);
           $dados = $stmt->fetchAll();
          
           $this->view->assign ('title', 'Calendario Teste' );
           $this->view->assign("dado_red", $dado_red);
           $this->view->assign("dadoe", $dadose);
           $this->view->assign("dados", $dados);
          
         } catch (Zend_Db_Exception $exc)
         {
            echo $exc->getTraceAsString();
          
         }
    }
    
    public function geteventosAction() {
        $db = Zend_Registry::get('db');
         $stmt = $db->query("SELECT id, title, body, url,
			DATE_FORMAT(start, '%Y-%m-%dT%H:%i' ) AS start, DATE_FORMAT(end, '%Y-%m-%dT%H:%i' ) AS end
		   FROM agenda
		   ORDER BY start DESC");
         $stmt->setFetchMode(Zend_Db::FETCH_ASSOC);
         $dados = $stmt->fetchAll();
         //echo $dados;
        $i=0;
       $responce = NULL;
       foreach($dados as $row) {
            $responce[$i]['id']=$row['id'];
            $responce[$i]['title']= utf8_encode($row['title']);
            $responce[$i]['url']= utf8_encode($row['url']);   
            $responce[$i]['start']= $row['start'] ;
            $responce[$i]['end']= $row['end'] ;  
           $i++;
        }
        $this->_helper->json($responce);
    }
     
    public function artigosAction() {
     $model     = new Application_Model_Artigos();
     $artigos   = $model->select(null, "id" , 4 );  
     $this->view->assign("artigos", $artigos);    
    }
    
    
    public function getservicosAction(){
         $servicos     = new Application_Model_DbTable_Servico();
         $dados = $servicos->fetchAll();
         $total = count($dados);
         if( sizeof( $dados )){
          $i=0;
          $responce = NULL;
          foreach($dados as $row) 
          {
            $responce['mensagens']='ok';
            $responce['dados'][$i]['id']=$row['id'];
            $responce['dados'][$i]['nome']= utf8_encode($row['nome']);
            $responce['dados'][$i]['total']= $total;
            $i++;
          }  
             
         }
         
          
         $this->_helper->json($responce);
         //$this->view->assign("dadoser", $ser);
    }
     
}
?>