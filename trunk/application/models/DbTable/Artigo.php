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
    public function add($nome, $titulo, $comentario, $noticia, $foto, $data, $fonte, $ativo, $categoria_artigos_id){
        try{
            $data = array(
                        'titulo'                => $titulo,
                        'comentario'            => $comentario,
                        'noticia'               => $noticia,
                        'foto'                  => $foto,
                        'data'                  => $data,
                        'fonte'                 => $fonte,
                        'ativo'                 => $ativo,
                        'categoria_artigos_id'  => $categoria_artigos_id);
            $this->insert($data);

        }
        catch (Exception $e)
        {
             echo 'Opa... algum problema aconteceu.';
        }        
    }  
    public function updates($id, $titulo, $comentario, $noticia, $foto, $data, $fonte, $ativo, $categoria_artigos_id){
        try
        {
            $data = array(
                        'titulo'                => $titulo,
                        'comentario'            => $comentario,
                        'noticia'               => $noticia,
                        'foto'                  => $foto,
                        'data'                  => $data,
                        'fonte'                 => $fonte,
                        'ativo'                 => $ativo,
                        'categoria_artigos_id'  => $categoria_artigos_id);
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
   

   
}
?>