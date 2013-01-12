/* 
 * controle evento 
 * definidas todas as manipulações de eventos
 */
jQuery(document).ready(function() {
  jQuery('#calendar').fullCalendar({
   editable: false,
   draggable: true,
   header: {
           left  : 'month, agendaWeek,agendaDay',
           center: 'title',
           right : 'today, prev,next'
  },
  allDayDefault: true,
  url: false,
  //timeFormat: 'HH:mm ', // uppercase H for 24-hour clock
  //agenda: 'HH:mm ', // 5:00 - 6:30
  events: base_url+"Evento/geteventos/",
  eventDrop: function(event, delta) {
            alert(event.title + ' was moved ' + delta + ' days\n' +
            '(should probably update your database)');
  },
 eventClick : function(calEvent, $event) {
             //window.open(event.url, 'gcalevent', 'width=700,height=600');
             //return false;
             if (calEvent.readOnly) { return;}
             var $dialogContent = jQuery("#Janela_dialog_evento");
              resetForm($dialogContent);
              var bodySpan   = $dialogContent.find(".date_body").text( calEvent.body);
              var titleSpan  = $dialogContent.find(".date_title").text( calEvent.title);
              var startSpand = $dialogContent.find(".date_start").text( calEvent.start);
              var endSpan    = $dialogContent.find(".date_end").text( calEvent.end);
              $dialogContent.dialog({
                  closeOnEscape: true,
                  modal: true,
                  height:550,
                  width :400,
                  //position: 'top',
                  resizable: false,
                  show: 'clip',
                  hide: 'clip',
                  draggable: true,
                  title: "Evento - " + calEvent.title,
                  close: function() {
                       $dialogContent.dialog("destroy");
                       $dialogContent.hide();
                  },
                  buttons: {
                       "Cerrar" : function() {
                           $dialogContent.dialog("close");
                       }
                 }
                }).show();
                 //var bodySpan  = $dialogContent.find(".date_body").text( calEvent.body);
                 //var titleSpan = $dialogContent.find(".date_title").text( calEvent.title);
                 //var startSpan = $dialogContent.find(".date_start").text( calEvent.start);
                 //var endSpan   = $dialogContent.find(".date_end").text( calEvent.end);
                 jQuery(window).resize().resize(); //fixes a bug in modal overlay size ??
             return false;
   },
     loading: function(bool) {
         if (bool) jQuery('#loading').show();
         else jQuery('#loading').hide();
     }
  });

});

function resetForm($dialogContent) {
   $dialogContent.find(".spam-text").text("");
                            
}
                         
function List(url){
    RedirecionaPagina(base_url+url);
}