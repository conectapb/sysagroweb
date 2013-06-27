<?php
//require_once APPLICATION_PATH.'/models/Noticia.php';
//require_once APPLICATION_PATH.'/models/Artigo.php';
class IndexController extends Zend_Controller_Action
{

    
    public function indexAction(){
		
		  
          $colunas    = array('id' ,'titulo', 'foto','comentario' ,'categoria_noticia_id' );  
          

          //Noticia Principal
         
          $model     = new Application_Model_DbTable_Noticia();
          $dados     = $model->_select(null, "id" , 4 );
          $this->view->assign("dados", $dados);
          
          //$pecuaria = $pecuaria->fetchAll( array('categoria_noticia_id = 2') )->toArray();
          //$pecuaria = $pecuaria->_selectCategoria(2);
          //$pecuaria= $pecuaria->getCategoria('categoria_noticia_id = 2', 'id ASC',0, 2);           
          //$pecuaria = $pecuaria->fetchAl('categoria_noticia_id = 2','id ASC', 2, 'categoria_noticia_id', $t);


          //Pecuaria
          $pecuaria   = new Application_Model_DbTable_Noticia();         
          $pecuaria   = $pecuaria->joinCategoria('categoria_noticia_id = 5', 'id ASC' , 2 ,  $colunas);
          $this->view->assign("pecuaria", $pecuaria);

          // Agricultura
          $agricultura = new Application_Model_DbTable_Noticia();
          $agricultura = $agricultura->joinCategoria('categoria_noticia_id = 1', 'id DESC' , 2 ,  $colunas);
          $this->view->assign("agricultura", $agricultura);

          //Agronegócio
          $agronegocio = new Application_Model_DbTable_Noticia();
          $agronegocio = $agronegocio->joinCategoria('categoria_noticia_id = 4', 'id DESC' , 2 ,  $colunas);
          $this->view->assign("agronegocio", $agronegocio);

          // noticias slider - para Tecnologia
          $slider = new Application_Model_DbTable_Noticia();
          $slider = $slider->getRand(9,2);
          $this->view->assign("slider", $slider);
          
          //Economia
          $economia = new Application_Model_DbTable_Noticia();
          $economia = $economia->getRand(5,2);
          //$economia = $economia->joinCategoria('categoria_noticia_id = 5', 'id DESC' , 2 ,  $colunas);
          $this->view->assign("economia", $economia);

          
          // Mais lidas
          $maislidas = new Application_Model_DbTable_Maislidas();
          $maislidas = $maislidas->getRand('5');
          //$economia = $economia->joinCategoria('categoria_noticia_id = 5', 'id DESC' , 2 ,  $colunas);
          $this->view->assign("maislidas", $maislidas);

          //Artigos   
          $modelArtigos    = new Application_Model_DbTable_Artigo();
          $artigos   = $modelArtigos->_select(null, "id" , 3);  
          $this->view->assign("artigos", $artigos);

         // entevistas 
         $entrevistaModel = new Application_Model_DbTable_Entrevista(); 
         $entrevista   = $entrevistaModel->_select(null, "id" , 3);  
         $this->view->assign("entrevista", $entrevista);

       
    }

}