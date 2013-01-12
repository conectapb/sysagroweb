/* 
 * controle evento 
 * definidas todas as manipulações de eventos
 */
var stateData;
var numbers = [ 1, 2, 3, 4, 5]
var listItems= "";
var jsonList = {"Table" : [
                {"value" : "Servicio 1","text" : "Servicio 1"},
                {"value" : "Servicio 2","text" : "Servicio 2"},
                {"value" : "Servicio 4","text" : "Servicio 3"},
                {"value" : "Servicio 5","text" : "Servicio 4"},
                {"value" : "Servicio 6","text" : "Servicio 5"}]}

jQuery(document).ready(function () {
    /* dialog  destroy */
    jQuery("#dialog:ui-dialog" ).dialog( "destroy" );
    /* picker para novo registro */
    jQuery( "#data_evento" ).datepicker().mask("99/99/9999");
    /* mask telefonos */
    jQuery("#telefone").mask("(9999)-999999");
    jQuery("#celular").mask("(9999)-999-999");
    /*Gera Lista de Servicos */
    //jQuery("#Dialog_msg").css("display", "none");
    jQuery("#btnVerServico").click( function(){
        jQuery( "#Janela_dialog" ).dialog( "open" );
            //$divPagina.dialog('open');
            //jQuery("#Dialog_msg").css("display", "block");
            //$divWindow.dialog('open');
    }); 
    /*Gera Janela Serviços */
    jQuery('#Janela_dialog').dialog({ 
            'modal':true, 
            'width':550, 
            'height':400, 
            'autoOpen': false, 
            'autoResize': true,
            'show': 'clip',
            'hide': 'clip',
            'draggable': true,
            buttons: { "Cerrar": 
                    function() { 
                        jQuery(this).dialog("close"); 
                } } 
    });
    /* prepara dialog confirm */
    dialogConfirma("confirmDelete", "Excluir", "Stop");
    /*Gera Lista de Servicos */
    //GeraListaServicos();
    retornaListaAtos();
    /* Gera Tab  */
    GeraTab();
   /* Datepick em español  */
    DatapickerES();
}); // fim  document ready

function List(url){
    RedirecionaPagina(base_url+url);
}
/* Gera Tab  */
function GeraTab(){
   jQuery.getJSON("Servico/getservico/", function(data) {
    stateData = data;
    var $theLastGroup = "zzzzz";
    var $ulItems = "<ul id='ul_tabs'>\n";
    var $divItems = "";
    $divItems = "<div id='tab_content'>\n"
    jQuery.each(stateData, function(i,jsonData) {
    if( $theLastGroup != jsonData.nome )
        {
            $ulItems = $ulItems+"<li><a href='#tab_"+jsonData.id+"'>"+jsonData.nome+"</a></li>\n";
            if( i > 0 ) 
            {
                $divItems = $divItems+"</div>\n";           
            }
            $divItems = $divItems+"<div id='tab_"+jsonData.id+"'>\n";
            
        }
         $divItems = $divItems+jsonData.observacao +"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n";
         $divItems = $divItems+"</div>\n";  
       
    });
    
     //$ulItems = $ulItems+"<li id=\"ui-tab-dialog-close\"></li>\n";
     $ulItems = $ulItems+"</ul>\n";
     $divItems = $divItems+"</div>\n";
     jQuery("#tab_info").append($ulItems);
     jQuery("#tab_info").append($divItems);
     jQuery("#tab_info").tabs();
});  

}
/* Gera Lista de Servicos  */
function GeraListaServicos(){
   for (var i = 0; i < jsonList.Table.length; i++){
        listItems+= "<option value='" + jsonList.Table[i].value + "'>" + jsonList.Table[i].text + "</option>";
      }
      jQuery("#solicitacao").html(listItems);
    
}
/* Gera Lista de Servicos  */
function GeraListaServicos1(){
    jQuery.each(numbers, function(val, text) 
    {
        jQuery('#status').append( jQuery('<option></option>').val(val).html(text) )
  }); // there was also a ) missing here
}


/**********************************************************
*  POPULA COMBO DE ATOS
*  @param = id id a ser deletado
*
***********************************************************/
function retornaListaAtos() {
    jQuery.getJSON(base_url + 'Agenda/getservicos/', null)
    .success(function (data) {
        if( data.mensagens == "ok" )
        {
          jQuery("#solicitacao").append("<option value=''>Selecione...</option>");
          jQuery(data.dados).each(function (index, value) 
          {
            jQuery("#solicitacao").append("<option value='" + value.id + "'>" + value.nome + "</option>");
          });  
        }
     })
    .error(function (err) {
        MensagemAlerta("Erro ao carregar a Lista de Atos.");
    });
}
