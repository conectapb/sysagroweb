<?php
class Application_Model_DbTable_Produtomodelo extends Zend_Db_Table_Abstract
{

    protected $_name = 'mestre_produtos_modelo';
    
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    
    public function getList(){
        $select  = $this->select()->from($this->_name);
        $select->order('id');
        return $this->fetchAll($select);
    }
    
    public function add($marca_id, $nome){
        try {
            $dados = array( 'marca_id' => $marca_id, 'nome' => $nome);
            parent::insert($dados);
        }
        catch (Exception $e){
             echo 'Opa... algum problema aconteceu.';
        }
    }  
    
    public function updates($id, $marca_id, $nome){
        try{
            $dados = array( 'marca_id' => $marca_id, 'nome' => $nome);
             $this->update($data, 'id = ' . (int) $id);
        }
        catch (Exception $e){
             echo 'Opa... algum problema aconteceu.';
        }
    }
    
    public function delete($id){
     try{
        parent::delete($id);
     }catch (Exception $e){
        echo 'Opa... algum problema aconteceu.';
     }
    }
   
}
?>