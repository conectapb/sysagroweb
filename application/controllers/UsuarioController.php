<?php

/**
 * @see Zend_Paginator_Adapter_DbSelect
 */


//
// testando subversion do netbeans
//
//require_once 'Zend/Paginator/Adapter/DbSelect.php';

/**
 * @see Ingot_JQuery_JqGrid_Adapter_Interface
 */
require_once 'Ingot/JQuery/JqGrid/Adapter/Interface.php';
class UsuarioController extends Zend_Controller_Action{

     public function init(){
        /* Initialize action controller here */

     //$this->view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");
     // istancia
     $this->usuario = new Application_Model_DbTable_Usuario(); // DbTable
     /* valida sessão
     if (!Zend_Auth::getInstance()->hasIdentity() ) {
        return $this->_helper->redirector->goToRoute(
                array('controller' => 'auth'), null, true);
     }
     */

    }
     public function indexAction() {
        $this->_helper->layout->setLayout('administrator');
      

        /*
        include_once APPLICATION_PATH . '/models/DbTable/Usuario.php';
        $members = new Application_Model_DbTable_Usuario();
        //$data = new Zend_Db_Table('users');
        //$members = $data->select()->from('users');
        // $select = $loan->select()->order("$sort_column $sort_order")->limit($limit, $offset);

        $grid = new Ingot_JQuery_JqGrid('bookshelf',
                new Ingot_JQuery_JqGrid_Adapter_DbTableSelect( $members->select() ) );
        $col  = new Ingot_JQuery_JqGrid_Column('id');
        $col->setLabel('User Id');
        $grid->addColumn($col);
        //$grid->addColumn(new Ingot_JQuery_JqGrid_Column('id',array('width'=>55,'sorttype'=>'int')));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('username'))->setLabel('Usuario ');
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('password'));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('salt'));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('role'));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('date_created'));
                $grid->registerPlugin(new Ingot_JQuery_JqGrid_Plugin_ToolbarFilter());
                $this->view->grid = $grid->render();
         *
         */
    }
     public function index1Action(){

        $this->_helper->layout->setLayout('administrator');
        /*
                // funciona array
                $model = new Application_Model_Usuario();
                $books3 = $model->select();
                $grid = new Ingot_JQuery_JqGrid('bookshelf',
		         new Ingot_JQuery_JqGrid_Adapter_Array($books3));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('id',array('width'=>55,'sorttype'=>'int')));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('username'));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('password'));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('salt'));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('role'));
                $grid->addColumn(new Ingot_JQuery_JqGrid_Column('date_created'));
                $this->view->grid = $grid->render();
        */
      
    } 
     // Action para fornecer os dados do grid
     public function dadosAction() {
        //$this->_helper->layout->disableLayout();
        $page   = $this->_request->getParam("page",1);
        $limit  = $this->_request->getParam("rows");
        $sidx   = $this->_request->getParam("sidx",1);
        $sord   = $this->_request->getParam("sord");

        //$tabela = new Agenda();
        $user = $this->usuario->fetchAll();
		$count = count( $user );

        if( $count >0 ) {
            $total_pages = ceil($count/$limit);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages)
            $page = $total_pages;

        $user = $this->usuario->fetchAll(null, "$sidx $sord", $limit, ($page*$limit-$limit));

        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        $i=0;
        // id	username	password	salt	role	date_created
        foreach($user as $row) {
            //$fone = "(".substr($row->fone, 0, 2).") ".substr($row->fone, 2, 4)."-".substr($row->fone, 6);
            $responce->rows[$i]['id']=$row->id;
            $responce->rows[$i]['cell']=array(
                        $row->id,
                        $row->username,
            		$row->password,
            		$row->salt,
            		$row->role,
            		$row->date_created
             );
            $i++;
        }

        $this->view->dados = $responce;
    }
     public function addAction(){
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Usuario();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $username      = $form->getValue('username');
                $password      = $form->getValue('password');
		$salt          = $form->getValue('password');
                $role          = $form->getValue('role');
                $date_created  = $form->getValue('date_created');
                $this->usuario->comandInsert(
                                      $username
                                    , $password
                                    , $salt
                                    , $role
                                    , $date_created );

                    if($this->usuario)
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
        $this->_helper->layout->setLayout('administrator');
        $form = new Application_Form_Usuario();
        $this->view->form = $form;
        if ($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
            {
                $id            = (int) $form->getValue('id');
                $username      = $form->getValue('username');
                $password      = $form->getValue('password');
		$salt          = $form->getValue('password');
                $role          = $form->getValue('role');
                $date_created  = $form->getValue('date_created');
                $this->usuario->comandUpdates(
                                            $id
                                            , $username
                                            , $password
                                            , $salt
                                            , $role
                                            , $date_created );
               if($this->usuario)
                    {
                       $this->_helper->flashMessenger->addMessage(
                               array('successo'=>'Registro alterado com sucesso'));
                       $this->_helper->redirector('sucesso');
                    }
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0)
            {
                $form->populate($this->usuario->getId($id));
            }
        }
    }
     public function excluirAction() {
       $this->_helper->layout->setLayout('administrator');
       // Recupera o id
       $id = $this->_request->getParam("id", 0);
       // Verifica se existe id
        if($id > 0) {
           // Cria o where
           // Remove o registro
           $this->usuario->comandDelete(array("id = ?" => $id));
        }
        // Redireciona
        $this->_helper->flashMessenger->addMessage(array('successo'=>'Registro excluido com sucesso'));
        $this->_helper->redirector('sucesso');
    }
     public function sucessoAction(){
        $this->_helper->layout->setLayout('administrator');
        $dados = "sucesso";
	$this->view->assign("dados", $dados);
    }

}?>