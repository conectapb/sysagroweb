<?php

/**
 * @see Zend_Paginator_Adapter_DbSelect
 */
//require_once 'Zend/Paginator/Adapter/DbSelect.php';

/**
 * @see Ingot_JQuery_JqGrid_Adapter_Interface
 */

class UsuarioController extends Zend_Controller_Action{

     public function init(){
         $this->usuario = new Application_Model_DbTable_Usuario(); // DbTable
     }
     public function indexAction() {
        $this->_helper->layout->setLayout('administrator');
        $pagina = intval($this->_getParam('pagina',1));
        $dados = $this->usuario->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        $paginator->setItemCountPerPage(10);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($pagina);
        $this->view->usuario = $paginator;
    }

     public function addAction(){
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Usuario();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $username      = $form->getValue('username');
                $password      = $form->getValue('password');
		$salt          = $form->getValue('password');
                $role          = $form->getValue('role');
                $date_created  = $form->getValue('date_created');
                $this->usuario->comandInsert(
                                      $username
                                    , $password
                                    , $salt
                                    , $role
                                    , $date_created );

                    if($this->usuario)
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
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Usuario();
        $this->view->form = $form;
        if ($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $id            = (int) $form->getValue('id');
                $username      = $form->getValue('username');
                $password      = $form->getValue('password');
		$salt          = $form->getValue('password');
                $role          = $form->getValue('role');
                $date_created  = $form->getValue('date_created');
                $this->usuario->comandUpdates(
                                            $id
                                            , $username
                                            , $password
                                            , $salt
                                            , $role
                                            , $date_created );
               if($this->usuario)
                    {
                       $this->_helper->flashMessenger->addMessage(
                               array('successo'=>'Registro alterado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0)
            {
                $form->populate($this->usuario->getId($id));
            }
        }
    }
     public function excluirAction() {
       $this->_helper->layout->setLayout('administrator');
       // Recupera o id
       $id = $this->_request->getParam("id", 0);
       // Verifica se existe id
        if($id > 0) {
           // Cria o where
           // Remove o registro
           $this->usuario->comandDelete(array("id = ?" => $id));
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

}?>