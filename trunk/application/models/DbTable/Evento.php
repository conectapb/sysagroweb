<?php
class Application_Model_DbTable_Evento extends Zend_Db_Table_Abstract {

    protected $_name = 'site_evento';

    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function add($title , $start , $end , $url, $body, $ativo ){
        $data = array(
        'title'    => $title,
        'start'    => $start,
        'end'      => $end,
        'url'	   => $url,
        'body'	   => $body,
        'ativo'    => $ativo);
        $this->insert($data);
    }

    public function update($id, $title , $start , $end , $url, $body, $ativo ){
        $data = array(
        'title'    => $title,
        'start'    => $start,
        'end'      => $end,
        'url'	   => $url,
        'body'	   => $body,
        'ativo'    => $ativo);
       parent::update($data, 'id = ' . (int) $id);
    }

    public function delete($id){
      try {
            parent::delete($id);
      }
      catch (Exception $e)
      {
         echo 'Opa... algum problema aconteceu.';
      }
   }

}
?>