<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NotificationSucess
 *
 * @author Administrador
 */


class Zend_View_Helper_NotificationSucess extends Zend_View_Helper_Abstract
{
   public function notificationSucess(){
       $messages = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger')->getMessages();
       $output = '';
       if (!empty($messages)) {
            $output .= '<span class="notification n-success">';
            foreach ($messages as $message) {
                $output .= '- ' . key($message) . ' - ' . current($message) ;
                //$output .= '- ' . current($message) ;
            }
            $output .= '</span>';
        }
     return $output;
    }
}
?>