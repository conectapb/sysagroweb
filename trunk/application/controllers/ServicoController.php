<?php
/**
 * Description of DeejayController
 *
 * @author Administrador
 */
class ServicoController extends Zend_Controller_Action{


    public function init(){
        $this->servico = new Application_Model_DbTable_Servico(); // DbTable
        $this->params = array('host'	=>'localhost',
                         'username'	=>'root',
                         'password'     =>'',
                         'dbname'	=>'didi');
    }
    // region administador
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Pсgina que a paginaчуo irс iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        $dados = $this->servico->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por pсgina
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serуo exibidas
        $paginator->setPageRange(10);
        // Seta a pсgina atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->servico = $paginator;
    }
    public function newAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Servico();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $servico     = $form->getValue('nome');
                $observacao  = $form->getValue('observacao');
		$this->servico->add($servico, $observacao );
                    if($this->servico)
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
                // or $this->Posts->fetchRow("id = $id");
                $evento = $this->servico->find($id)->current();
                $this->view->servico = $evento;
            }
            else $this->view->message = 'registro nуo existe';
    }
    public function editarAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Servico();
        $this->view->form = $form;
        if ($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $id           = (int) $form->getValue('id');
                $nome         = $form->getValue('nome');
                $observacao   = $form->getValue('observacao');
		$this->servico->updates($id, $nome , $observacao);
              if($this->servico)
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
                
                $form->populate($this->servico->getId($id));
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
           $this->servico->delete(array("id = ?" => $id));
        }
        // Redireciona
        $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
    }
    public function viewAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        try{
            $id = $this->_getParam('id', 0);
            if ($id > 0)
            {
                $evento = new Application_Model_Servico();
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
        $where = $this->servico->getAdapter()->quoteInto('id = ?', $id);
        $this->servico->delete($where);
        $this->_redirect('servico/index');
    }
    // region administador
    public function getservicoAction() {
       $user = $this->servico->fetchAll();
       $i=0;
       $responce = NULL;
       foreach($user as $row) {
            $responce[$i]['id']=$row->id;
            $responce[$i]['nome']= $row->nome;
            $responce[$i]['observacao']= utf8_encode($row->observacao);       
           $i++;
        }
        $this->_helper->json($responce);
    }
    public function getservico1Action(){
      try
         {
          $db = Zend_Registry::get('db');
           //$stmt = $db->query('SELECT * FROM site_agenda_servico');
           //$stmt->setFetchMode(Zend_Db::FETCH_ASSOC);
           
            //$dao->fetchAll($select)->toArray();

            //$select = $users->select();
           //$data = $users->fetchAll($select);
          // $dados = $stmt->fetchRow();
           //$dados = $stmt->fetchAll();
           //$results = $stmt->toArray();
           
           
          //return $dados->toArray();
          //echo Zend_Json::encode($results);
          //$this->view->dados = $results;
           
            //$this->_db = Zend_Db_Table::getDefaultAdapter(); 
            //$stmt = $this->_db->select()->from('m_message', 'm_content')->where('m_id = ?',$messageId );
            //$result = $this->_db->fetchAll($stmt);
           
           $sql = "SELECT * FROM site_agenda_servico";
            $result = $db->fetchAll($sql);
            $json = $result;            
            //Zend_Json::$useBuiltinEncoderDecoder = true;
            ///$json = Zend_Json::encode($result);
            //$json = Zend_Json_Encoder::encode($result);
           
            
           $resultArray = array(); 
           foreach($result as $key => $value) 
				{ if (!is_null($value)) 
					 { 
						//$obj->$key = utf8_encode($value); 
                                                $result[$key] = utf8_encode($value); 
					 } 
			    } $resultArray[] = $result; 
                            $json = $resultArray;
            //$this->view->dados =  $json ;
            
            //$this->_redirect('servico/dados');
            //$this->_helper->Zend_Json::encode($result);
            //$this->_helper->$json;
            //$this->view->dados = Zend_Json::encode($json);
            //$this->view->dados = json_encode($json, true);
            //echo json_encode($json, true);
            //$this->view->dados = Zend_Json::decode($json);
            //echo Zend_Json::encode($json);
            //echo Zend_Json::decode($json);
            $this->_helper->json($json );
         }
         catch (Zend_Db_Exception $exc)
         {
             echo $exc->getTraceAsString();
         }
    }
    
}
?>