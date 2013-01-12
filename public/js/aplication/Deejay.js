/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function () {

   jQuery("#telefone").mask("(9999)-999999");
   jQuery("#celular").mask("(9999)-999-999");
   //celular py: 0973-000-000
   //fixo: 0336-270000
   //jQuery("#foto1").attr("value", jQuery("#foto").val() );
   //jQuery("#foto1").val(jQuery("#foto").val() );
   //jQuery("#foto1").val(document.tr.src );
   //onchange="document.img.src=document.blah.image.value;
   //jQuery("input:file[id*=foto1]").attr("value",jQuery("#foto").val());
   //alert( jQuery("#foto1").val());
    jQuery("#foto1").change(function()
    {
        jQuery("#foto").val(jQuery(this).val() )
        //alert( jQuery("#foto").val());
        //console.log( jQuery("#foto").val() );
        //console.log( jQuery("#foto1").val() );

    });




  /* prepara dialog confirm
   ----------------------------------------------------*/
   dialogConfirma("confirmDelete", "Excluir", "Stop");


}); // fim  document ready

function List(url){
    RedirecionaPagina(base_url+url);
}