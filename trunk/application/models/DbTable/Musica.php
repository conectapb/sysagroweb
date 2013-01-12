<?php

class Application_Model_DbTable_Musica extends Zend_Db_Table_Abstract
{

    protected $_name = 'songs';
    protected $_primary = 'song_id';

    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function comandInsert($username, $password, $salt, $role, $date_created){

        $sal   =   substr(SHA1(mt_rand()),0,40);
        $data = array(
        'username'      => $username,
        'password'      => sha1($password.$sal),
        'salt'          => $sal,
        'role'          => $role,
        'date_created'  => $date_created);
        $this->insert($data);
    }

    public function comandUpdates($id, $username, $password, $salt, $role, $date_created){
        $sal   =   substr(SHA1(mt_rand()),0,40);
        $data = array(
         'username'      => $username,
         'password'      => sha1($password.$sal),
         'salt'          => $sal,
         'role'          => $role,
         'date_created'  => $date_created);;
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

?>