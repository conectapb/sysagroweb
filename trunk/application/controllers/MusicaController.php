<?php

class MusicaController extends Zend_Controller_Action
{

    public function init(){
        /* Initialize action controller here */
    }
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $this->view->assign ( 'title', 'En construcion' );
    } 
    public function assecoAction(){
        // valida sessão
         if (!Zend_Auth::getInstance()->hasIdentity() )
         {
            return $this->_helper->redirector->goToRoute(
                    array('controller' => 'auth'), null, true);
         }
     }  
    public function playerAction(){
        $model_evento = new Application_Model_Evento();
        $model_red    = new Application_Model_Red();
        $dadose       = $model_evento->select(null, "id" , 4 );
        $dado_red     = $model_red->select();
        $this->view->assign("dado_red", $dado_red);
	$this->view->assign("dadoe", $dadose);
    }
    public function getsongAction(){
        //$this->_helper->layout->setLayout('administrator');
        $model = new Application_Model_Musica();
        $dados = $model->select(null, null, 1);
        /*
        foreach ($this->dados AS $key => $evento):
         $artist     = $evento['artist'];
         $songname   = $evento['title'];
         $url        = $evento['url'];
         $separator  = '|';
         echo $url.$separator.$artist.$separator.$songname;

        endforeach;
         *
         */
        $this->view->assign("dados", $dados);
    }

}
?>