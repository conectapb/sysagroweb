<?php
class Application_Model_DbTable_Galeria extends Zend_Db_Table_Abstract{

    protected $_name = 'galeria';
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }  
    public function getTodos($id){
    $sql = $this->select()
             ->from(array('g' => 'galeria'),array('id','rotulo','legenda','foto','categoria_id'))    
             ->join(array('c' => 'site_categoria_galeria'), 'g.categoria_id = c.id', array('c.descricao'))
             //->join('site_categoria_galeria as c', 'c.id = g.categoria_id', array('c.descricao'))
             ->setIntegrityCheck(false)
             ->where('g.categoria_id = ?', $id)
             ->order('g.categoria_id ASC');
    return $this->fetchAll($sql);
    }
    public function add($rotulo, $legenda, $foto, $categoria_id){
        $data = array('rotulo'       => $rotulo
                    , 'legenda'      => $legenda
                    , 'foto'         => $foto
                    , 'categoria_id' => $categoria_id);
        $this->insert($data);
    }  
    public function updates($id, $rotulo, $legenda, $foto, $categoria_id){
      $data = array('rotulo'       => $rotulo
                    , 'legenda'      => $legenda
                    , 'foto'         => $foto
                    , 'categoria_id' => $categoria_id);
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
?>