<?php

/**
 * Description of Usuario-Controller
 *
 * @author Kadisley
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

    public function showAction(){
        //$this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
            if($id > 0){
                //$usuarios = $this->usuario->find($id)->current();
                $this->view->usuario = $this->usuario->find($id)->current();
            }
            else $this->view->message = 'registro não existe';
    }

}?>