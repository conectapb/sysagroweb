<?php

class Application_Model_DbTable_Noticia extends Zend_Db_Table_Abstract
{

    protected $_name 	= 'site_noticias';
    protected $_primary = 'id';

	
	
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function add($titulo,$comentario,$noticia,$foto,$data,$fonte,$ativo,$categoria_noticia_id){
  	  try 
      {
          $data = array(
          'titulo'      => $titulo,
          'comentario'  => $comentario,
          'noticia'     => $noticia,
          'foto'        => $foto,
          'fonte'  	    => $fonte,
  		   'ativo'  	    => $ativo, 
  		   'categoria_noticia_id' => $categoria_noticia_id);
  	    parent::insert($data);
      }
      catch (Exception $e)
      {
         echo 'Opa... algum problema aconteceu.';
      }
    }

    public function updates($id, $titulo, $comentario, $noticia, $foto, $data,$fonte,$ativo, $categoria_noticia_id){
       try 
        {
          $data = array(
          'titulo'      => $titulo,
          'comentario'  => $comentario,
          'noticia'     => $noticia,
          'foto'        => $foto,
          'fonte'  	    => $fonte,
  		    'ativo'  	    => $ativo, 
  		    'categoria_noticia_id' => $categoria_noticia_id);
  	      parent::update($data, 'id = ' . (int) $id);
        }
        catch (Exception $e)
        {
           echo 'Opa... algum problema aconteceu.';
        }   
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


    public function _selectCategoria($catid){
        $select = $this->select()
                       ->where('categoria_noticia_id = ?', $catid)
                       ->order('id')
                       ->limit("0 , 1");
         return $this->fetchRow($select)->toArray();        
    } 
    public function getCategoria($where =null, $order='id ASC', $offset=null, $limit=null){
        $Result = $this->fetchAll($where,$order,$limit,$offset);
            if (!$Result)
            {
                return array();
            }

            return $Result->toArray();
    }

    public function joinCategoria($where = 1, $order = null, $limit = null, array $fields = null){
      $db     = Zend_Registry::get('db');
      $where  = (null == $where) ? 1 : $where;
      $fields = (!isset($fields)) ? '*' : $fields;
      $select = $db->select()
                       ->from("site_noticias", $fields)
                       ->where($where)
                       ->order($order)
                       ->join('site_categoria_noticias', 'site_noticias.categoria_noticia_id = site_categoria_noticias.id', array('id as catID', 'descricao'))
                      ->limit($limit, $offset);
      //echo $select; exit;
      $result = $db->fetchAll($select);
      return $result; 
    }

    public function groupCategoria($where = 1, $order = null, $limit = null, $group = null, array $fields = null){
   
      $db = Zend_Registry::get('db');
      $where = (null == $where) ? 1 : $where;
      $fields = (!isset($fields)) ? '*' : $fields;
      $select = $db->select()
                       ->from("site_noticias", $fields)
                       ->where($where)
                       ->order($order)
                       //->join('site_categoria_noticias', 'site_noticias.categoria_noticia_id = site_categoria_noticias.id', array('id as codigo', 'descricao'))
                       ->group($group)
                       ->limit($limit, $offset);
      echo $select; exit;
      $result = $db->fetchAll($select);
      return $result;
    }

    public function getRand($catID , $limit){
        $select = $this->select()
        //->from($table, array('site_noticias')
        ->where('categoria_noticia_id = ?', $catID)
        ->order('RAND()')
        //->limit("0 , 4");
        ->limit($limit);
        //echo $select; exit;
        return $this->fetchAll($select)->toArray();
    }


}

?>