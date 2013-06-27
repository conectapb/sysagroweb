<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategorianoticiaController
 *
 * @author Axel Alexander
 */

class CategorianoticiaController extends Zend_Controller_Action{

    
     public function init(){
        $this->categoria = new Application_Model_DbTable_Categorianoticia(); // DbTable
     }
     
     
    // region administador - form
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Pсgina que a paginaчуo irс iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        //$categoria = new Application_Model_DbTable_Categoria();
        $categoria = $this->categoria;
        $dados = $categoria->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por pсgina
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serуo exibidas
        $paginator->setPageRange(10);
        // Seta a pсgina atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->categoria = $paginator;
    }
    
    public function addAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Categorianoticia();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {   $this->categoria->add( $form->getValue('descricao') );
                if($this->categoria)
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
                $categorias = $this->categoria->find($id)->current(); // or $this->Posts->fetchRow("id = $id");
                $this->view->categoria = $categorias;
            }
        else $this->view->message = 'registro nуo existe';
    }
    
    public function editAction(){
            $this->assecoAction();
            $this->_helper->layout->setLayout('administrator');
            $form = new Application_Form_Categorianoticia();
            $this->view->form = $form;
    	    if ($this->getRequest()->isPost()) 
            {
                $formData = $this->getRequest()->getPost();
                if ($form->isValid($formData))
                {
                    //$id 	    = (int) $form->getValue('id');
                    $this->categoria->updates((int)$form->getValue('id'), $form->getValue('descricao') );
                    
                    if($this->categoria)
                        {
                           $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro alterado com sucesso'));
                           $this->_helper->redirector('sucesso');
                        }
                } else {
                    $form->populate($formData);
                }
            } else 
            {
                $id = $this->_getParam('id', 0);
                if ($id > 0) 
                {
                    //$deejay = new Application_Model_DbTable_Deejay();
                    $form->populate($this->categoria->getId($id));
                }
            }
    }
    
    public function deleteAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->_request->getParam("id", 0);
        
        if($id > 0)
        {
            $this->categoria->delete(array("id = ?" => $id));
        }      
        $this->_helper->flashMessenger->addMessage(
                array('successo'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
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
                    array('controller' => 'Autenticacao'), null, true);
         }
    }
     
    // end region administador - form

    // region administador - json
    public function postAction() {
       try
         {
            $request  = $this->getRequest ();         
            $dados = $this->categoria->add( utf8_decode($request->getParam ( 'descricao' ))  ); 
            $msg = array('mensagem' => "ok", 'refres' => "yes");
            $this->_helper->json( $msg );         
        } 
        catch (Zend_Db_Exception $exc){
            echo $exc->getTraceAsString();
        }
    }
    
    public function post4Action() {
        try 
            {
                $base = Zend_Registry::get('db');  
                $request     = $this->getRequest ();
                $sql = "INSERT INTO site_categoria_noticias (`descricao` ) VALUES ('". $request->getParam ( 'descricao' )."')";
                $base->query ( $sql );
                
                //$msg[0] = "ok" ;

                $msg = array('mensagem' => "ok", 'refres' => "yes");
                $this->_helper->json( $msg );
                //$this->_helper->json($sql);
            } 
        catch (Zend_Db_Exception $exc)
        {
                echo $exc->getTraceAsString();
        }
    }
    
    public function updateAction() {
        $this->_helper->layout->setLayout('administrator');
       try
         {
            $request  = $this->getRequest(); 
            $id       = (int) $request->getParam ('id');        
            $this->categoria->updates( $id,utf8_decode($request->getParam ('descricao')));     
            
            if($this->categoria){

                 $msg = array('mensagem' => "ok", 'refres' => "yes");
                 $this->_helper->json( $msg );         
            }
        } 
        catch (Zend_Db_Exception $exc){
            //echo $exc->getTraceAsString();
            $msg = array('mensagem' => "erro", 'refres' => "no" ,"errorMsg" => $exc->getTraceAsString() );
            $this->_helper->json( $msg ); 
        }
    }
    
    public function excluirAction() {  
        $this->_helper->layout->setLayout('administrator');
        try
         {
            //$id = (int) $this->getRequest->getParam ('id'); 
            $request  = $this->getRequest(); 
            //$id       = (int) $request->getParam ('id'); 
            $id       = $this->_request->getParam("id", 0);
            if($id > 0)
            {
               $this->categoria->delete(array("id = ?" => $id));
               $msg = array('mensagem' => "ok", 'refres' => "yes");
                     $this->_helper->json( $msg );  
            }
        }
        catch (Zend_Db_Exception $exc){
            //echo $exc->getTraceAsString();
            $msg = array('mensagem' => "erro", 'refres' => "no" ,"errorMsg" => $exc->getTraceAsString() );
            $this->_helper->json( $msg ); 
        }
    }
    // end adiministrador - json


    public function getjsncategoriaAction() {
       $user = $this->categoria->fetchAll();
       $i=0;
       $responce = NULL;
       foreach($user as $row) {
            $responce[$i]['id']=$row->id;
            $responce[$i]['nome']= $row->descricao;
            //$responce[$i]['observacao']= utf8_encode($row->observacao);       
           $i++;
        }

        $msg = array('Mensagem' => "OK", "retorno" => $responce );
        $this->_helper->json(  $msg  );
        //$this->_helper->json( "mensagem" => "ok" , "retorno" =>  $responce  );
    }


}
?>