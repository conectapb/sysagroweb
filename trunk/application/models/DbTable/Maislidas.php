<?php
class Application_Model_DbTable_Maislidas extends Zend_Db_Table_Abstract
{

    protected $_name 	= 'site_noticia_mais_lida';

    protected $_primary = 'id';

    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possível encontrar linha $id");
        }
        return $row->toArray();
    }
	public function add($noticia_id, $titulo){
        try{
            $data = array(
                        'noticia_id'      => $noticia_id,
                        'titulo'          => $titulo);
            $this->insert($data);

        }
        catch (Exception $e)
        {
             echo 'Opa... algum problema aconteceu.';
        }        
    } 
    public function getRand($limit){
        $select = $this->select()
        //->from($table, array('site_noticias')
        //->where('categoria_noticia_id = ?', $catID)
        ->order('RAND()')
        //->limit("0 , 4");
        ->limit($limit);
        //echo $select; exit;
        return $this->fetchAll($select)->toArray();
    } 

}

