<?php

class Application_Model_DbTable_Deejay extends Zend_Db_Table_Abstract
{

    protected $_name = 'deejay';
    protected $_primary = 'id';

    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function add($nome, $endereco, $bibliografia, $bairro, $email,$telefone, $celular, $foto){
        $data = array(
        'nome'          => $nome,
        'endereco'      => $endereco,
        'bibliografia'	=> $bibliografia,
        'bairro'	=> $bairro,
        'email'         => $email,
        'telefone'	=> $telefone,
        'celular'       => $celular,
	'foto'          => $foto);
        $this->insert($data);
    }

    public function updates($id, $nome, $endereco, $bibliografia,  $bairro, $email,$telefone, $celular,$foto){
        //htmlentities('Coraчуo');
        $data = array(
            'nome'        => $nome,
            'endereco'    => $endereco,
            'bibliografia'=> $bibliografia,
            'bairro'	  => $bairro,
            'email'       => $email,
            'telefone'    => $telefone,
            'celular'     => $celular,
            'foto'        => $foto);
       $this->update($data, 'id = ' . (int) $id);
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