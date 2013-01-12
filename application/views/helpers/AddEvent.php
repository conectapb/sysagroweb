<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Img
 *
 * @author Administrador
 */
class Didi_View_Helper_AddEvent extends Zend_View_Helper_Abstract
{
    
    //Inseri eventos
     public function AddEvent($d="", $m="", $Y="", $description="", $link="", $target=""){
          $_SESSION['EVENTS'][$Y][$m][$d] = $description;
	  $_SESSION['LINKS'][$Y][$m][$d]	=	$link;
	  $_SESSION['TARGET'][$Y][$m][$d]	=	$target;
     }
}
?>