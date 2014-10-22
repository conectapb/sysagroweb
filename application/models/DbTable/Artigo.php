<?php
class Application_Model_DbTable_Artigo extends Zend_Db_Table_Abstract{

    protected $_name = 'site_artigos';
    
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }   
    
    public function add($titulo, $comentario, $noticia, $foto, $data, $fonte, $ativo){
        try{
            $data = array(
                        'titulo'                => $titulo,
                        'comentario'            => $comentario,
                        'noticia'               => $noticia,
                        'foto'                  => $foto,
                        'data'                  => $data,
                        'fonte'                 => $fonte,
                        'ativo'                 => $ativo);
            $this->insert($data);

        }
        catch (Exception $e)
        {
             echo 'Opa... algum problema aconteceu.';
        }        
    }  
    
    public function updates($id, $titulo, $comentario, $noticia, $foto, $data, $fonte, $ativo){
        try
        {
            $data = array(
                        'titulo'                => $titulo,
                        'comentario'            => $comentario,
                        'noticia'               => $noticia,
                        'foto'                  => $foto,
                        'data'                  => $data,
                        'fonte'                 => $fonte,
                        'ativo'                 => $ativo);
           $this->update($data, 'id = ' . (int) $id);
        }
        catch (Exception $e)
        {
             echo 'Opa... algum problema aconteceu.';
        }   
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

    public function _selectById($id){
        $select = $this->select()
                       ->from($this->_name)
                       ->where('id = ?', $id)
                       ->order('id');
                       //->limit("0 , 1");
         return $this->fetchAll($select)->toArray();        
    }

    public function getCategoria($where =null, $order='id ASC', $offset=null, $limit=null){
        $Result = $this->fetchAll($where,$order,$limit,$offset);
            if (!$Result)
            {
                return array();
            }

            return $Result->toArray();
    }

}
