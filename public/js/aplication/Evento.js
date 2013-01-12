/* 
 * controle evento 
 * definidas todas as manipula��es de eventos
 */
jQuery(document).ready(function () {

    /* Time picker para start 
    ---------------------------------------------------- */
    jQuery('#start ,#end').datetimepicker({
	addSliderAccess: true,
	sliderAccessArgs: { touchonly: false }
    });
    /* Time picker para espa�ol
     ----------------------------------------------------*/
    jQuery.timepicker.setDefaults(jQuery.timepicker.regional['es']);
    
    /* Time picker para espa�ol com formato ingles
    ----------------------------------------------------*/
    DatapickerEStoUSA();
   
    /* prepara dialog confirm
    ----------------------------------------------------*/
    dialogConfirma("confirmDelete", "Excluir", "Stop");
}); // fim  document ready

function List(url){
    RedirecionaPagina(base_url+url);
}