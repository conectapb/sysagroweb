<?php
require_once 'Zend/Controller/Action/Helper/Abstract.php';
require_once 'Zend/Controller/Action/HelperBroker.php';
require_once 'Zend/Session/Namespace.php';
/**
 * Description of OutputLink
 *
 * @author Administrador
 */
      
class Didi_View_Helper_OutputLink extends Zend_Controller_Action_Helper_Abstract
{
    public function outputLink($anchor, $description)
    {
        return '<a href="' . $anchor . '">' . $description . '</a>';
    }
}
?>
