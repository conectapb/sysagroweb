<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DeejayController
 *
 * @author Administrador
 */

class TextoController extends Zend_Controller_Action{

   private $_file_texto = '../public/upload/texto/';
    
    public function init(){
	   $this->texto = new Application_Model_DbTable_Texto(); // DbTable
    }
    
    public function textoAction(){
    	try{
    		//$id = $this->_getParam('rotulo', 0);
    		$id = $this->getRequest()->getParam('rotulo');
    		if (!empty($id))
    		{
    			$dados = $this->texto->_select("rotulo = '$id' ", "id", 1);
    			//$dados = $tex->select("rotulo LIKE '%$id'", "id", 1);
    			$this->view->assign("dados", $dados);
    		}
    	} catch (Zend_Db_Exception $exc) {
    
    		echo $exc->getTraceAsString();
    	}
    }
    
    
	// region administador
    public function indexAction(){
        
        $this->assecoAction();
        
        $this->_helper->layout->setLayout('administrator');
        // Página que a paginação irá iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        $dados  = $this->texto->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por página
        $paginator->setItemCountPerPage(10);
        // numero de paginas que serão exibidas
        $paginator->setPageRange(10);
        // Seta a página atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->texto = $paginator;
    }  
    public function addAction(){
        
        $this->assecoAction();
        
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Texto();
        $this->view->form = $form;
        if ($this->getRequest()->isPost() and $form->isValid($_POST)  ) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $rotulo      = $form->getValue('rotulo');
                $titulo      = $form->getValue('titulo');
                $comentario  = $form->getValue('comentario');
                $ativo       = $form->getValue('ativo');
                $foto          = $form->getValue('foto');
                $foto1         = $form->getValue('foto1');
                $locationFile  = $form->foto1->getFileName();

                try 
                 {
                        $currentMicroTime = sha1(uniqid(rand(), true));
                        $nameFile = $currentMicroTime.'.jpg';
                        //$fullPathNameFile =  '../public/upload/texto/'.$nameFile;
                        $fullPathNameFile = $this->_file_texto.$nameFile;
                        $filterRename = new Zend_Filter_File_Rename(
                                array('target' => $fullPathNameFile, 'overwrite' => true));
                        $filterRename->filter($locationFile);
                        $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                        //$imageAdapter->setDestination('../public/upload/');
                        $imageAdapter->setDestination( $this->_file_texto );
                        if( $imageAdapter->receive() )
                            echo 'Upload efetuado com sucesso';
                        else
                        	echo 'Ops! Ocorreu um erro ao enviar o arquivo';
                 } 
                    catch (Zend_File_Transfer_Exception $e) {
                            $e->getMessage();
                }  

                $this->texto->add($rotulo, $titulo, $comentario, $nameFile, $ativo);

                   if($this->texto)
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
        $form = new Application_Form_Texto();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) 
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                //$id          = (int) $form->getValue('id');
                $foto        = $form->getValue('foto');
                $foto1       = $form->getValue('foto1');
                $locationFile= $form->foto1->getFileName();
                $fotoantigo  = $form->getElement('foto')->getValue(); //the hidden field
                // se nã mudou a foto considetra o mesmo
                if (file_exists($this->_file_texto.$fotoantigo)) 
                {
                    $form->getElement('foto')->setIgnore(true); 
                    $nomeFoto =  $fotoantigo;
				} 
                else
                { 
                    // Delete it
                    $this->removeImages($_POST['foto'], (int)$form->getValue('id') );
                    $novonomeFoto = sha1(uniqid(rand(), true));
                    $nomeFoto     = $novonomeFoto.'.jpg';
                    $caminhoFoto  = $this->_file_texto.$nomeFoto;
                    // Rename uploaded file using Zend Framework
                    $filterRename = new Zend_Filter_File_Rename(
                                    array('target' => $caminhoFoto, 'overwrite' => true));
                    $filterRename->filter($locationFile);
                    // detination file
                    $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                    $imageAdapter->setDestination( $this->_file_texto );
                        try 
                        {
                            $imageAdapter->receive();
                        } 
                        catch (Zend_File_Transfer_Exception $e) 
                        {
                            $e->getMessage();
                        }    
                }
                $this->texto-> updates((int) $form->getValue('id')
				                       , $form->getValue('rotulo')
				                       , $form->getValue('titulo')
				                       , $form->getValue('comentario')
				                       , $nomeFoto
				                       , $form->getValue('ativo'));
                if($this->texto)
                    {
                       $this->_helper->flashMessenger->addMessage(
                               array('successo'=>'Registro alterado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } else {
                $form->populate($formData);
            }
        } 
        else 
        {
            $id = $this->_getParam('id', 0);
            if ($id > 0) 
            {
                 $form->populate($this->texto->getId($id));
            }
        }
    }
    public function deleteAction() {
    
    	$this->assecoAction();
    
    	$this->_helper->layout->setLayout('administrator');
    	$id = $this->_request->getParam("id", 0);
    	if($id > 0)
    	{
    		// Delete images
    		$imageName = $this->texto->getId($id);
    		$this->removeImages($imageName['foto'],$id);
    		$this->texto->delete(array("id = ?" => $id));
    	}
    
    	$this->_helper->flashMessenger->addMessage(
    	        array('successo'=>'Registro excluido com sucesso'));
    	$this->_helper->redirector('sucesso');
    }
    public function showAction() {
    	$this->assecoAction();
    	$this->_helper->layout->setLayout('administrator');
    	$id = $this->getRequest()->getParam('id');
    	if ($id > 0)
    	{
    		$dados = $this->texto->find($id)->current();
    		$this->view->texto = $dados;
    	}
    	else $this->view->message = 'registro não existe';
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
    public function removeImages($img, $id){
      if (isset($img))
      {
    		$imageName = $this->texto->getId($id);
    		//unlink("../public/upload/".$imageName['foto']);
    		unlink($this->_file_texto.$imageName['foto']);
      }
    }
    // region administador
   
   
    

}
?>
