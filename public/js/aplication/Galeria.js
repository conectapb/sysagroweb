/* 
 * contrele evento 
 * definidas todas as manipulações de eventos
 */
jQuery(document).ready(function () {

    /* picker para novo registro */
    //jQuery( "#data" ).datepicker().mask("9999-99-99");
    //jQuery( "#data_evento" ).datepicker().mask("9999-99-99");

    /*
    jQuery("#logar").button({
     icons: {
             primary: 'ui-icon-arrowreturn-1-w'
     }
        }).click(function() {
        //alert("Clicked");
        window.location.href = base_url+"Evento/list/";
    });*/

   /* prepara dialog confirm
   ----------------------------------------------------*/
   dialogConfirma("confirmDelete", "Excluir", "Stop");


}); // fim  document ready

function List(url){
    RedirecionaPagina(base_url+url);
}