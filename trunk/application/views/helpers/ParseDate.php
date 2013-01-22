<?php


     
class Zend_View_Helper_ParseDate extends Zend_View_Helper_Abstract {
 
    public $strData, $data='';
 
    public function parseDate($data ='',$formato='') {
        if ($data=='') {
            $this->data = new Zend_Date();    
        } 
        else 
        {
            $this->data = new Zend_Date(strtotime($data));
        }
        switch($formato) 
        {
            default:
                $this->strData=$this->data->toString($formato);
            break;
            case 'fullt':
                $this->strData=$this->data->toString("EEEE, dd 'de' MMMM 'de' YYYY '".utf8_encode('às')."' HH:mm");
            break; 
            case 'full': //SEMANA, DIA, MÊS ANO
                $this->strData=$this->data->toString("EEEE, dd 'de' MMMM 'de' YYYY");
            break; 
        }
        //return utf8_decode($this->strData);
        return $this->strData;
    }
 
}

?>