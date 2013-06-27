<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaPoste
 *
 * @author Kadisley
 */
class Application_Model_DbTable_Categoriapost extends Zend_Db_Table_Abstract {
    
    protected $_name = 'site_categoria_post';  
    
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Registro não localizado com este id:".$id);
        }
        return $row->toArray();
    }
    public function add($descricao){
        try {
            $dados = array('descricao' => $descricao);
            $this->insert($dados);
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            echo 'Ocorreu um erro durante a inserçao dos dados.';
        }
   }  
    public function updates($id, $descricao){
        try {
            $dados = array('descricao' => $descricao);
            $this->update($dados, 'id = ' . (int) $id);
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            echo 'Ocorreu um erro durante a atualização dos dados.';
        }
    }
    public function delete($id){
        try{
            parent::delete($id);
        }catch (Exception $e){
            echo 'Ocorreu um erro ao excluir os dados.';
        }
   }
}

?>
