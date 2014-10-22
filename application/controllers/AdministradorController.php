<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AdministradorController extends Zend_Controller_Action{
    
    public function init(){
    }
    public function indexAction(){
		$this->_helper->layout->setLayout('administrator');
        $dados = "Registra-te!";
        $this->view->assign("dados", $dados);     
    }
    public function menuAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        //$ip = $this->getRequest()->getServer('REMOTE_ADDR');
        $ip = Zend_Controller_Front::getInstance()->getRequest()->getServer('REMOTE_ADDR');
        //$ip = $_SERVER['REMOTE_ADDR'];
        //$dados = "Registra-te!";
        $this->view->assign("IP",   $ip);
        //$this->view->assign("dados", $dados);
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
