<?php
/**
 * @author Axel Alexander
 * @access Tabela site_about
 */
class Application_Model_DbTable_Sobre extends Zend_Db_Table_Abstract
{

    protected $_name = 'site_about';
    protected $_primary = 'id';

    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function comandInsert($nome, $quemsou, $quemfaco, $filosofia, $nossamissao){
        $data = array(
        'nome'         => $nome,
        'quemsou'      => $quemsou,
        'quemfaco'     => $quemfaco,
        'filosofia'    => $filosofia,
        'nossamissao'  => $nossamissao);
        $this->insert($data);
    }

    public function comandUpdates($id, $nome, $quemsou, $quemfaco, $filosofia, $nossamissao){
        $data = array(
        'nome'         => $nome,
        'quemsou'      => $quemsou,
        'quemfaco'     => $quemfaco,
        'filosofia'    => $filosofia,
        'nossamissao'  => $nossamissao);
       $this->update($data, 'id = ' . (int) $id);
    }

    public function comandDelete($id){
      try {
            parent::delete($id);
      }
      catch (Exception $e)
      {
         echo 'Opa... algum problema aconteceu.';
      }
   }

}

