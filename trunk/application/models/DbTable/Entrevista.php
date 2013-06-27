<?php

class Application_Model_DbTable_Entrevista extends Zend_Db_Table_Abstract
{

    protected $_name 	= 'site_entrevista';
    
    protected $_primary = 'id';

	
	
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Não foi localizado o Registro com o id = $id");
        }
        return $row->toArray();
    }


    //id  titulo  comentario  entrevista foto  data  entrevistado reporter ativo 
    public function add($titulo, $comentario, $entrevista, $foto, $data, $entrevistado, $reporter, $ativo){
  	  try 
      {
          $dados = array(
          'titulo'      => $titulo,
          'comentario'  => $comentario,
          'entrevista'  => $entrevista,
          'foto'        => $foto,
          'data'        => $data,
          'entrevistado'=> $entrevistado,
          'reporter'    => $reporter,
  		    'ativo'  	    => $ativo);
  	    parent::insert($dados);
      }
      catch (Exception $e)
      {
         echo 'Opa... algum problema aconteceu.';
      }
    }

    public function updates($id, $titulo, $comentario, $entrevista, $foto, $data, $entrevistado, $reporter, $ativo){
       try 
        {
          $dados = array(
          'titulo'      => $titulo,
          'comentario'  => $comentario,
          'entrevista'  => $entrevista,
          'foto'        => $foto,
          'data'        => $data,
          'entrevistado'=> $entrevistado,
          'reporter'    => $reporter,
          'ativo'       => $ativo);
  	      

          parent::update($dados, 'id = ' . (int) $id);
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

    public function getRand($catID , $limit){
        $select = $this->select()
        //->from($table, array('site_noticias')
        ->where('id = ?', $catID)
        ->order('RAND()')
        //->limit("0 , 4");
        ->limit($limit);
        //echo $select; exit;
        return $this->fetchAll($select)->toArray();
    }


}

?>