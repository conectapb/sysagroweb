/* 
 * contrele evento 
 * definidas todas as manipulações de eventos
 */
jQuery(document).ready(function () {

   DatapickerUS();

    /* picker para data
     ----------------------------------------------------*/
    jQuery( "#date_created" ).datepicker().mask("9999-99-99");

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