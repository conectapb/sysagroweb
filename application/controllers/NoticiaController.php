<?php
//require_once APPLICATION_PATH.'/models/Noticia.php';
//require_once APPLICATION_PATH.'/models/Artigo.php';
class NoticiaController extends Zend_Controller_Action
{

    public function init(){
    	//$layout = $this->_helper->layout();
    	//$layout->setLayout('agro');
    	//$this->_helper->layout->setLayout('agro');
    }

    public function listAction(){
		
		      //$this->_helper->layout->setLayout('layout');
          //Noticia Principal
          //$model 		   = new Application_Model_Noticia();
          //$pecuaria   = new Application_Model_DbTable_Noticia();
          //$dados     = $model->select(null, "id" , 4 );
          //$dados       = $model->select();
          //$this->view->assign("dados", $dados);
    }



    public function readAction(){
      $id = $this->_getParam('id', 0);
       try{
              $dados = new Application_Model_DbTable_Noticia();
              //$where = 'id = '.$id;
              $dados = $dados->getCategoria('id = '.$id, 'id DESC' , 0, 1 );
              $this->view->assign("dados", $dados);
              
              // insere noticias mais lidas
              $mais = new Application_Model_DbTable_Maislidas();
              $mais = $mais->add($id, $dados[0]['titulo']);
              
              //lista noticias saiba mais  - Agricultura
              $agricultura = new Application_Model_DbTable_Noticia();
              //$colunas    = array('id' ,'titulo', 'comentario' ,'categoria_noticia_id' );  
              $agricultura = $agricultura->joinCategoria('categoria_noticia_id =  4', 'id DESC' , 4 ,  null);
              $this->view->assign("agricultura", $agricultura); 
          }
          catch (Zend_Db_Exception $exc) {
            echo $exc->getTraceAsString();
          }
    }

}