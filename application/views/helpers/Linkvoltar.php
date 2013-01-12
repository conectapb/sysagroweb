<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LinkVoltar
 *
 * @author Administrador
 */

require_once 'Zend/Controller/Action/Helper/Abstract.php';
require_once 'Zend/Controller/Action/HelperBroker.php';
require_once 'Zend/Session/Namespace.php';
class Agro_View_Helper_linkvoltar extends Zend_Controller_Action_Helper_Abstract
{
    

    /*
   * @todo Gera uma tag HTML <a href> com javascript:history.go(-1)
   * @param string   $class nome da classe
   * @param integer  $title legenda do link
   * @param string   $nomelink nome do link
   * @return string o elemento gerado
   */
   public function linkvoltar($title, $class, $nomelink){
       $str = "";
       $str .='<a href="javascript:history.go(-1)" title="'
      .$title.'" class="'
      .$class.'">'
      .$nomelink .'</a>';
      return $str;
  }
}
?>