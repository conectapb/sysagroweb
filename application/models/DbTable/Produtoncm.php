<?php
class Application_Model_DbTable_Produtoncm extends Zend_Db_Table_Abstract
{

    protected $_name = 'mestre_produtos_ncm';

    protected $_referenceMap = array(
                           'Produto' => array(
                                    'columns'=> array('id'),
                                    'refTableClass'=> 'Application_Model_DbTable_Produto',
                                    'refColumns'=> array('ncm')
                                   )       
    );
    
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
    
    public function add($numero, $descricao){
        try {
            $dados = array( 'numero ' => $numero , 'descricao' => $descricao);
            parent::insert($dados);
        }
        catch (Exception $e){
             echo 'Opa... algum problema aconteceu.';
        }
    }  
    
    public function updates($id, $numero, $descricao){
        try{
            $dados = array( 'numero ' => $numero    , 'descricao' => $descricao);
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