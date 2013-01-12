<?php
class Application_Model_DbTable_Red extends Zend_Db_Table_Abstract
{

    protected $_name = 'site_redes_socias';
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    public function add($rotulo, $link){
        $data = array('rotulo' => $rotulo, 'link'=> $link);
        $this->insert($data);
    }  
    public function updates($id, $rotulo, $link){
       $data = array('rotulo' => $rotulo, 'link' => $link);
       $this->update($data, 'id = ' . (int) $id);
    }
    public function delete($id){
        try
         {
                parent::delete($id);
         }
         catch (Exception $e)
         {
             echo 'Opa... algum problema aconteceu.';
         }
   }
   
}
?>