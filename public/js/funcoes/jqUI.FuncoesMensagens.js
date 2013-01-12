function dialogPagina(parametros) {
    var pagina 		= parametros.pagina || "";
    var parametro 	= parametros.parametro || "";
    var titulo 		= parametros.titulo || "";
    var height 		= parametros.height || 360;
    var width 		= parametros.width  || 620;
    var autoOpen 	= parametros.autoOpen || false;
    var modal 		= parametros.modal || false;

    var $divPagina = jQuery('<iframe id="ifteste" src="' + pagina + parametro + '" title="' + titulo + '" frameborder=0 />');
    $divPagina.dialog({
        autoOpen: autoOpen,
        title: titulo,
        height: height,
        width: width,
        modal: modal,
        resizable: false,
        open: function (event, ui) { jQuery(this).css({ "width": "100%", "padding": "0 0px" }); }
    });
    return $divPagina;
}

function dialogMensagem(parametros) {
    var texto    = parametros.texto;
    var tipo     = parametros.tipo   || "Alerta";
    var height   = parametros.height || 200;
    var width    = parametros.width  || 450;
    var titulo   = "Mensagem de " + tipo;
    var autoOpen = parametros.autoOpen || false;
    var modal    = parametros.modal    || false;
    var close    = parametros.close    || "";

    var $divMensagem = jQuery('<div id="divDialog" />');
    $divMensagem.dialog({
        autoOpen  : autoOpen,
        title     : titulo,
        minWidth  : width,
        minHeight : height,
        width     : width,
        modal     : modal,
        resizable: false,
        open: function (event, ui) {
         jQuery(this).css({
        "width": "100%",
        "background": "url(" + base_url + "images/jQuery_dialog/Img_dialog_" + tipo + ".png)",
        "backgroundRepeat": "no-repeat",
        "backgroundPosition": "90% 98%",
        "float": "left",
        "overflow": "hidden"
        })
        },
        close: function (event, ui) {
            if (close)
                eval(close);
        },
        buttons: { "Fechar": function () { jQuery(this).dialog("close"); } }
    });

    var $divTexto = jQuery('<div id="divTexto" style="padding-right: 5; width:73%; text-align:justify">' + texto + '</div>');
    $divMensagem.append($divTexto);
    return $divMensagem;
}

function dialogConfirma(parametros) {
    var texto = parametros.texto;
    var height = parametros.height || 200;
    var width = parametros.width || 450;
    var autoOpen = parametros.autoOpen || false;
    var funcaoRetorno = parametros.funcaoRetorno || "";
    var funcaoCancela = parametros.funcaoCancela || "";

    var $divConfirma = jQuery('<div id="divDialog" />');
    $divConfirma.dialog({
        autoOpen: autoOpen,
        title: "Confirmação",
        minWidth: width,
        minHeight: height,
        width: width,
        modal: true,
        resizable: false,
        open: function (event, ui) {
            jQuery(this).css({
            "width": "100%",
            "background":  "url(" + base_url + "images/jQuery_dialog/Img_dialog_Alerta.png)",
            "backgroundRepeat": "no-repeat",
            "backgroundPosition": "98% 98%",
            "float": "left",
            "overflow": "hidden"
            })
        },
        buttons: {
            "Ok": function () {
                jQuery(this).dialog("close");

                if (parametros.funcaoRetorno)
                    eval('(' + parametros.funcaoRetorno + ')');

            },

            "Cancelar": function () {
                jQuery(this).dialog("close");

                if (parametros.funcaoCancela)
                    eval('(' + parametros.funcaoCancela + ')');
            }
        }
    });

    var $divTexto = jQuery('<div id="divTexto" style="padding-right: 5; width:73%; text-align:justify">' + texto + '</div>');
    $divConfirma.append($divTexto);
    return $divConfirma;
}

function dialogExcecao(parametros) {
    var texto = parametros.texto;
    var tipo = parametros.tipo || "Alerta";
    var height = parametros.height || 200;
    var width = parametros.width || 450;
    var titulo = "Mensagem de " + tipo;
    var autoOpen = parametros.autoOpen || false;
    var modal = parametros.modal || false;
    var close = parametros.close || "";

    var $divExcecao = jQuery('<div id="divDialog" />');
    $divExcecao.dialog({
        autoOpen: autoOpen,
        title: titulo,
        minWidth: width,
        minHeight: height,
        width: width,
        modal: modal,
        resizable: false,
        open: function (event, ui) {
        jQuery(this).css({
         "width": "100%",
         "background":  "url("+base_url+ "images/jQuery_dialog//Img_dialog_" + tipo + ".png)",
         "backgroundRepeat": "no-repeat",
         "backgroundPosition": "98% 98%",
         "float": "left",
         "overflow": "hidden"
            })
        },
        close: function (event, ui) {
            if (close)
                eval(close);
        },
        buttons: { "Fechar": function () { jQuery(this).dialog("close"); }
        }
    });

    var $divTexto = jQuery('<div id="divTexto" style="padding-right: 5; width:73%; text-align:justify">' +
    texto + '</div> <br /> Digite seu telefone: <br /> <input type="text" id="telErro" name="telErro" value="" style="width: 70px;" onkeyup="salvarTel(this);" />');

    $divExcecao.append($divTexto);
    jQuery("#telErro").mask("9999-9999");
    return $divExcecao;
}

function MensagensErro(arrMsg) {
    var msg = "<ul>";
    for (var i = 0; i < arrMsg.length; i++) {
        msg += "<li>" + arrMsg[i] + "</li>";
    }
    msg += "</ul>";
    dialogMensagem({ texto: msg, tipo: "Erro", height: (arrMsg.length * 20) + 150, autoOpen: true, modal: true });
}

function MensagemErro(msg) {
    dialogMensagem({ texto: msg, tipo: "Erro", autoOpen: true, modal: true });
}

function MensagemAlerta(msg) {
    dialogMensagem({ texto: msg, tipo: "Alerta", autoOpen: true, modal: true });
}

function MensagemSucesso(msg) {
    dialogMensagem({ texto: msg, tipo: "Sucesso", autoOpen: true, modal: true });
}

function MensagemDesenv(msg) {
    dialogMensagem({ texto: msg, tipo: "Desenvolvimento", autoOpen: true, modal: true });
}

function MensagemStop(msg) {
    dialogMensagem({ texto: msg, tipo: "Stop", autoOpen: true, modal: true });
}

function MensagemInformacao(msg) {
    dialogMensagem({ texto: msg, tipo: "Informacao", autoOpen: true, modal: true });
}


