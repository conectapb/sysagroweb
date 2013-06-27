<?php
/**
 * Description of DeejayController
 *
 * @author Administrador
 */
class ArtigoController extends Zend_Controller_Action{

    private $_file_artigo = '../public/upload/artigo/';
    
    public function init(){
        $this->artigo = new Application_Model_DbTable_Artigo(); // DbTable
    }
    
    // region administador
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Pсgina que a paginaчуo irс iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        $dados = $this->artigo->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por pсgina
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serуo exibidas
        $paginator->setPageRange(10);
        // Seta a pсgina atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->artigo = $paginator;
    }
    public function addAction(){
        
        $this->assecoAction();
        
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Artigo();
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
                    $fullPathNameFile =  $this->_file_artigo.$nameFile;
                    
                    $filterRename = new Zend_Filter_File_Rename(
                            array('target' => $fullPathNameFile, 'overwrite' => true));
                    $filterRename->filter($locationFile);
                    $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                    $imageAdapter->setDestination( $this->_file_artigo );
                      if( $imageAdapter->receive() )
                            echo 'Upload efetuado com sucesso';
                        else
                        echo 'Ops! Ocorreu um erro ao enviar o arquivo';
                } 
                    catch (Zend_File_Transfer_Exception $e) {
                            $e->getMessage();
                }  
                    $this->artigo->add(
                                    $form->getValue('titulo'), 
                                    $form->getValue('comentario'), 
                                    $form->getValue('noticia'), 
                                    $nameFile, 
                                    $form->getValue('data'), 
                                    $form->getValue('fonte'), 
                                    $form->getValue('ativo'));
                   
                   if($this->artigo)
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
        $form = new Application_Form_Artigo();
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
                if (file_exists($this->_file_artigo.$fotoantigo)) 
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
                    $caminhoFoto =  $this->_file_artigo.$nomeFoto;
                    // Rename uploaded file using Zend Framework
                    $filterRename = new Zend_Filter_File_Rename(
                                    array('target' => $caminhoFoto, 'overwrite' => true));
                    $filterRename->filter($locationFile);
                    // detination file
                    $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                    $imageAdapter->setDestination( $this->_file_artigo );
                    try {
                         $imageAdapter->receive();
                    } 
                    catch (Zend_File_Transfer_Exception $e) {
                            $e->getMessage();
                    }    
                }
                $this->artigo->updates(
                                    $id, 
                                    $form->getValue('titulo'), 
                                    $form->getValue('comentario'), 
                                    $form->getValue('noticia'), 
                                    $nomeFoto, 
                                    $form->getValue('data'), 
                                    $form->getValue('fonte'), 
                                    $form->getValue('ativo'));
                if($this->artigo)
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
                $form->populate($this->artigo->getId($id));
            }
        }
    }
    public function showAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
            if ($id > 0) 
            {
                $evento = $this->artigo->find($id)->current();
             	$this->view->artigo = $evento;
            }
            else $this->view->message = 'registro nуo existe';
    }
    public function deleteAction() {
       $this->assecoAction();
       $this->_helper->layout->setLayout('administrator');
       $id = $this->_request->getParam("id", 0);
       if($id > 0) 
        {
            // Delete images
            $imageName = $this->artigo->getId($id);
            $this->removeImages($imageName['foto'],$id);
            // deleta registro
            $this->artigo->delete(array("id = ?" => $id));
        }
       
        $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
    }
    public function sucessoAction(){
        $this->_helper->layout->setLayout('administrator');
        $dados = "sucesso";
        $this->view->assign("dados", $dados);
    }
    public function assecoAction(){
        // valida sessуo
         if (!Zend_Auth::getInstance()->hasIdentity() )
         {
            return $this->_helper->redirector->goToRoute(
                    array('controller' => 'Autenticacao'), null, true);
         }
    }
    // region administador

    public function removeImages($img, $id){

        if (isset($img)) 
        {
            $imageName = $this->artigo->getId($id);
            //unlink("../public/upload/".$imageName['foto']);
            unlink($this->_file_artigo .$imageName['foto']);
            
            
        }   
    }
    public function readAction(){
      $id = $this->_getParam('id', 0);
       try{
              $dados = new Application_Model_DbTable_Artigo();
              //$where = 'id = '.$id;
              //$dados = $dados->getCategoria('id = '.$id, 'id DESC' , 0, 1 );
              $dados = $dados->_selectById($id);
              $this->view->assign("dados", $dados);
              
              // insere noticias mais lidas
              //$mais = new Application_Model_DbTable_Maislidas();
              //$mais = $mais->add($id, $dados[0]['titulo']);
              
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

}?>