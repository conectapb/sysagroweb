<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Zend/Mail.php';
require_once 'Zend/Mail/Transport/Smtp.php';
class ContatoController extends Zend_Controller_Action{
    
    public function indexAction(){     
        $model_evento = new Application_Model_Evento();
        $model_red    = new Application_Model_Red();
        $dadose       = $model_evento->select(null, "id" , 4 );
        $dado_red     = $model_red->select();
        $this->view->assign("dado_red", $dado_red);
	$this->view->assign("dadoe", $dadose);
    }
    public function registroAction(){     
        $model_evento = new Application_Model_Evento();
        $model_red    = new Application_Model_Red();
        $dadose       = $model_evento->select(null, "id" , 4 );
        $dado_red     = $model_red->select();
        $this->view->assign("dado_red", $dado_red);
	$this->view->assign("dadoe", $dadose);
        $this->view->assign ( 'title', 'En construcion' );
    }  
    public function emailAction(){
	$formData = $this->getRequest()->getPost();
           if ($formData)
           {
                $destino   = $this->_request->getPost('destino');
                $assunto   = $this->_request->getPost('assunto');
                $nome	   = $this->_request->getPost('nome');
                $email     = $this->_request->getPost('email');
                $mensaje   = $this->_request->getPost('mensaje');
                $mail = new Zend_Mail();
                //$mail->setBodyHtml($mensaje,'utf-8');
                $mail->setBodyText($mensaje);
                $mail->setFrom($email, $nome );
                $mail->addTo($destino, 'Contato Por Web');
                $mail->setSubject($assunto);
                $mail->send();
                $this->_helper->flashMessenger->addMessage(array('success'=>'Email Enviando com sucesso'));
           }
           else
           {
               $this->_helper->flashMessenger->addMessage(array('success'=>'Erro ao envial o email'));
           }
    }
    public function successAction(){
        if ($this->_helper->getHelper('FlashMessenger')->getMessages()) {
            $this->view->messages = $this->_helper
                            ->getHelper('FlashMessenger')
                            ->getMessages();
        } else {
            $this->_redirect('/login/success');
        }
    }
}
?>