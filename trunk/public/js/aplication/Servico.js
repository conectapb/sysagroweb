/* 
 * controle evento 
 * definidas todas as manipula��es de eventos
 */
jQuery(document).ready(function () {
    /* prepara dialog confirm
   ----------------------------------------------------*/
   dialogConfirma("confirmDelete", "Excluir", "Stop");

}); // fim  document ready

function List(url){
    RedirecionaPagina(base_url+url);
}