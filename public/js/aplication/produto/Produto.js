/* 
 * contrele evento 
 * definidas todas as manipulações de eventos
 */
jQuery(document).ready(function () {

    DatapickerUS();

    jQuery("#foto_images").change(function(){
        jQuery("#foto").val(jQuery(this).val() )
    });

    jQuery( "#tabs" ).tabs();
  
    jQuery('#grupo_id').change(function() {
        ConcactProduto();      
    });
    
    jQuery('#marca_id').change(function() {
       ConcactProduto();
    });

    jQuery('#modelo_id').change(function() {   
       ConcactProduto();
    });



    /* picker para data
     ----------------------------------------------------*/
    //jQuery( "#data" ).datepicker().mask("9999-99-99");
    
    /* prepara dialog confirm
    ----------------------------------------------------*/
    dialogConfirma("confirmDelete", "Excluir", "Stop");


}); // fim  document ready


function ConcactProduto() {
    var grupo  = ((jQuery('#grupo_id').val()  != "0") ? jQuery('#grupo_id').find('option').filter(':selected').text() : "") ;
    var marca  = ((jQuery('#marca_id').val()  != "0") ? jQuery('#marca_id').find('option').filter(':selected').text() : "") ;
    var modelo = ((jQuery('#modelo_id').val() != "0") ? jQuery('#modelo_id').find('option').filter(':selected').text() : "") ;
     
    var nomeCompleto = '';  
    
    // grupo
    if(grupo != "" && marca == "" && modelo == "")
    {
        nomeCompleto =  grupo;
    }
    else if(grupo != "" && marca != "" && modelo == "")
    {
        nomeCompleto =  grupo+ ' ' + marca;
    }    
    else if(grupo != "" && marca == "" && modelo != "")
    {
        nomeCompleto =  grupo+ ' ' + modelo;
    }
    else if (grupo != "" && marca != "" && modelo != "")
    {
        nomeCompleto = grupo+ ' ' + marca + ' ' + modelo;
    }
    
    // marca
    else if (grupo == "" && marca != "" && modelo == "")
    {
        nomeCompleto = marca;
    }
    else if (grupo == "" && marca != "" && modelo != "")
    {
        nomeCompleto = marca + ' ' + modelo;
    }

    else if (grupo == "" && marca == "" && modelo != "")
    {
        nomeCompleto =  modelo;
    }

    jQuery("#nome").val(  nomeCompleto   );  
    jQuery("#nome").attr('readonly', true);
     //jQuery("#nome").attr('disabled', 'disabled');
    //jQuery("#nome").attr("disabled", true); 
}

function List(url){
    RedirecionaPagina(base_url+url);
}




function ConcactProduto1(nome1, nome2 ,nome3){
    var nomeCompleto = '';
    if (nome1 != "" && nome2 != "" && nome3 != ""){
        return nomeCompleto = nome1+ ' ' + nome2 + ' ' + nome3;
    }
    else if(nome1 != "" && nome2 == "" && nome3 == ""){
         return nomeCompleto =  nome1;
    }
    else if(nome1 == "" && nome2 != "" && nome3 != ""){
         return nomeCompleto =  nome2 + ' ' + nome3;
    }
    else if(nome1 == "" && nome2 == "" && nome3 != ""){
         return nomeCompleto = nome3;
    }
    else if (nome1 != "" && nome2 != "" && nome3 == ""){
        return nomeCompleto = nome1+ ' ' + nome2;
    }

    /*if (nome2 != ""){
        
        nomeCompleto = nome2;
    }*/
}