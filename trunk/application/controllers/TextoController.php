<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DeejayController
 *
 * @author Administrador
 */

class TextoController extends Zend_Controller_Action{


    public function init(){
	   $this->texto = new Application_Model_DbTable_Texto(); // DbTable
    }
    
     public function indexAction(){
        //$this->_helper->layout->setLayout('administrator');
        $model = new Application_Model_Texto();
        $dados = $model->select();
        $this->view->assign("dados", $dados);
    }

    public function textoAction(){
        try{
            //$id = $this->_getParam('rotulo', 0);
            $id = $this->getRequest()->getParam('rotulo');
            if (!empty($id))
            {
                $tex = new Application_Model_Texto();
                $dados = $tex->select("rotulo = '$id' ", "id", 1);
                //$dados = $tex->select("rotulo LIKE '%$id'", "id", 1);
                $this->view->assign("dados", $dados);
            }
        } catch (Zend_Db_Exception $exc) {

            echo $exc->getTraceAsString();
        }
     }


    // region administador
    public function listAction(){

        $this->_helper->layout->setLayout('administrator');
        // Página que a paginação irá iniciar
        $pagina = intval($this->_getParam('pagina', 1));

        //$categoria = new Application_Model_DbTable_Categoria();
        //$dados = $this->Deejay_DbTable->fetchAll();
        $dados = $this->texto->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por página
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serão exibidas
        $paginator->setPageRange(10);
        // Seta a página atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->deejay = $paginator;
    }
    public function newAction(){
	   $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Deejay();
        $this->view->form = $form;
        if ($this->getRequest()->isPost() and $form->isValid($_POST)  ) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $nome 	       = $form->getValue('nome');
                $endereco      = $form->getValue('endereco');
                $bibliografia  = $form->getValue('bibliografia');
                $bairro        = $form->getValue('bairro');
                $email         = $form->getValue('email');
                $telefone      = $form->getValue('telefone');
                $celular       = $form->getValue('celular'); 
                $this->texto->add($nome
                        , $endereco
                        , $bibliografia
                        , $bairro
                        , $email
                        , $telefone
                        , $celular
                        , $nameFile);
                   if($this->texto)
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
        $form = new Application_Form_Deejay();
        $this->view->form = $form;
	   if ($this->getRequest()->isPost()) 
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $id 	       = (int) $form->getValue('id');
                $nome 	       = $form->getValue('nome');
                $endereco      = $form->getValue('endereco');
                $bibliografia  = $form->getValue('bibliografia');
                $bairro        = $form->getValue('bairro');
                $email         = $form->getValue('email');
                $telefone      = $form->getValue('telefone');
                $celular       = $form->getValue('celular');			
                $this->texto->updates($id
                        , $nome
                        , $endereco
                        , $bibliografia
                        , $bairro
                        , $email
                        , $telefone
                        , $celular
                        , $nameFile);
                if($this->texto)
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
                //$deejay = new Application_Model_DbTable_Deejay();
                $form->populate($this->texto->getId($id));
            }
        }
    }
    public function excluirAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        //$deejay = new Application_Model_DbTable_Deejay();
        // Recupera o id
        $id = $this->_request->getParam("id", 0);
        // Verifica se existe id
        if($id > 0)
        {
            //// Cria o where
            // Remove o registro
            $this->texto->delete(array("id = ?" => $id));
        }
        // Redireciona
        //$this->_helper->redirector("index", NULL, NULL);
        $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
    }
    public function deleteAction(){
        $params = array('host' =>'localhost'
            , 'username' =>'root'
            , 'password' =>''
            , 'dbname'	=>'didi' );
        $DB = new Zend_Db_Adapter_Pdo_Mysql($params);
        $request = $this->getRequest();
        $DB->delete('deejay', 'id = '.$request->getParam('id'));
        $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro alterado com sucesso'));
        $this->_helper->redirector('sucesso');
    }
    public function viewAction(){
     $this->assecoAction();
     $this->_helper->layout->setLayout('administrator');
     try
     {
      $id = $this->_getParam('id', 0);
      if ($id > 0)
      {
         $deejay = new Application_Model_Deejay();
         $dados = $deejay->select("id = $id", "id", 1);
         $this->view->assign("dados", $dados);
       }
      } 
      catch (Zend_Db_Exception $exc) {
         echo $exc->getTraceAsString();
      }
    }
    public function showAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
        if ($id > 0) 
    	{
          $deejay = $this->deejay->find($id)->current(); 
	  // or $this->Posts->fetchRow("id = $id");
          $this->view->deejay = $deejay;
        }
        else $this->view->message = 'registro não existe';
    }
    public function sucessoAction(){
        $this->_helper->layout->setLayout('administrator');
        $dados = "sucesso";
	   $this->view->assign("dados", $dados);
    }
    public function assecoAction(){
        // valida sessão
         if (!Zend_Auth::getInstance()->hasIdentity() )
         {
            return $this->_helper->redirector->goToRoute(
                    array('controller' => 'auth'), null, true);
         }
    }
    // region administador
   
   
    

}
?>
