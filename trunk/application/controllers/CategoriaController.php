<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaController
 *
 * @author Axel Alexander
 */

class CategoriaController extends Zend_Controller_Action{

    
     public function init(){
        $this->categoria = new Application_Model_DbTable_Categoria(); // DbTable
     }
     
     
    // region administador - form
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Página que a paginação irá iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        $categoria = new Application_Model_DbTable_Categoria();
        $dados = $categoria->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por página
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serão exibidas
        $paginator->setPageRange(10);
        // Seta a página atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->categoria = $paginator;
    }
     
    public function newAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Categoria();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $descricao = $form->getValue('descricao');
                $this->categoria->add($descricao);
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
        else $this->view->message = 'registro não existe';
    }
    
    public function editarAction(){
            $this->assecoAction();
            $this->_helper->layout->setLayout('administrator');
            $form = new Application_Form_Categoria();
            $this->view->form = $form;
    	    if ($this->getRequest()->isPost()) 
            {
                $formData = $this->getRequest()->getPost();
                if ($form->isValid($formData))
                {
                    $id 	    = (int) $form->getValue('id');
                    $descricao 	= $form->getValue('descricao');
                    $this->categoria->updates($id, $descricao);
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
    
    public function excluirAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->_request->getParam("id", 0);
        
        if($id > 0)
        {
            $this->categoria->delete(array("id = ?" => $id));
        }      
        $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
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

    public function deleteAction() {  
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

    public function getlistAction() {
        $page   = $this->_request->getParam("page",1);
        $limit  = $this->_request->getParam("rows");
        //$sidx   = "id";
        //$sord   = "ASC";
         //total
        $user = $this->categoria->fetchAll();
        $count = count( $user );

         if( $count >0 ) {
            $total_pages = ceil($count/$limit);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages)
            $page = $total_pages;

        $user = $this->categoria->fetchAll(null, "id ASC", $limit, ($page*$limit-$limit));

        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        $i=0;
        $responce = NULL;
       foreach($user as $row) 
       {
            $responce["total"] = $count;
            $responce["rows"][$i]['id']=$row->id;
            $responce["rows"][$i]['descricao']= utf8_encode($row->descricao);       
           $i++;
        }
        $this->_helper->json($responce);
    }

    // end adiministrador - json
     
    public function listAction(){
        $this->_helper->layout->setLayout('administrator1');

    }
    
   
    

   



    
}
?>
