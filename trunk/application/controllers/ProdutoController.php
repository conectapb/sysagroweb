<?php
/**
 * Description of DeejayController
 *
 * @author Administrador
 */
class ProdutoController extends Zend_Controller_Action{

    private $_file_foto = '../public/upload/produto/';
    
    public function init(){
        $this->produto = new Application_Model_DbTable_Produto(); // DbTable
    }
    
    // region administador
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Página que a paginação irá iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        $dados = $this->produto->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por página
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serão exibidas
        $paginator->setPageRange(10);
        // Seta a página atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->produto = $paginator;
    }
    
    public function addAction(){
        
        $this->assecoAction();
        
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Produto();
        $this->view->form = $form;
        if ($this->getRequest()->isPost() and $form->isValid($_POST)  ) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
               $foto          = $form->getValue('foto');
               $foto1         = $form->getValue('foto_images');
               $locationFile  = $form->foto_images->getFileName();
               try 
                {
                    $currentMicroTime = sha1(uniqid(rand(), true));
                    $nameFile = $currentMicroTime.'.jpg';
                    $fullPathNameFile =  $this->_file_foto.$nameFile;
                    
                    $filterRename = new Zend_Filter_File_Rename(
                            array('target' => $fullPathNameFile, 'overwrite' => true));
                    $filterRename->filter($locationFile);
                    $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                    $imageAdapter->setDestination( $this->_file_foto );
                      if( $imageAdapter->receive() )
                            echo 'Upload efetuado com sucesso';
                        else
                        echo 'Ops! Ocorreu um erro ao enviar o arquivo';
                } 
                    catch (Zend_File_Transfer_Exception $e) {
                            $e->getMessage();
                } 
                    $this->produto->add(
                                    $form->getValue('grupo_id'), 
                                    $form->getValue('marca_id'), 
                                    $form->getValue('modelo_id'), 
                                    $form->getValue('unidade_id'), 
                                    $form->getValue('codBarras'), 
                                    $form->getValue('nome'), 
                                    $form->getValue('refFabricante'),
                                    $form->getValue('refAuxiliar'), 
                                    $form->getValue('icmsc'), 
                                    $form->getValue('icmsv'), 
                                    $form->getValue('ipiVenda'), 
                                    $form->getValue('cst'), 
                                    $form->getValue('margenLucro'), 
                                    $form->getValue('precoCusto'),
                                    $form->getValue('precoVenda'),
                                    $form->getValue('margenDesconto'),
                                    $form->getValue('tipi'), 
                                    $form->getValue('ncm'), 
                                    $form->getValue('genero_id'), 
                                    $form->getValue('cor_id'),
                                    $nameFile);
                    if($this->produto)
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
        $form = new Application_Form_Produto();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) 
        {
            $formData = $this->getRequest()->getPost();
            
            if ($form->isValid($formData) )
            {
                $id            = (int) $form->getValue('id');
                $foto          = $form->getValue('foto');
                $foto1         = $form->getValue('foto_images');
                $locationFile  = $form->foto_images->getFileName();
                //the hidden field
                $fotoantigo    = $form->getElement('foto')->getValue(); 
                
                if (file_exists($this->_file_foto.$fotoantigo)) 
                {
                    $form->getElement('foto')->setIgnore(true); 
                    $nameFile =  $fotoantigo;

                } 
                else
                { 
                  try{
                        $this->removeImages($_POST['foto'],$id);                   
                        $currentMicroTime = sha1(uniqid(rand(), true));
                        $nameFile = $currentMicroTime.'.jpg';
                        $fullPathNameFile =  $this->_file_foto.$nameFile;
                        $filterRename = new Zend_Filter_File_Rename(
                            array('target'    => $fullPathNameFile, 
                                  'overwrite' => true));
                        $filterRename->filter($locationFile);
                        $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                        $imageAdapter->setDestination( $this->_file_foto );
                        if( $imageAdapter->receive() )
                            echo 'Upload efetuado com sucesso';
                        else
                            echo 'Ops! Ocorreu um erro ao enviar o arquivo';
                    } 
                    catch (Zend_File_Transfer_Exception $e) {
                            $e->getMessage();
                    }
                }
                $this->produto->updates(
                                    $id, 
                                    $form->getValue('grupo_id'), 
                                    $form->getValue('marca_id'), 
                                    $form->getValue('modelo_id'), 
                                    $form->getValue('unidade_id'), 
                                    $form->getValue('codBarras'), 
                                    $form->getValue('nome'), 
                                    $form->getValue('refFabricante'),
                                    $form->getValue('refAuxiliar'), 
                                    $form->getValue('icmsc'), 
                                    $form->getValue('icmsv'), 
                                    $form->getValue('ipiVenda'), 
                                    $form->getValue('cst'), 
                                    $form->getValue('margenLucro'), 
                                    $form->getValue('precoCusto'),
                                    $form->getValue('precoVenda'),
                                    $form->getValue('margenDesconto'),
                                    $form->getValue('tipi'), 
                                    $form->getValue('ncm'), 
                                    $form->getValue('genero_id'), 
                                    $form->getValue('cor_id'),
                                    $nameFile);
                    if($this->produto)
                    {
                       $this->_helper->flashMessenger->addMessage(
                                array('successo'=>'Registro alterado com sucesso'));
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
                $form->populate($this->produto->getId($id));
            }
        }
    }
    
    public function barcodeAction() { 
       $this->_helper->layout->disableLayout(); 
       $this->_helper->viewRenderer->setNoRender(); 
       $barcodeOptions = array('text' => '28810105487');
       $rendererOptions = array('topOffset' => 50); 
       $rendererOptions = array('imageType' => 'gif'); 
       Zend_Barcode::render('code39', 'image', $barcodeOptions, $rendererOptions); 
    } 

    public function showAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
            if ($id > 0) 
            {
                $evento = $this->produto->find($id)->current();

                
                // referência cor
                $ref_Cor = $evento->findDependentRowset('Application_Model_DbTable_Cor');
                $this->view->assign("cor", $ref_Cor);

                // referência Produtos Industrializados
                $ref_tipi = $evento->findDependentRowset('Application_Model_DbTable_Produtotipi');
                $this->view->assign("tipi", $ref_tipi);
             	
                // referência Nomenclatura Comum do Mercosul
                $ref_ncm = $evento->findDependentRowset('Application_Model_DbTable_Produtoncm');
                $this->view->assign("ncm", $ref_ncm);

                


                $this->view->produto = $evento;
            }
            else 
             {  
                $this->view->message = 'registro não existe';
            }

    }
    
    public function deleteAction() {
       $this->assecoAction();
       $this->_helper->layout->setLayout('administrator');
       $id = $this->_request->getParam("id", 0);
       if($id > 0) 
        {
            // Delete images
            $imageName = $this->produto->getId($id);
            $this->removeImages($imageName['foto'],$id);
            // deleta registro
            $this->produto->delete(array("id = ?" => $id));
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
        // valida sessão
         if (!Zend_Auth::getInstance()->hasIdentity() )
         {
            return $this->_helper->redirector->goToRoute(
                    array('controller' => 'Autenticacao'), null, true);
         }
    }
    // region administador

    public function menuAction(){
        $this->assecoAction();      
        $this->_helper->layout->setLayout('administrator');
        $dados = "Menu Produto";
        $this->view->assign("dados", $dados);
    } 

    public function removeImages($img, $id){

        if (isset($img)) 
        {
            $imageName = $this->produto->getId($id);
            unlink($this->_file_foto .$imageName['foto']);
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

}