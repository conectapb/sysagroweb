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
class Agro_View_Helper_img extends Zend_View_Helper_Abstract
{
    public function img($caminho ,$width, $height, $alt)
	{	
		if (empty($alt))
	    {            
        throw new Zend_View_Exception('Alt attributo!!');
        }    
	    $img = '<img name="tr" id="tr" src="' . $caminho  . '" height="' . $height . '" alt="' . $alt . '" width="' . $width . '">';
        return $img;
   }
}
?>