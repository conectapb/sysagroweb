<?php

/**
 * @author Axel Alexander
 */
class Application_Model_Sobre {

   public function select($where = null, $order = null, $limit = null){
      $dao = new Application_Model_DbTable_Sobre();
      $select = $dao->select()->from($dao)->order($order)->limit($limit);
      if(!is_null($where)){
         $select->where($where);
      }
      return $dao->fetchAll($select)->toArray();
   }
 
   public function find($id){
      $dao = new Application_Model_DbTable_Sobre();
      $arr = $dao->find($id)->toArray();
      return $arr[0];
   }
}
?>