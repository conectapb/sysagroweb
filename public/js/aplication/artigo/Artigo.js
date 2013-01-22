/* 
 * contrele evento 
 * definidas todas as manipulações de eventos
 */
jQuery(document).ready(function () {

    
    DatapickerUS();

    jQuery("#foto1").change(function(){
        jQuery("#foto").val(jQuery(this).val() )
    });



    /* picker para data
     ----------------------------------------------------*/
    jQuery( "#data" ).datepicker().mask("9999-99-99");
    
    /* prepara dialog confirm
    ----------------------------------------------------*/
    dialogConfirma("confirmDelete", "Excluir", "Stop");


}); // fim  document ready

function List(url){
    RedirecionaPagina(base_url+url);
}

function add(url){
    RedirecionaPagina(base_url+url);
}