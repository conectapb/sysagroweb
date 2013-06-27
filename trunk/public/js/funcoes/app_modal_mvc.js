/************************************************************* 
*  CRIAÇÃO DE TELAS MODAL PARAMETRISADOS
* ************************************************************
* Diversas funções - 
* Usado em telas diferentes.
*
* Obs.:   
*
* Dependéncias:
*   - jquery-1.5.1.min.js ou superior
* 
* 
* Axel Alexander - All rights reserved Â©.
* Criado por         : Axel Alexander Martins Benites
* Data da Criação    : 03/04/2013
* Modificado por     : --
* Data da modificação: --
* Observação: -- delcaração jQuery para no conflitar comprototype
* **********************************************************/


 //var $DialogMensagem;

/********************************************************
* EMITIR MENSAGENS DE SUCESSO FALHA OU ERROR
* MENSAGEM SUCESSO HOME
* Autor: Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
function onSuccess(resposta){
  switch(resposta.success)
  {
    case "OK" :
        //MensagemSucesso(resposta.Mensagem);
        exibirMensagenOk(resposta.Mensagem)
    break;
    case "Falhou" :
      var variavel = resposta.Erros.toString();
      var caractere = variavel.split(',');
      MensagensErro( caractere );
    break;
    case "Falhou Geral" :
      var variavel = resposta.Erros.toString();
      var caractere = variavel.split(',');
      MensagensErro( caractere );
    break;
    default:
      MensagemAlerta("Erro a normal");
    break;
  }
}

/********************************************************
* EMITIR MENSAGEM DE ERROS 
* MENSAGEM ERROR HOME
* Autor: Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
function onError(xhr, ajaxOptions, thrownError){
    var erros=new Array(); 
    erros[3]="Por favor consulte o administrador";
    erros[0]="ERRO: "+xhr.status+  " Pagina não localizado";       
    erros[1]="ERRO: "+ajaxOptions+ " ERRO FATAL";
    erros[2]="ERRO: "+thrownError+ " Pagina não localizado";
    MensagensErro(erros);
} 

function _onError(xhr, ajaxOptions, thrownError){
    MensagemAlerta("ERRO: "+xhr.status+  " Pagina não localizado");
    MensagemAlerta("ERRO: "+ajaxOptions+ " ERRO FATAL");
    MensagemAlerta("ERRO: "+thrownError+ " Pagina não localizado");    
}


/********************************************************
* CRIA POPUP MODEL PARA CONFIRMAÇÃO 
* RECEBE O NOME DA FUNÇÃO A SER EXECUTADA COMO PARAMENTRO 
* obj     = VALOR DO ID , 
* funcao  = FUNÇÃO A SER EXECUTADA COMO PARAMENTRO, 
* icon    = ICONE A SER EXIBIDO , 
* Autor: Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
confirmaExclusao = function(obj, funcao, icon ){
        var html = "<div class='divDialog'>";
            html += "<div id='dialog-confirm'>";
            html += "<p>";
            html += "<span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>";
            html += "Tem certeza de que deseja apagar este registro?";
            html += "</p>";
            html += "</div></div>";
            jQuery(html).dialog({
                title: "Confirmação de Exclusão",
                autoOpen: true,
                resizable: false,
                height:200,
                width: 380,
                modal: true,
                open: function (event, ui)
                    {
                      jQuery(this).css({
                        "width": "100%",
                        "background": "url(" + base_img + "jQuery_dialog/Img_dialog_" + icon + ".png)",
                        "backgroundRepeat": "no-repeat",
                        "backgroundPosition": "90% 98%",
                        "float": "left",
                        "overflow": "hidden",
                      })
                   },
              buttons: {
                  "Sim": function() {
                     
                      jQuery( this ).dialog( "close" );
                        window[funcao](obj);
                  },
                  "Cancelar": function() {
                      //if(typeof fNao == "function"){fNao(obj);}
                      jQuery( this ).dialog( "close" );
                  }
              }
        });
}



/********************************************************
* CRIA POPUP MODEL CUSTOMIZADA
* RECEBE O TIPO DE BOTÃO E UM CONJUNTO DE HTML PARA INCLUIR NA DIV
* id         = VALOR DO ID , 
* tipoBotoes = DEFINE QUAL OS BOTOES VAI MONTAR, 
* titulo     = TITULO A SER EXIBIDO , 
* _html      = CONTEUDO HTML , 
* _height    = TAMANH DA MODAL, 
* _width     = LARGURA DA MODAL , 
* view       = AO CAMINHO DA PAGINA A CER CARREGADA 
* Autor: Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
mostrarDialogCustomizada = function (id, tipoBotoes, titulo, _html, _height, _width, _autoOpen, view) {
      //var imagem_icone = 'atencao';
      var titulo_dialog = 'Atenção!';
      var texto_dialog  = 'Sem texto para exibir!';
      var botoes_dialog = { 'Ok': 0 };
      var html          = _html || '<h2 class="titulo-p-celeste" >Detalhes da Mesa</h2>' ;  
      // html += '<div id="detail_popup"></div>';
    
      jQuery(html).dialog({
                title        : titulo  || titulo_dialog,
                autoOpen     : _autoOpen,
                resizable    : true,
                height       : _height || 300,
                width        : _width  || 580,
                modal        : true,
                open: function (event, ui) {
                 if(_html == ''){
                    jQuery(this).load(base_url+'pedidos/modulos/'+view);
                  }
                },
                close: function(event, ui){
                    // remove todo que estava na Dialog para não ocorrer erros
                    jQuery(this).dialog('destroy').remove()
                }
                ,buttons: botoesDialog(id, tipoBotoes)
        });
}
        

mostrardialogMensagem = function( _texto, _tipo, tipoBotoes, _height, _width, _autoOpen ,_modal){
    var texto    = _texto;
    var tipo     = _tipo     || "Alerta";
    var height   = _height   || 200;
    var width    = _width    || 450;
    var titulo   = "Mensagem de " + _tipo;
    var autoOpen = _autoOpen || false;
    var modal    = _modal    || false;
    //var close    = _close    || "";
    //jQuery(html)
    var $divMensagem = jQuery('<div id="divDialog"><div/>');
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
        "background": "url(" + base_url + "images/jQuery_dialog/Img_dialog_" + _tipo + ".png)",
        "backgroundRepeat": "no-repeat",
        "backgroundPosition": "90% 98%",
        "float": "left",
        "overflow": "hidden"
        })
        },
        close: function (event, ui) {
            //if (_close) eval(close);
        },
        
        buttons: botoesDialog(0, tipoBotoes)
    });

    var $divTexto = jQuery('<div id="divTexto" style="padding-right: 5; width:73%; text-align:justify">' + _texto + '</div>');
    $divMensagem.append($divTexto);
    return $divMensagem;
}




/********************************************************
* BOTOES A SER CRIADO PARA A MODAL
* RECEBE O TIPO DE BOTÃO A SER GERADO
* id         = VALOR DO ID , 
* tipoBotoes = DEFINE QUAL OS BOTOES VAI MONTAR, 
* Autor: Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
botoesDialog = function(id, tipoBotoes){
      var botoes;        
        if(tipoBotoes=='create')
        {
          botoes = 
            {         
              'Gravar': function () {
                    Salvar();
               } ,

               'Cancelar': function () {
                    //$('#dialogVisualizarVaga').dialog('close');
                   jQuery( this ).dialog( "close" );
                }
            }
        }
        else if(tipoBotoes=='edit')
        {
          botoes = 
            {         
              'Gravar': function () {
                    Alterar();
               } ,
               
               'Cancelar': function () {
                    //$('#dialogVisualizarVaga').dialog('close');
                   jQuery( this ).dialog( "close" );
                }
            }
        }
        else if(tipoBotoes=='refres')
        {
          botoes = 
            {         
              'Fechar': function ()  {
                  //$('#dialogVisualizarVaga').dialog('close');
                  jQuery( this ).dialog( "close" );
                  recarregaPagina();
                }
            }
        }
        else
        {
            botoes = 
            {
              'Fechar': function () {
                //$('#dialogVisualizarVaga').dialog('close');
                jQuery( this ).dialog( "close" );
              }
            }
        }
    return botoes;
}



/********************************************************
* EXECUTA O confirmaExclusao
* RECEBE O VALOR DO ID  E O NOME DA FUNÇÃO A EXECUTAR
* obj    = VALOR DO ID , 
* funcao = FUNÇÃO A SER EXECUTADA COMO PARAMENTRO, 
* Autor: Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
exibirConfirmacao = function (obj, funcao) {
    confirmaExclusao(obj, funcao, 'Stop');
};

/********************************************************
* EXECUTA O mostrarDialogCustomizada PARA MONTA A PAGINA 
* DE INSERÇÃO
* RECEBE O VALOR DO ID  E O NOME DA FUNÇÃO A EXECUTAR
* id    = VALOR DO ID , 
* _height    = TAMANH DA MODAL, 
* _width     = LARGURA DA MODAL , 
* view       = AO CAMINHO DA PAGINA A CER CARREGADA 
* Autor: Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
exibirFormNovo = function (id, _height, _width, _view ) {
   mostrarDialogCustomizada(0,'create', 'Adcionar', '', _height, _width , true, _view+'.php');   

   //$.domCache('#formulario').remove();
   //$("#formulario").flushCache();
};


exibirFormNovoParam = function (id, _height, _width, _view ) {
   mostrarDialogCustomizada(0,'create', 'Adcionar', '', _height, _width , true, _view+'.php?mesa='+id);   
};


/********************************************************
* EXECUTA O mostrarDialogCustomizadaP ARA MONTA A PAGINA 
* DE EDIÇÃO
* AQUI A VIEW E ENVIADO POR GET
* RECEBE O VALOR DO ID  E O NOME DA FUNÇÃO A EXECUTAR
* id    = VALOR DO ID , 
* _height    = TAMANH DA MODAL, 
* _width     = LARGURA DA MODAL , 
* view       = AO CAMINHO DA PAGINA A CER CARREGADA 
* Autor: Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
exibirFormEditar = function (id, _height, _width, _view ) {
   mostrarDialogCustomizada(1,'edit', 'Editar', '', _height, _width , true,_view+'.php?id='+id);    
   //$.domCache('#formulario').remove();  
   //$("#formulario").flushCache();                    
};
   
/********************************************************
* EXECUTA O mostrarDialogCustomizada PARA MONTA A PAGINA 
* DE DETALHER OU VISUALIZAÇÃO
* E MUITO IMPORTANTE IMPLEMENTAR UMA FUNÇÃO QUE RETORNE 
+ O HTML MONTADO
* id    = VALOR DO ID , 
* _height    = TAMANH DA MODAL, 
* _width     = LARGURA DA MODAL , 
* view       = AO CAMINHO DA PAGINA A CER CARREGADA 
* Autor: Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/   
exibirFormDetail = function (id, _height, _width, _view ) {
  mostrarDialogCustomizada(0,'', 'Detalhes', criarHtml(id), _height, _width , _view+'.php');   
};


/*
* MOSTRA MESAGEM SUCESSO VIA POP UP 
* EXECUTA mostrardialogMensagem 
* msg:    MENSAGEM A SER EXIBIDA
* Autor:  Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
exibirMensagenOk = function(msg){
    mostrardialogMensagem(msg, "Sucesso", "refres", 200, 450, true ,false);
} 


/*
* MOSTRA MESAGEM ALERTA VIA POP UP 
* EXECUTA mostrardialogMensagem 
* msg:    MENSAGEM A SER EXIBIDA
* Autor:  Axel Alexander Martins Benites
* E-mail: axel_nomore@hotmail.com
*/
exibirMensagenAlerta = function(msg){
    mostrardialogMensagem(msg, "Alerta", "Fechar", 200, 450, true ,false);
}