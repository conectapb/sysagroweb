<?php
//require_once APPLICATION_PATH.'/models/Noticia.php';
//require_once APPLICATION_PATH.'/models/Artigo.php';
class EntrevistaController extends Zend_Controller_Action
{

    private $_file_moticia = '../public/upload/entrevista/';

    public function init(){
    	
      $this->entrevista = new Application_Model_DbTable_Entrevista(); // DbTable
    }


    // region administador - form
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Página que a paginação irá iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        //$dados = new Application_Model_DbTable_Categoria();
        $dados = $this->entrevista->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por página
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serão exibidas
        $paginator->setPageRange(10);
        // Seta a página atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->entrevista = $paginator;
    }
  
    public function addAction(){
        
        $this->assecoAction();
        
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Entrevista();
        $this->view->form = $form;
        if ($this->getRequest()->isPost() and $form->isValid($_POST)  ) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
               $foto          = $form->getValue('foto');
               $foto1         = $form->getValue('foto1');
               $locationFile  = $form->foto1->getFileName();
               try 
                {
                    $currentMicroTime = sha1(uniqid(rand(), true));
                    $nameFile = $currentMicroTime.'.jpg';
                    $fullPathNameFile =  $this->_file_moticia.$nameFile;
                    
                    $filterRename = new Zend_Filter_File_Rename(
                            array('target' => $fullPathNameFile, 'overwrite' => true));
                    $filterRename->filter($locationFile);
                    $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                    $imageAdapter->setDestination( $this->_file_moticia );
                      if( $imageAdapter->receive() )
                            echo 'Upload efetuado com sucesso';
                        else
                        echo 'Ops! Ocorreu um erro ao enviar o arquivo';
                } 
                    catch (Zend_File_Transfer_Exception $e) {
                            $e->getMessage();
                }  
                    $this->entrevista->add(
                                    $form->getValue('titulo'), 
                                    $form->getValue('comentario'), 
                                    $form->getValue('entrevista'), 
                                    $nameFile, 
                                    $form->getValue('data'), 
                                    $form->getValue('entrevistado'), 
                                    $form->getValue('reporter'),
                                    $form->getValue('ativo') );
                   if($this->entrevista)
                    {
                       $this->_helper->flashMessenger->addMessage(
                               array('successo'=>'Registro Gravado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editAction(){
        
        $this->assecoAction();
        
        $this->_helper->layout->setLayout('administrator');
         $form = new Application_Form_Entrevista();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) 
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $id            = (int) $form->getValue('id');
                $foto          = $form->getValue('foto');
                $foto1         = $form->getValue('foto1');
                $locationFile  = $form->foto1->getFileName();
                $fotoantigo    = $form->getElement('foto')->getValue(); //the hidden field
                
                //if (file_exists('../public/upload/artigo/'.$fotoantigo))
                if (file_exists($this->_file_moticia.$fotoantigo)) 
                {
                    $form->getElement('foto')->setIgnore(true); 
                    $nomeFoto =  $fotoantigo;

                } 
                else
                { 
                    // Delete it
                    $this->removeImages($_POST['foto'],$id);
                    
                    $novonomeFoto = sha1(uniqid(rand(), true));
                    $nomeFoto = $novonomeFoto.'.jpg';
                    //$caminhoFoto =  '../public/upload/'.$nomeFoto;
                    $caminhoFoto =  $this->_file_moticia.$nomeFoto;
                    // Rename uploaded file using Zend Framework
                    $filterRename = new Zend_Filter_File_Rename(
                                    array('target' => $caminhoFoto, 'overwrite' => true));
                    $filterRename->filter($locationFile);
                    // detination file
                    $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                    $imageAdapter->setDestination( $this->_file_moticia );
                    try {
                         $imageAdapter->receive();
                    } 
                    catch (Zend_File_Transfer_Exception $e) {
                            $e->getMessage();
                    }    
                }
                $this->entrevista->updates(
                                    $id,
                                    $form->getValue('titulo'), 
                                    $form->getValue('comentario'), 
                                    $form->getValue('entrevista'), 
                                    $nomeFoto,  
                                    $form->getValue('data'), 
                                    $form->getValue('entrevistado'), 
                                    $form->getValue('reporter'),
                                    $form->getValue('ativo') );


                if($this->entrevista)
                    {
                       $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro alterado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } 
            else 
            {
                $form->populate($formData);
            }
        } 
        else 
        {
            $id = $this->_getParam('id', 0);
            if ($id > 0) 
            {
                $form->populate($this->entrevista->getId($id));
            }
        }
    }

    public function showAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
            if ($id > 0) 
            {
                $entrevistas = $this->entrevista->find($id)->current(); // or $this->Posts->fetchRow("id = $id");
                $this->view->entrevista = $entrevistas;
            }
        else $this->view->message = 'registro não existe';
    }

    public function deleteAction() {
    
        $this->assecoAction();
    
        $this->_helper->layout->setLayout('administrator');
        $id = $this->_request->getParam("id", 0);
        if($id > 0)
        {
            // Delete images
            $imageName = $this->entrevista->getId($id);
            $this->removeImages($imageName['foto'],$id);
            $this->entrevista->delete(array("id = ?" => $id));
        }
    
        $this->_helper->flashMessenger->addMessage(
                array('successo'=>'Registro excluido com sucesso'));
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


    public function removeImages($img, $id){

        if (isset($img)) 
        {
            $imageName = $this->entrevista->getId($id);
            //unlink("../public/upload/".$imageName['foto']);
            unlink($this->_file_moticia .$imageName['foto']);
            
            
        }   
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