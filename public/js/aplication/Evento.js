/* 
 * controle evento 
 * definidas todas as manipulações de eventos
 */
jQuery(document).ready(function () {

    /* Time picker para start 
    ---------------------------------------------------- */
    jQuery('#start ,#end').datetimepicker({
	addSliderAccess: true,
	sliderAccessArgs: { touchonly: false }
    });
    /* Time picker para español
     ----------------------------------------------------*/
    jQuery.timepicker.setDefaults(jQuery.timepicker.regional['es']);
    
    /* Time picker para español com formato ingles
    ----------------------------------------------------*/
    DatapickerEStoUSA();
   
    /* prepara dialog confirm
    ----------------------------------------------------*/
    dialogConfirma("confirmDelete", "Excluir", "Stop");
}); // fim  document ready

function List(url){
    RedirecionaPagina(base_url+url);
}