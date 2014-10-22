<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaPostController
 *
 * @author Kadisley
 */
class CategoriapostController extends Zend_Controller_Action{
    
    public function init() {
        
        $this->categoriapost = new Application_Model_DbTable_Categoriapost();
                                   
    }
    
    
    public function indexAction(){
        $this->assecoAction();
        
        $this->_helper->layout->setLayout('administrator');
        
        $pagina = intval($this->_getParam('pagina',1));
        $dados = $this->categoriapost->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        $paginator->setItemCountPerPage(10);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($pagina);
        $this->view->categoriapost = $paginator;
    }
    
    public function showAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
            if($id > 0){
                $this->view->categoriapost = $this->categoriapost->find($id)->current();
            }
            else $this->view->message = 'registro não existe';
    }
    
    public function addAction(){
        
        $this->assecoAction();

        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Categoriapost();
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData)){
                
                $this->categoriapost->add($form->getValue('descricao'));
                
                if ($this->categoriapost) 
                {
                    $this->_helper->flashMessenger->addMessage(
                                array('sucesso'=>'Registro Gravado com sucesso'));
                    $this->_helper->redirector('sucesso');        
                }
            }
            else{
                $form->populate($formData);
            }
        }
    }
    
    public function editAction(){
        
        $this->assecoAction();

        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Categoriapost();
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData)){
                
                $this->categoriapost->updates(
                            (int)$form->getValue('id'),
                            $form->getValue('descricao')
                );
                
                if ($this->categoriapost) {
                    $this->_helper->flashMessenger->addMessage(
                                array('sucesso'=>'Registro Gravado com sucesso'));
                    $this->_helper->redirector('sucesso');        
                }
            }
            else{
                $form->populate($formData);
            }
        }
        else{
            $id = $this->_getParam('id',0);
            if($id>0){
                $form->populate($this->categoriapost->getId($id));
            }
        }
    }
    
    public function deleteAction(){
        
        $this->assecoAction();
        
        $this->_helper->layout->setLayout('administrator');
        $id = $this->_request->getParam("id",0);
        if($id > 0){
            $this->categoriapost->delete(array("id = ?" => $id));
        }
        $this->_helper->flashMessenger->addMessage(array('sucesso'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
    }
    
    public function sucessoAction(){
        $this->_helper->layout->setLayout('administrator');
        $dados = "sucesso";
        $this->view->assign("dados",$dados);
    }

    public function assecoAction(){
        // valida sessão
         if (!Zend_Auth::getInstance()->hasIdentity() )
         {
            return $this->_helper->redirector->goToRoute(
                    array('controller' => 'Autenticacao'), null, true);
         }
    }
}
