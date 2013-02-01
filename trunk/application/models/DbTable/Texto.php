<?php
class Application_Model_DbTable_Texto extends Zend_Db_Table_Abstract{

    protected $_name = 'site_texto';
    
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possível encontrar linha $id");
        }
        return $row->toArray();
    }   
    
    public function add($rotulo, $titulo, $comentario, $foto, $ativo){
    	try{
    		$data = array(
    				'rotulo'      => $rotulo,
    				'titulo'      => $titulo,
    				'comentario'  => $comentario,
    				'foto'        => $foto,
    				'ativo'       => $ativo);
    		$this->insert($data);
    
    	}
    	catch (Exception $e)
    	{
    		echo 'Opa... algum problema aconteceu.';
    	}
    }
    
    public function updates($id, $rotulo, $titulo, $comentario, $foto, $ativo){
        try
        {
            $data = array(
                        'rotulo'      => $rotulo,
                        'titulo'      => $titulo,
                        'comentario'  => $comentario,
                        'foto'        => $foto,
                        'ativo'       => $ativo);
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
    public function getTipoTexto($where =null, $order='id ASC', $offset=null, $limit=null){
        $Result = $this->fetchAll($where,$order,$limit,$offset);
            if (!$Result)
            {
                return array();
            }

            return $Result->toArray();
    }
   
}
?>