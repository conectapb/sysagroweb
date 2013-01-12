<?php
/**
 * Description of DeejayController
 *
 * @author Administrador
 */
class SobreController extends Zend_Controller_Action{


    public function init(){
      $this->sobre = new Application_Model_DbTable_Sobre(); // DbTable
    }
    // region administador
    public function indexAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
    }
    public function dadosAction() {
        //$this->_helper->layout->disableLayout();
        $page   = $this->_request->getParam("page",1);
        $limit  = $this->_request->getParam("rows");
        $sidx   = $this->_request->getParam("sidx",1);
        $sord   = $this->_request->getParam("sord");

        //$tabela = new Agenda();
        $user = $this->sobre->fetchAll();
		$count = count( $user );

        if( $count >0 ) {
            $total_pages = ceil($count/$limit);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages)
            $page = $total_pages;

        $user = $this->sobre->fetchAll(null, "$sidx $sord", $limit, ($page*$limit-$limit));

        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        $i=0;

        foreach($user as $row) {
            $responce->rows[$i]['id']=$row->id;
            $responce->rows[$i]['cell']=array(
                        $row->id,
                        $row->nome,
            		$row->quemsou,
            		$row->quemfaco,
            		$row->filosofia,
            		$row->nossamissao
             );
            $i++;
        }

        $this->view->dados = $responce;
    }
    public function newAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Sobre();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $nome        = $form->getValue('nome');
                $quemsou     = $form->getValue('quemsou');
		$quemfaco    = $form->getValue('quemfaco');
                $filosofia   = $form->getValue('filosofia');
                $nossamissao = $form->getValue('nossamissao');
              
                $this->sobre->comandInsert(
                                    $nome
                                    ,$quemsou
                                    ,$quemfaco
                                    ,$filosofia
                                    ,$nossamissao );

                    if($this->sobre)
                    {
                       $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro Gravado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } else {
                $form->populate($formData);
            }
        }
    }
    public function editarAction(){
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Sobre();
        $this->view->form = $form;
        if ($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
               $id           = (int) $form->getValue('id');
                $nome        = $form->getValue('nome');
                $quemsou     = $form->getValue('quemsou');
		$quemfaco    = $form->getValue('quemfaco');
                $filosofia   = $form->getValue('filosofia');
                $nossamissao = $form->getValue('nossamissao');
                $this->sobre->comandUpdates($id
                                    ,$nome
                                    ,$quemsou
                                    ,$quemfaco
                                    ,$filosofia
                                    ,$nossamissao);
              if($this->sobre)
              {
                $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro alterado com sucesso'));
                 $this->_helper->redirector('sucesso');
              }
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) 
            {
                $form->populate($this->sobre->getId($id));
            }
        }
    }
    public function excluirAction() {
       $this->assecoAction();
       $this->_helper->layout->setLayout('administrator');
       // Recupera o id
       $id = $this->_request->getParam("id", 0);
       // Verifica se existe id
        if($id > 0) {
           // Cria o where
           // Remove o registro
           $this->sobre->comandDelete(array("id = ?" => $id));
        }
        // Redireciona
        $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
    }
    public function showAction() {
        $this->assecoAction();
        $this->_helper->layout->setLayout('administrator');
        $id = $this->getRequest()->getParam('id');
            if ($id > 0) {
                $sobre = $this->sobre->find($id)->current();
                $this->view->sobre = $sobre;
            }
            else $this->view->message = 'No se a localizado um registro o no existe';
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
    public function sobreAction(){
        $this->_helper->layout->setLayout('layout');
        $model = new Application_Model_Sobre();
        $model_evento = new Application_Model_Evento();
        $model_red    = new Application_Model_Red();
        $dadose       = $model_evento->select(null, "id" , 4 );
        $dado_red     = $model_red->select();
        $dados         = $model->select();
        $this->view->assign("dado_red", $dado_red);
	   $this->view->assign("dadoe", $dadose);
        $this->view->assign("dados", $dados);
     }

}
?>