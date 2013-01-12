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

class RedController extends Zend_Controller_Action{

    
     public function init(){
        $this->red = new Application_Model_DbTable_Red(); // DbTable
     }  
     // region administador
     public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Página que a paginação irá iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        //$categoria = new Application_Model_DbTable_Categoria();
        //$dados = $categoria->fetchAll();
        $dados =  $this->red->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por página
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serão exibidas
        $paginator->setPageRange(10);
        // Seta a página atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->red = $paginator;
    }
     public function newAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Red();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $rotulo = $form->getValue('rotulo');
                $link   = $form->getValue('link');
               
                $this->red->add($rotulo, $link);
                if($this->red)
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
                $dados = $this->red->find($id)->current(); 
		// or $this->Posts->fetchRow("id = $id");
                $this->view->red = $dados;
            }
            else $this->view->message = 'registro não existe';
    }
     public function editarAction(){
        $this->assecoAction();
	$this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Red();
        $this->view->form = $form;
	if ($this->getRequest()->isPost()) 
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $id 	= (int) $form->getValue('id');
                $rotulo = $form->getValue('rotulo');
                $link   = $form->getValue('link');
                $this->red->updates($id, $rotulo, $link);
                if($this->red)
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
                $form->populate($this->red->getId($id));
            }
        }
    }
     public function excluirAction() {
        $this->assecoAction();
	$this->_helper->layout->setLayout('administrator');
        // Recupera o id
        $id = $this->_request->getParam("id", 0);
        // Verifica se existe id
        if($id > 0)
        {
            // Remove o registro
             $this->red->delete(array("id = ?" => $id));
        }
        // Redireciona
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
     // region administador
     public function listAction(){
        $this->_helper->layout->setLayout('administrator');
        $model = new Application_Model_Red();
        $dados = $model->select();
	$this->view->assign("dados", $dados);
     }
     
}
?>
