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
class Didi_View_Helper_Img extends Zend_View_Helper_Abstract
{
    public function img($basepath ,$width, $height, $alt){	
       if (empty($alt))
	   {            
            throw new Zend_View_Exception('Alt attributo!!');
        }
        //$basepath = $this->view->serverUrl() .'/images/' ;
	$img = '<img name="tr" id="tr" src="' . $basepath  . '" height="' . $height . '" alt="' . $alt . '" width="' . $width . '">';
        return $img;
   }
}
?>