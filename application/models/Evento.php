<?php


class Application_Model_Evento {

   public function select($where = null, $order = null, $limit = null){
      $dao = new Application_Model_DbTable_Evento();
      $select = $dao->select()->from($dao)->order($order)->limit($limit);
      if(!is_null($where)){
         $select->where($where);
      }
      return $dao->fetchAll($select)->toArray();
   }
   public function find($id){
      $dao = new Application_Model_DbTable_Evento();
      $arr = $dao->find($id)->toArray();
      return $arr[0];
   }
  
   /*
   public function insert(array $request){
      $dao = new Application_Model_DbTable_Evento();
      $dados = array(
        'title'    => $request['title'],
        'start'    => $request['start'],
        'end'      => $request['end'] ,
        'url'	   => $request['url'] ,
        'body'	   => $request['body'],
        'ativo'    => $request['ativo'] );
      return $dao->insert($dados);
   }
 
   public function update(array $request){
      $dao = new Application_Model_DbTable_Evento();
      $dados = array(
        'title'    => $request['title'],
        'start'    => $request['start'],
        'end'      => $request['end'] ,
        'url'	   => $request['url'] ,
        'body'	   => $request['body'],
        'ativo'    => $request['ativo'] );
      $where = $dao->getAdapter()->quoteInto("id = ?", $request['id']);
      $dao->update($dados, $where);
   }
 
   public function delete($id) {
      $dao = new Application_Model_DbTable_Evento();
      $where = $dao->getAdapter()->quoteInto("id = ?", $id);
      $dao->delete($where);
   }
    * 
    */
}
?>
