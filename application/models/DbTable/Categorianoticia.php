<?php
class Application_Model_DbTable_Categorianoticia extends Zend_Db_Table_Abstract
{

    protected $_name = 'site_categoria_noticias';
    
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Nçao foi localizado o Registro com o id = $id");
        }
        return $row->toArray();
    }
    public function getCategoriaList(){
		$select  = $this->select()->from($this->_name);
		$select->order('id');
		return $this->fetchAll($select);
    }
    public function _select($where = null, $order = null, $limit = null){
    	$select = $this->select()
    	->from($this->_name)
    	->order($order)
    	->limit($limit);
    	if(!is_null($where)){
    		$select->where($where);
    	}
    	return $this->fetchAll($select)->toArray();
    	//return $this->fetchRow($select)->toArray();
    }
    public function add($descricao){
     try{
        	$data = array('descricao' => $descricao);
        	$this->insert($data);
     }
     catch (Exception $e)
        {
        	echo 'Opa... algum problema aconteceu.';
     }
    }  
    public function updates($id, $descricao){
     try{
       	  $data = array('descricao' => $descricao);
       	  $this->update($data, 'id = ' . (int) $id);
        }catch (Exception $e){
       	 echo 'Opa... algum problema aconteceu.';
        }
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