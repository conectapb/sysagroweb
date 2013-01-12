<?php
class Application_Model_Red{

   public function select($where = null, $order = null, $limit = null){
      $dao = new Application_Model_DbTable_Red();
      $select = $dao->select()->from($dao)->order($order)->limit($limit);
      if(!is_null($where)){
         $select->where($where);
      }
      return $dao->fetchAll($select)->toArray();
   }
 
   public function find($id){
      $dao = new Application_Model_DbTable_Red();
      $arr = $dao->find($id)->toArray();
      return $arr[0];
   }
   /*
   public function insert(array $request){
      $dao = new Application_Model_DbTable_Categoria();
      $dados = array(
         'descricao' 	=> $request['descricao']);
      return $dao->insert($dados);
   }
 
   public function update(array $request){
      $dao = new Application_Model_DbTable_Categoria();
      $dados = array(
         'descricao' => $request['descricao'] );
      $where = $dao->getAdapter()->quoteInto("id = ?", $request['id']);
      $dao->update($dados, $where);
   }
 
   public function delete($id) {
      $dao = new Application_Model_DbTable_Categoria();
      $where = $dao->getAdapter()->quoteInto("id = ?", $id);
      $dao->delete($where);
   }
   */
}
?>