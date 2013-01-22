/************************************************************* 
*  CONFIGURAÇÕES DE COMPONENTES JQUERY
* ************************************************************
* Diversas funções -
* Usado em telas diferentes.
*
* Obs.:   
*
* Dependéncias:
*   - jquery-1.5.1.min.js
* 
* 
* Axel Alexander - All rights reserved Â©.
* Criado por         : Axel Alexander Martins Benites
* Data da Criação    : 13/04/2012
* Modificado por     : --
* Data da modificação: --
* Observação: -- delcaração jQuery para no conflitar comprototype
* **********************************************************/


jQuery(document).ready(function () {  
    //DatapickerBR();
  //jQuery.noConflict();
  
  /* DESTROY DIALOG
  ----------------------------------------------------*/ 
  
  //jQuery("#dialog:ui-dialog").dialog("destroy");

  /* CONFIGURAÇÃO DO DATEPICKER DO JQUERYUI PARA PT-BR
  ----------------------------------------------------*/
    //( ".selector" ).datepicker({ dateFormat: 'yy-mm-dd' });

}); // fim  document ready

/*************************************************
* JQUERY ALERT CONFIRM
*************************************************/
function dialogConfirma(div, titulo, icono){
    jQuery("#"+div).dialog({
               modal	: true,
               title	: titulo,
               bgiframe	: true,
               height   : 200,
               width    : 450,
               autoOpen: false,
               open: function (event, ui)
                {
                  jQuery(this).css({
                    "width": "100%",
                    "background": "url(" + base_url + "images/jQuery_dialog/Img_dialog_" + icono + ".png)",
                    "backgroundRepeat": "no-repeat",
                    "backgroundPosition": "90% 98%",
                    "float": "left",
                    "overflow": "hidden"
                 })
               }
         });
}
/*************************************************
* JQUERY ALERT CONFIRM
*************************************************/
function confirmDelete(div, url, username, id) {
   var delUrl = url + id;
   jQuery("#"+div).html(texto_deletar+" ... : '" + username + "'");
   jQuery("#"+div).dialog('option', 'buttons',
   {
    "No": function() {
            jQuery(this).dialog("close");
            //jQuery(this).dialog('destroy');
    },
    "Si": function() {
            window.location.href = delUrl;
     }
   });
    jQuery("#"+div).dialog('open');
}

function myConfirm(dialogText, okFunc, cancelFunc, dialogTitle) {
    jQuery('<div style="padding: 10px; max-width: 500px; word-wrap: break-word;">' + dialogText + '</div>').dialog({
            draggable: true,
            modal: true,
            resizable: false,
            width: 'auto',
            title: dialogTitle || 'Confirm',
            minHeight: 75,
            buttons: {
                OK: function () {
                    if (typeof (okFunc) == 'function') { setTimeout(okFunc, 50); }
                    jQuery(this).dialog('destroy');
                },
                Cancel: function () {
                    if (typeof (cancelFunc) == 'function') { setTimeout(cancelFunc, 50); }
                    jQuery(this).dialog('destroy');
                }
            }
        });
}

function popUpWindow(id, title, containerId) {

    //$divObj = jQuery('#'+id);
    $divPagina =  jQuery('<div id="divDialog" />');
    $divPagina.dialog('destroy');
    $divPagina.dialog({
        autoOpen: false,
        bgiframe: true,
        modal: true,
        title: title,
        open: function (event, ui) {
            //$divPagina.append("simple Div Tag");
            //$divPagina.parent().appendTo(jQuery("form"));
        },
        close: function (event, ui) {
            //$divObj.parent().appendTo(jQuery('#' + containerId));
           //jQuery("body").css("overflow", "auto");
        }
    });
    return $divPagina;
    //return $divObj.dialog('open');
    //jQuery('#' + id + " input:text:visible:first").focus();
}

function popUpWindowButton(title, containerId, _height, _width) {

    //$divObj = jQuery('#'+id);
    $divWindow =  jQuery('<div id="divDialog" />');
    $divWindow.dialog('destroy');
    $divWindow.dialog({
        autoOpen: false,
        bgiframe: true,
        modal: true,
        title: title,
        height   : _height || 200,
        width    : _width || 450,
        buttons: {
                OK: function() { //ok
                    jQuery( this ).dialog( "close" );
                },
                Cancel: function() { //cancel
                    jQuery( this ).dialog( "close" );
                }
       },
       open: function () {
            //$divWindow.append("simple Div Tag");
            //$divWindow.parent().appendTo(jQuery("form"));
            //$divWindow.parent().appendTo(jQuery('#' + containerId));
            $divWindow.append(jQuery('#' + containerId));
       },
        close: function () {
            //$divWindow.parent().appendTo(jQuery('#' + containerId));
            //jQuery("body").css("overflow", "auto");
            //jQuery( this ).dialog('destroy');
            //jQuery('#' + containerId).html("");
        }
    });
    return $divWindow;
    //jQuery('#'+id+" input:text:visible:first").focus();
}

/*************************************************
* Js datepicker USA
*************************************************/
function DatapickerUS(){
  jQuery.datepicker.setDefaults({
      // showOn       : "button"
      // ,buttonText: "Selecionar"
      // ,buttonImage  : base_url + 'images/icon/icon_calendar.jpg'
      // ,buttonImageOnly: true
      showButtonPanel: true
      ,dayNames     : dayNames
      ,dayNamesMin  : dayNamesMin
      ,dayNamesShort: monthNamesShort
      ,monthNames   : monthNames
      ,nextText     : 'Próximo'
      ,prevText     : 'Anterior'
      ,currentText  : 'Hoje'
      ,closeText    : 'Fechar'
      //,weekHeader   : 'Sm'
      ,dateFormat   : 'yy-mm-dd'
      //,showOn: "clip"
      //,hide: "clip"
      ,firstDay: 1
      ,numberOfMonths: 1
      ,isRTL: false
      ,showButtonPanel: true
      ,showMonthAfterYear: false
      ,yearSuffix: ''
    });  
    
}

/*************************************************
* Js datepicker portugues
*************************************************/
function DatapickerBR(){
  jQuery.datepicker.setDefaults({
      //showOn       : 'button'
      //showOn: 'both'
      //,buttonText: "Selecionar"
     //,buttonImage  : base_url + 'images/icon/icon_calendar.jpg'
     //,buttonImageOnly: true
     showButtonPanel: true
     ,dateFormat    : 'dd/mm/yy'
     ,numberOfMonths: 2
     ,dayNames     : dayNames
     ,dayNamesMin  : dayNamesMin
     ,dayNamesShort: monthNamesShort
     ,monthNames   : monthNames
     ,nextText     : 'Próximo'
     ,prevText     : 'Anterior'
     ,closeText    : 'Fechar'
     ,currentText  : 'Hoje'
    });  
    
}

/*************************************************
* Js datepicker español
*************************************************/
function DatapickerES(){
   jQuery.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '<Ant',
      nextText: 'Sig>',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado'],
      dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
      weekHeader: 'Sm',
      dateFormat: 'dd/mm/yy',
      //showOn: "clip",
      //hide: "clip",
      firstDay: 1,
      numberOfMonths: 2,
      isRTL: false,
      showButtonPanel: true,
      showMonthAfterYear: false,
      yearSuffix: ''};
     jQuery.datepicker.setDefaults($.datepicker.regional['es']);
}

/*************************************************
* Js datepicker español
*************************************************/
function DatapickerEStoUSA(){
   jQuery.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '<Ant',
      nextText: 'Sig>',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado'],
      dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
      weekHeader: 'Sm',
      dateFormat  : 'yy-mm-dd',
      //showOn: "clip",
      //hide: "clip",
      firstDay: 1,
      //numberOfMonths: 2,
      isRTL: false,
      showButtonPanel: true,
      showMonthAfterYear: false,
      yearSuffix: ''};
     jQuery.datepicker.setDefaults($.datepicker.regional['es']);
}




/*
myConfirm('Do you want to delete this record ?',
    function () { alert('You clicked OK'); } ,
    function () { alert('You clicked Cancel'); },
    'Desea Realmente excluir este registro');
*/