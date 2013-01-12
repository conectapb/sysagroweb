<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Combobox
 *
 * @author user
 */
class Zend_View_Helper_Combobox extends Zend_View_Helper_Abstract{ 
    
 /**
 *
 * @Todo Gera uma tag HTML <select>
 * @access public
 * @param  string  $id id do atributo
 * @param  string  $name name do atributo
 * @param  string  $default valor default
 * @param  string  $class name da class - css
 * @param  string  $data option value do atributo
 * @return string elemento gerado <select></select>
 */
public function combobox($name, $id, $default, $class, $data = array()){
      $show_Combo_Box = '';
      $show_Combo_Box .='<select name="'.$name.'" id="'.$id.'"';
      $show_Combo_Box .='title ="Selecione" ';
      $show_Combo_Box .='class ="'.$class.'" >';
      $show_Combo_Box .='<option value="0">Selecione</option>';
      foreach ($data as $item):
            $show_Combo_Box.= '<option '.( $item[0]  == $default?" selected ":"").' value="'.$item[0].'">'.$item[1].'</option>';
       endforeach ;
      $show_Combo_Box .= ""."</select>";
    echo $show_Combo_Box;

} 
    
    
}

?>
