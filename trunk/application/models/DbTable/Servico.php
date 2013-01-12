<?php
class Application_Model_DbTable_Servico extends Zend_Db_Table_Abstract{

    protected $_name = 'site_agenda_servico';
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    public function getServicoList(){
		$select  = $this->select()->from($this->_name);
		$select->order('id');
		return $this->fetchAll($select);
    }
    public function add($servico, $observacao){
        $data = array('nome'  => $servico,'observacao' =>  $observacao);
        $this->insert($data);
    }  
    public function updates($id, $servico, $observacao){
       $data = array('nome'  => $servico,'observacao' =>  $observacao);
       $this->update($data, 'id = ' . (int) $id);
    }
    public function delete($id){
     try{
        parent::delete($id);
     }
     catch (Exception $e){
      echo 'Opa... algum problema aconteceu.';
     }
   }
   
}
?>