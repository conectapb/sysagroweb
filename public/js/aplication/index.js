/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(function() {

jQuery(".drop, .dropdown_2columns, .dropdown_5columns, .dropdown_4columns").hover(
            function () {
              //$("#menu").addClass("menu-btn");
              //$("#menu").css("dispaly:", "none");
              //$(".menu-btn").css("dispaly", "none");
              //$(".menu-btn").hide();
              //$("#menu").hide();
              //$("#slidorion").css("dispaly", "none");
              //$(".dropdown_5columns").css("dispaly", "block");
              //$('.dropdown_5columns').css('z-index','900');
             },
            function () {
              //$(this).removeClass("hover");
              //$("#menu").removeClass("menu-btn");
              //$("#menu").css("dispaly:", "block");
               //$("#menu").show();
               //$(".menu-btn").show();
               //$(".menu-btn").fadeOut();
               
              //jQuery(this).find("#menu").css("display","block");
            });




//var myDialogX = $(this).position().left - $(this).outerWidth();
//var myDialogY = $(this).position().top - ( $(document).scrollTop() + $('.ui-dialog').outerHeight() );

        //$(this).scrollTo(0, jQuery("body"));
        window.scrollTo(jQuery('#DgMsg').dialog(
        'option'
        , 'position')[0]
        ,jQuery('#DgMsg').dialog('option', 'position')[0]);



       jQuery('#slidorion').slidorion({
            effect: 'slideRandom'
        });


        jQuery("#DgMsg").dialog({
            width: 'auto',
            title:'Dj Didi P&Aacute;GINA EM CONSTRUCCI&Oacute;N.',
            autoOpen: false,
            closeOnEscape: true,
            modal: true,
            height:600,
            width :500,
            //position: 'top',
            //position : [position.top, position.left],
            //position :[myDialogX, myDialogY],
            resizable: false,
            open: function(){
                //$(this).scrollTop(0);
                //change the z-index and position the div where you want
                //$('#a').css({'z-index':  1005, 'position': 'absolute', 'top': 0 });
            },
            close: function(){
                //go back to normal
                //$('#a').css({'z-index':  1, 'position': 'static' });
            }

        })


});