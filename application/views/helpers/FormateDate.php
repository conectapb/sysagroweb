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
class Didi_View_Helper_FormateDate extends Zend_View_Helper_Abstract
{
    public function formateDate($date) {

        if ($date != NULL) {
            $formatedDate = new DateTime($date);
            $format = $formatedDate->format('M d, Y');

            return $format;
        } else {
            return '';
        }
    }
}
?>