<?php
class Application_Model_DbTable_Categoria extends Zend_Db_Table_Abstract
{

    protected $_name = 'site_categoria_noticias';
    
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    
    public function getCategoriaList(){
		$select  = $this->select()->from($this->_name);
		$select->order('id');
		return $this->fetchAll($select);
    }
    public function add($descricao){
        $data = array('descricao' => $descricao);
        $this->insert($data);
   }  
    public function updates($id, $descricao){
     $data = array(
            'descricao' => $descricao);
       $this->update($data, 'id = ' . (int) $id);
    }
    public function delete($id){
     try{
       parent::delete($id);
     }catch (Exception $e){
             echo 'Opa... algum problema aconteceu.';
     }
   }
   
}
