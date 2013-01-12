<?php
/**
 * Description of Photo
 *
 * @author Administrador
 */
class Agro_View_Helper_Photo extends Zend_View_Helper_Abstract
{
    protected $_html;

    public function Photo($size, $path)
    {
        switch($size)
        {
            case 'thumb':
                $this->_html = '<img src="'.$path.'" width="60" height="60">';
            break;

            case '100':
                $this->_html = '<img src="'.$path.'" width="100" height="100">';
            break;

            case 'medium':
                $this->_html = '<img src="'.$path.'" width="120" height="120">';
            break;

           case 'large':
                $this->_html = '<img src="'.$path.'" width="480" height="480">';
           break;
        }

        return $this->_html;
    }
}
?>
