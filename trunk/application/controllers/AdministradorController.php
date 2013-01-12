<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AdministradorController extends Zend_Controller_Action{
    
    public function init(){
       //$layout = $this->_helper->layout();
       //$layout->setLayout('administrator');
         //$this->_helper->layout->setLayout('administrator');
    }
    public function indexAction(){

        //$this->_helper->layout->setLayout('login');
        $this->_helper->layout->setLayout('administrator');
        $dados = "Registra-te!";
        $this->view->assign("dados", $dados);     
    }
    public function menuAction(){

        //$this->_helper->layout->setLayout('login');
        $this->_helper->layout->setLayout('administrator');
        $dados = "Registra-te!";
        $this->view->assign("dados", $dados);
    }
 }
?>