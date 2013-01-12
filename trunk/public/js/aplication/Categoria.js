/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function () {

  /* prepara dialog confirm
   ----------------------------------------------------*/
   dialogConfirma("confirmDelete", "Excluir", "Stop");


}); // fim  document ready

function List(url){
    RedirecionaPagina(base_url+url);
}