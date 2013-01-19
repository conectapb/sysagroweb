/* 
 * contrele evento 
 * definidas todas as manipulações de eventos
 */
jQuery(document).ready(function () {

    /* picker para novo registro */
    jQuery( "#date_created" ).datepicker().mask("99/99/9999");
    

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

function add(url){
    RedirecionaPagina(base_url+url);
}