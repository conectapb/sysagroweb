<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaController
 *
 * @author Axel Alexander
 */

class GaleriaController extends Zend_Controller_Action{

    
     public function init(){
        $this->galeria = new Application_Model_DbTable_Galeria(); // DbTable
     }
     
     // region administador
     public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        // Página que a paginação irá iniciar
        $pagina = intval($this->_getParam('pagina', 1));
        $galeria = $this->galeria;
        $dados     = $galeria->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        // Seta a quantidade de registros por página
        $paginator->setItemCountPerPage(5);
        // numero de paginas que serão exibidas
        $paginator->setPageRange(7);
        // Seta a página atual
        $paginator->setCurrentPageNumber($pagina);
        // Passa o paginator para a view
        $this->view->galeria = $paginator;
    }
     public function newAction(){
	$this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
	$form = new Application_Form_Galeria();
        $this->view->form = $form;
        if ($this->getRequest()->isPost() and $form->isValid($_POST)  ) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $rotulo        = $form->getValue('rotulo');
                $legenda       = $form->getValue('legenda');
		$foto          = $form->getValue('foto');
                $foto1         = $form->getValue('foto1');
                $categoria_id  = $form->getValue('categoria_id');
                $locationFile  = $form->foto1->getFileName();
                $currentMicroTime = sha1(uniqid(rand(), true));
                $nameFile = $currentMicroTime.'.jpg';
                $fullPathNameFile =  '../public/fotos/'.$nameFile;
                $filterRename = new Zend_Filter_File_Rename(array('target' => $fullPathNameFile, 'overwrite' => true));
                $filterRename->filter($locationFile);
                $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                $imageAdapter->setDestination('../public/fotos/');
				if( $imageAdapter->receive() )
					echo 'Upload efetuado com sucesso';
				else
                echo 'Ops! Ocorreu um erro ao enviar o arquivo';
                $this->galeria->add($rotulo, $legenda, $nameFile, $categoria_id);
                   if($this->galeria)
                    {
                       $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro Gravado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } else {
                $form->populate($formData);
            }
        }
    }
     public function showAction() {
        $this->assecoAction();
	$this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
            if ($id > 0) 
			{
                $galerias = $this->galeria->find($id)->current(); 
		// or $this->Posts->fetchRow("id = $id");
                $this->view->galeria = $galerias;
            }
            else $this->view->message = 'registro não existe';
     }
     public function editarAction(){
        $this->assecoAction();
	$this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Galeria();
        $this->view->form = $form;
	if ($this->getRequest()->isPost()) 
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $id 	       = (int) $form->getValue('id');
                $rotulo        = $form->getValue('rotulo');
                $legenda       = $form->getValue('legenda');
                $categoria_id  = $form->getValue('categoria_id');
                $foto          = $form->getValue('foto');
                $foto1         = $form->getValue('foto1');
                $locationFile  = $form->foto1->getFileName();
                $currentMicroTime = sha1(uniqid(rand(), true));
                $nameFile = $currentMicroTime.'.jpg';
                $fullPathNameFile =  '../public/fotos/'.$nameFile;
                $filterRename = new Zend_Filter_File_Rename(array('target' => $fullPathNameFile, 'overwrite' => true));
                $filterRename->filter($locationFile);
                $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                $imageAdapter->setDestination('../public/fotos/');
		if( $imageAdapter->receive() )
                   echo "Upload efetuado com sucesso".$imageAdapter->getMimeType();
		else
                    echo 'Ops! Ocorreu um erro ao enviar o arquivo';
                $this->galeria->updates(
                        $id, 
                        $rotulo, 
                        $legenda,
                        $nameFile,
                        $categoria_id);
                if($this->galeria)
                    {
                       $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro alterado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                //$deejay = new Application_Model_DbTable_Deejay();
                $form->populate($this->galeria->getId($id));
            }
        }
    }
     public function excluirAction() {
        $this->assecoAction();
	$this->_helper->layout->setLayout('administrator');
        //$deejay = new Application_Model_DbTable_Deejay();
        // Recupera o id
        $id = $this->_request->getParam("id", 0);
        // Verifica se existe id
        if($id > 0)
        {
            //// Cria o where
            // Remove o registro
             $this->galeria->delete(array("id = ?" => $id));
        }
        // Redireciona
        //$this->_helper->redirector("index", NULL, NULL);
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
                    array('controller' => 'auth'), null, true);
         }
     }
     // region administador
     public function listAction(){
        $this->_helper->layout->setLayout('administrator');
        $model = new Application_Model_Galeria();
        $dados = $model->select();
	$this->view->assign("dados", $dados);
     }
     public function fotosAction(){
       $this->_helper->layout->setLayout('layout');
       try{
            // Recupera o id
            $id = $this->_getParam('id', 0);
            if ($id > 0)
            {
                $model_evento = new Application_Model_Evento();
                $model_red    = new Application_Model_Red();
                //$model_galeria = new Application_Model_Galeria();
                $dadose       = $model_evento->select(null, "id" , 4 );
                $dado_red     = $model_red->select();
                //$dados = $model_galeria->select("categoria_id = $id", "id", NULL);
                ///$dados = $model_galeria->selectjoin("g.categoria_id = $id", "g.id");
                $dados = $this->galeria->getTodos($id);
                $this->view->assign("dado_red", $dado_red);
                $this->view->assign("dadoe", $dadose);
                $this->view->assign("dados", $dados);
                $this->view->assign("titulo",$dados[0]['descricao']);
            }
        } catch (Zend_Db_Exception $exc) {

            echo $exc->getTraceAsString();
        }

        
        
     }
     
     
}
?>
