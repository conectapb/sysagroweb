<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Kadisley
 */
class Application_Model_DbTable_Usuario extends Zend_Db_Table_Abstract{
    //put your code here
    protected $_name = "users";
    protected $_primary = "id";
    
    public function getId($id){
        $id =(int) $id;
        $row = $this->fetchRow('id ='.$id);
        if(! $row){
            throw new Exception("Registro não localizado com este id:".$id); 
        }
        return $row->toArray();
    }
    public function add($username, $password, $role, $date_created){
        try {
            $sal = substr(sha1(mt_rand()),0,40);
            $dados = array(
                'username' => $username,
                'password' =>  sha1($password.$sal),
                'salt' => $sal,
                'role' => $role,
                'date_created' => $date_created
            );
            $this->insert($dados);
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            echo 'Ocorreu um erro durante a inserçao dos dados';
        }
    }
    public function updates ($id,$username, $password, $role, $date_created){
        try {
            $sal = substr(sha1(mt_rand()),0,40);
            $dados = array(
                'username' => $username,
                'password' =>  sha1($password.$sal),
                'salt' => $sal,
                'role' => $role,
                'date_created' => $date_created
            );
            $this->update($dados,'id = '.(int)$id);
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            echo 'Ocorreu um erro durante a atualização dos dados';
        }
    }
    public function delete ($id){
        try {
            parent::delete($id);
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            echo 'Ocorreu um erro ao excluir os dados';
        }
   }

}

