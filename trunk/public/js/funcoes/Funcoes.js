/// <reference path="jquery-1.5.1-vsdoc.js" />

/************************************************************* 
* SGI
* ***********************************************************
* Diversas funções úteis em JavaScript.
* Usado e quase todas as telas.
*
* Obs.: Algumas coisas tranpostadas do FuncoesGlobais.js do AE.
*
* Dependências:
*   - jquery-1.5.1.min.js
* 
* 
* SGI - All rights reserved ©.
* Criado por: Renan Siravegna Moreira
* Data da Criação: ??/??/2011
* Modificado por: --
* Data da modificação: --
* Observação: --
* **********************************************************/

/********************************************************
* Função para diminuir a execução da função jQuery.ajax
* O uso de jQuery.post as vezes não é util por suas limitações.
* Um exemplo de sua limitação é quando um método necessita receber
* lista de entidades como paâmetro (em List ou Array) que para
* funcionar deve ser enviada em formato string (não funciona
* mandando o objeto direto), que o jQuery.post não
* suporta (suporta somente o objeto json).
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function ajax(action, data, success, error, beforeSend, complete, quote, param_adicionais) {
    //URL do ajax, que sempre deverá ser uma Action do Controller
    action = action || "";

    //Parâmetros do ajax, podendo ser uma string json ou um objeto json
    data = data || "{}";

    /*
    Parâmetros de sucesso, erro, antes de enviar e ao completar do ajax.
    Devem ser enviados funções JS em variáveis, exemplo:

    var sucesso = function(data) {
    alert("Do something!");
    };

    var erro = function()...;
    var antesEnviar = function()...;
    var completar = function()...;

    Os parâmetros que recebem da função estão todos listados nos ajax
    events na jQuery.API no site oficial
    */
    success = success || "";
    error = error || "";
    beforeSend = beforeSend || "";
    complete = complete || "";

    /*
    Caso seja string e não usar JSON.stringify em um objeto json, pode
    optar por esta opção que substituirá todos os | (pipe) da string
    por aspas, não necessitando assim escapar as aspas na string ("\"").

    Exemplo:
    string original = "{ param1: |Nome|, param2: |Sobrenome| }";
    string depois do quote = "{ param1: \"Nome\", param2: \"Sobrenome\" }";
    */
    quote = quote || false;

    if (quote == true)
        data = data.replace(/\|/g, "\"");

    /*
    Propriedades muito relevantes estarão em parâmetros
    pre-definidos, os demais estarão deste JSON.
    */
    var async = param_adicionais.async == false ? false : true;

    jQuery.ajax({
        url: action,
        type: "POST",
        data: data,
        async: async,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        beforeSend: beforeSend,
        complete: complete,
        success: success,
        error: error
    });
}

/********************************************************
* Função para criar o método trim();
*
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
*/
String.prototype.trim = function () { return (this.replace(/^[\s\xA0]+/, "").replace(/[\s\xA0]+$/, "")); }

/********************************************************
* Função para criar o método ltrim();
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
String.prototype.ltrim = function () { return this.replace(/^\s+/, ""); }

/********************************************************
* Função para criar o método rtrim();
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
String.prototype.rtrim = function () { return this.replace(/\s+$/, ""); }

/********************************************************
* O nome diz tudo.
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
String.prototype.padLeft = function (char, qtde) {
    final = "";

    if (qtde > this.length) {
        for (i = 0; i < qtde - this.length; i++) {
            final += pad;
        }
    }

    return final + this;
}

/********************************************************
* Recebe o valor e pelo tamanho identifica se é IE,
* CNPJ ou CPF e aplica a devida formatação.
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function mccFormat(valor) {
    //Ie.
    if (valor.length == 9)
        return mccFormatIE(valor);

    //Cnpj.
    else if (valor.length == 14)
        return mccFormatCNPJ(valor);

    //Cpf.
    else if (valor.length == 11)
        return mccFormatCPF(valor);

    //Caso nao caia em nenhum dos if
    else return "";
}

//Formata IE
function mccFormatIE(valor) {
    return valor.substring(0, 2) + '.' + valor.substring(2, 5) + '.' +
           valor.substring(5, 8) + '-' + valor.substring(8);
}

//Formata CNPJ
function mccFormatCNPJ(valor) {
    return valor.substring(0, 2) + '.' + valor.substring(2, 5) + '.' +
           valor.substring(5, 8) + '/' + valor.substring(8, 12) + '-' +
           valor.substring(12);
}

//Formata CPF
function mccFormatCPF(valor) {
    return valor.substring(0, 3) + '.' + valor.substring(3, 6) + '.' +
           valor.substring(6, 9) + '-' + valor.substring(9);
}

/********************************************************
* Formatação de CEP 99.999-999
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/


function formatar_cep(cep) {
    if (cep.length != 10) return cep;

    return cep.substring(0, 2) + "." + cep.substring(2, 5) + "-" + cep.substring(5);
}

/********************************************************
* Carrega um combo (select) a partir de um JSON
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function carregarCombo(comboId, data, text, value) {

    if (!verificaValor(text) || !verificaValor(value)) {
        alert("function carregarCombo: text e/ou value não foi definido.");
        return;
    }

    for (var i in data) {
        var item = data[i];
        adicionaComboItem(comboId, item[text].trim(), item[value]);
    }
}

/********************************************************
* Adiciona um item ao combo especificado pelo id
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function adicionaComboItem(comboId, text, value) {
    //Pegando o combo (drop down list)
    var combo = document.getElementById(comboId);

    if (combo == null || combo == undefined) {
        alert("function adicionaComboItem: combo inexistente.");
        return;
    }

    //Criando a opção com seu texto e valor de seleção
    var option = document.createElement("option");
    option.text = text;
    option.value = value;

    //Adicionando a nova opção no combo
    try {
        //IE
        combo.add(option);
    }
    catch (err) {
        //Firefox
        combo.add(option, null);
    }
}


/********************************************************
* Limpando selects de uma maneira rápida
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function limpaSelect(id) {

    var selectObj = document.getElementById(id);
    var selectParentNode = selectObj.parentNode;
    var newSelectObj = selectObj.cloneNode(false); //Fazendo uma cópia superficial
    selectParentNode.replaceChild(newSelectObj, selectObj);

    //Adicionando o valor padrão do combo, o "Selecione"
    var option = document.createElement("option");
    option.text = "Selecione...";
    option.value = "";

    //Adicionando a nova opção no combo
    try {
        //IE
        newSelectObj.add(option);
    }
    catch (err) {
        //Firefox
        newSelectObj.add(option, null);
    }
}

/********************************************************
* Função de apenas números
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function customNumeric(e, excecoes) {
    //var whichCode = (window.Event) ? e.which : e.keyCode;
    var whichCode = (e.which) ? e.which : event.keyCode;

    //Teclas funcionais permitidas.
    switch (whichCode) {
        case (8): return true; //Backspace
        case (9): return true; //Tab
        case (13): return true; //Enter
        case (16): return true; //Shift
        case (17): return true; //Ctrl
        case (35): return true; //End
        case (36): return true; //Home
        case (37): return true; //Seta esquerda
        case (39 && String.fromCharCode(39) != "'"): return true; //Seta direita, (aspas tem o mesmo númeric, por isso o if)
        case (46 && String.fromCharCode(46) != "."): return true; //Delete

        case (67): if (e.ctrlKey) return true; //Ctrl + C
        case (88): if (e.ctrlKey) return true; //Ctrl + X
        case (118): if (e.ctrlKey) return true; //Ctrl + V

            //Tratamento para as demais.
        default:
            key = String.fromCharCode(whichCode);

            var strCheck = "0123456789";

            if (excecoes) strCheck += excecoes;

            if (strCheck.indexOf(key) == -1) {
                //e.returnValue = false;
                return false;
            }

            return true;
    }
}

/********************************************************
* Limita os numeros reais. Não deixa por mais de uma virgula, um ponto
* ou virgula apenas, 2 casas decimais...
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function somenteReais(campo, e) {

    var whichCode = (window.Event) ? e.which : e.keyCode;
    //    var whichCode = e.keyCode;
    //    whichCode = whichCode == 0 || whichCode == undefined ? e.charCode : e.keyCode;


    //Teclas funcionais permitidas.
    switch (whichCode) {
        case (8): return true; //Backspace
        case (9): return true; //Tab
        case (16): return true; //Shift
        case (17): return true; //Ctrl
        case (35): return true; //End
        case (36): return true; //Home
        case (37): return true; //Seta esquerda
        case (39 && String.fromCharCode(39) != "'"): return true; //Seta direita, (aspas tem o mesmo númeric, por isso o if)

        case (67): if (e.ctrlKey) return true; //Ctrl + C
        case (88): if (e.ctrlKey) return true; //Ctrl + X

            //Tratamento para as demais.
        default:
            key = String.fromCharCode(whichCode);

            //Caso já tenha uma virgula ou um ponto, não permitirá outro
            if ((key == "," || key == ".") && (campo.value.indexOf(",") > -1 || campo.value.indexOf(".") > -1)) {
                e.returnValue = false;
                return;
            }

            //Pegando a posição do ponto ou da virgula
            var posDec = campo.value.indexOf(",") == -1 ? campo.value.indexOf(".") : campo.value.indexOf(",");

            //Pegando a posição do cursor
            var cPos = getCaretPosition(campo);

            //Verifica se o cursor está depois do ponto ou virgula
            if (posDec > 0 && (cPos > (posDec + 1))) {

                //Pegando os valores de ambos os lados. Caso não tenha um, terá outro.
                //Se não tiver os dois, nem cai no if
                var vals = campo.value.split(",");
                if (vals.length == 1) vals = campo.value.split(".");

                if (vals[1].length == 2) {
                    e.returnValue = false;
                    return;
                }
            }

            //Permite apenas o que está na String
            var strCheck = "0123456789,.";

            if (strCheck.indexOf(key) == -1) {
                e.returnValue = false;
                return;
            }
    }
}

/********************************************************
* Pega a posição do cursor no campo informado
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function getCaretPosition(campo) {
    var CaretPos = 0;

    //Para IE
    if (document.selection) {
        campo.focus();

        var Sel = document.selection.createRange();
        Sel.moveStart("character", -campo.value.length);

        CaretPos = Sel.text.length;
    }

    //Para Firefox
    else if (campo.selectionStart || campo.selectionStart == '0')
        CaretPos = campo.selectionStart;

    return (CaretPos);
}

/********************************************************
* Validação de Data no formato dd/MM/yyyy.
* Recebe o elemento completo onde esta a data. Ex de uso.: onblur="validaData(this.value);"
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function validaData(valor) {

    var date = valor;

    //Ao deixar vazio, vem com a máscara __/__/____ e quando não vem completo vem xx/y_/_____ ou algo do tipo.
    //Aqui eu dou replace nas / e _ para então verificar se os número somam 8 digitos, sendo assim uma data completa.
    if (date.replace(/\//gi, "").replace(/_/gi, "").length != 8) return false;

    //Quebrando a data em vetores
    date = date.split("/");

    //Quando é 08 o parseInt do JS retorna 0, então aqui eu removo os zeros
    if (date[0].substring(0, 1) == "0")
        date[0] = date[0].substring(1);

    if (date[1].substring(0, 1) == "0")
        date[1] = date[1].substring(1);

    //Já validando se o ano é pelo menos maior do que o menor permitido pelo sql server
    if (parseInt(date[2]) < 1900)
        return false;

    //Criando a data
    var dt = new Date(date[2], date[1] - 1, date[0]);

    //Verificando se os valores criados batem com os digitados (JS cria data diferente para datas inválidas)
    var vYear = parseInt(date[2]) == parseInt(dt.getFullYear());
    var vMonth = parseInt(date[1]) == parseInt(dt.getMonth() + 1);
    var vDay = parseInt(date[0]) == parseInt(dt.getDate());

    if (!(vYear && vMonth && vDay)) {
        return false;
    }

    return true;
}

/********************************************************
* Formata o campo valor
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function formataValor(campo) {
    campo.value = filtraCampo(campo);
    vr = campo.value;
    tam = vr.length;

    if (tam <= 2) {
        campo.value = vr;
    }
    if ((tam > 2)) {
        campo.value = vr.substr(0, tam - 2) + ',' + vr.substr(tam - 2, tam);
    }
}

/********************************************************
* Limpa todos os caracteres especiais do campo solicitado
*
* Autor: Banco do Brasil (...)
* E-mail: ---
*/
function filtraCampo(campo) {
    var s = "";
    var cp = "";
    vr = campo.value;
    tam = vr.length;
    for (i = 0; i < tam; i++) {
        if (vr.substring(i, i + 1) != "/" && vr.substring(i, i + 1) != "-" && vr.substring(i, i + 1) != "." && vr.substring(i, i + 1) != "," && vr.substring(i, i + 1) != "_") {
            s = s + vr.substring(i, i + 1);
        }
    }
    campo.value = s;
    return cp = campo.value;
}

/********************************************************
* "Shorthand" pra document.getElementById("azz").value
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function id(id) {
    return document.getElementById(id);
}

/********************************************************
* "Shorthand" pra document.getElementById("azz").value = xxx
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function changeValue(id, newValue) {
    document.getElementById(id).value = newValue;
}

/********************************************************
* Desabilita todos os campos da tela especificados pela string.
* A string é comparada com indexOf, então é só enviar os itens
* como "select-one, input, button,...".
*
* Caso não seja informado nada, assume o valor default de "select-one, text"
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function desabilitarElementos(types) {
    types = types || "select-one, text";

    var elements = document.forms[0].elements;

    //Desabilitando somente selects e texts
    jQuery.each(elements, function (index, element) {
        if (types.indexOf(element.type) > -1) {
            jQuery(element).attr("disabled", "disabled");
        }
    });
}

/********************************************************
* Verifica se há algo no valor enviado via param, já que
* algunas vezes um if (x == null) pode falhar pelo fato
* de que ele poderá ser x = "" e vice-versa.
* Acaba sendo necessário realizar ambas as verificações.
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function verificaValor(valor) {
    return valor != "" && valor != null;
}

/********************************************************
* Função para criar o método trim();
*
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
*/
String.prototype.trim = function () { return (this.replace(/^[\s\xA0]+/, "").replace(/[\s\xA0]+$/, "")); }

/********************************************************
* Função que verifica se há número(s) na string passada
* por parâmetro e retorna true (caso tenha) ou false.
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function possuiNumero(t) {
    var regex = /\d/g;
    return regex.test(t);
}

/*********************************************************
*Variáveis para setar os dias e meses para o datepicker do jQuery, pois ele trás o default em inglês.
*
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
*/
var dayNames    = ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado"];
var dayNamesMin = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"];
var monthNames  = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", 	
"Setembro", "Outubro", "Novembro", "Dezembro"];
var monthNamesShort = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];

/********************************************************
* Função para criar o método contains();
*
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
*/
String.prototype.contains = function (it) { return this.indexOf(it) != -1; };

/********************************************************
* Como o js será minified, a criação dos hiddens é feita
* antes do post da pagina, para nao deixar o hidden direto
* no html sujeito a alterações por Firebug.
*
* Esta função realiza a criação do hidden usando a DOM.
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function criarHidden(name, valor, parent) {
    var parent = parent || document.forms[0];

    var hdn = document.createElement("input");
    hdn.type = "hidden";
    hdn.id = name;
    hdn.name = name;
    hdn.value = valor;
    parent.appendChild(hdn);
}

/********************************************************
* Procura a ocorrencia de uma string em outra com valores separados
* por virgula. Função feita porque o contains pode não resolver
* a necessidade em casos por exemplo do número "1" ser buscado
* em uma string que há um número >= 10, retornando true quando não deveria.
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function compararValores(valores, valor) {
    var vetor_valores = valores.split(",");

    for (var i = 0; i < vetor_valores.length; i++) {
        if (vetor_valores[i] == valor) {
            return true;
        }
    }

    return false;
}
/*
Filho de pai desconhecido
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
Function que realiza a validação do CNPJ
CNPJ -> Element não o value.
*/
function ValidaCNPJ(CNPJ) {
    if (CNPJ.value != "") {
        var Status = true
        var vr = CNPJ.value;
        vr = vr.replace(/\D/g, "");
        if (parseFloat(vr) != 0) {
            Qtde = vr.length - 2;
            if (ValidacaoCNPJ(vr, Qtde) == true) {
                Qtde = vr.length - 1;
                if (ValidacaoCNPJ(vr, Qtde) == false) { Status = false; }
            }
            else { Status = false; }
        }
        else { Status = false; }
        return Status;
    }
}


/*
Filho de pai desconhecido
Alterado c/: Rauni Marques
Function complementar da ValidaCNPJ.
*/
function ValidacaoCNPJ(CNPJ, Qtde) {
    var VerCNPJ = 0; var ind = 2; var tam;
    for (f = Qtde; f > 0; f--) {
        VerCNPJ += parseInt(CNPJ.charAt(f - 1)) * ind;
        if (ind > 8) { ind = 2; }
        else { ind++; }
    }
    VerCNPJ %= 11;
    if (VerCNPJ == 0 || VerCNPJ == 1) { VerCNPJ = 0; }
    else { VerCNPJ = 11 - VerCNPJ; }
    if (VerCNPJ != parseInt(CNPJ.charAt(Qtde))) { return false; }
    else { return true; }
}

/*Function para validar o CPF*/
function ValidaCPF(CPF) {
    var soma = 0;
    var vr = CPF.value;
    vr = vr.replace(/\D/g, "");
    if (vr.length != 11 || vr == "00000000000" || vr == "11111111111" || vr == "22222222222" || vr == "33333333333" || vr == "44444444444" || vr == "55555555555" || vr == "66666666666" || vr == "77777777777" || vr == "88888888888" || vr == "99999999999") {
        return false;
    }
    for (i = 0; i < 9; i++) { soma += parseInt(vr.charAt(i) * (10 - i)); }
    resto = 11 - (soma % 11);
    if (resto == 10 || resto == 11) { resto = 0; }
    if (resto != parseInt(vr.charAt(9))) { return false; }
    soma = 0;
    for (i = 0; i < 10; i++) { soma += parseInt(vr.charAt(i) * (11 - i)); }
    resto = 11 - (soma % 11);
    if (resto == 10 || resto == 11) { resto = 0; }
    if (resto != parseInt(vr.charAt(10))) { return false; }
    return true;
}

/*
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
Function para deixa um tamanho máximo de caracteres para um textarea
Utilizado nos eventos onkeydown e onkeypress em simultaneos
*/
function MaxLengthTextArea(Campo, Tamanho) {
    if (Campo.value.length >= Tamanho) {
        Campo.value = Campo.value.substring(0, Tamanho);
    }
}

/*Shorthand
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
Function para criar o layout das box utilizadas.
*/
function CriarBox(div, titulo, grid) {
    jQuery("#" + div).sgiBox({
        titulo		  : titulo,
        headerBgImg   : headerBgImg,
        headerClass   : grid || "grid_12",
        contentClass  : grid || "grid_12"
    });
}

/********************************************************
* Função para formatar campo como moeda;
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
* USO --> return formataReais(this, '.', ',', event);
*/
function formataReais(fld, milSep, decSep, e) {

    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.charCode : e.keyCode;
    if ((whichCode == 13) || (whichCode == 0) || (whichCode == 8)) return true;

    key = String.fromCharCode(whichCode); // Valor para o código da Chave 
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida 
    len = fld.value.length;
    for (i = 0; i < len; i++)
        if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;

    aux = '';

    for (; i < len; i++)
        if (strCheck.indexOf(fld.value.charAt(i)) != -1) aux += fld.value.charAt(i);

    aux += key;
    len = aux.length;

    if (len == 0) fld.value = '';
    if (len == 1) fld.value = '0' + decSep + '0' + aux;
    if (len == 2) fld.value = '0' + decSep + aux;

    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += milSep;
                j = 0;
            }

            aux2 += aux.charAt(i);
            j++;
        }

        fld.value = '';
        len2 = aux2.length;

        for (i = len2 - 1; i >= 0; i--)
            fld.value += aux2.charAt(i);

        fld.value += decSep + aux.substr(len - 2, len);
    }

    return false;
}

/********************************************************
* Função para criar o método onlyNumber();
* -Renan: Sério?
*
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
*/
String.prototype.onlyNumber = function () { return (this.replace(/\D/g, "")); }

/********************************************************
* Função para dar o reload na grid .... shorthand
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
*/
function ReloadGrid(id) {
    jQuery("#" + id).trigger("reloadGrid");
}

/********************************************************
* Shorthand para o window.location
* Autor: Rauni Marques
* E-mail: ramarques@fazenda.ms.gov.br
*/
function Redirect(url, parametros) {
    parametros = parametros == undefined ? "" : "/" + parametros;
    window.location = content + "../" + url + parametros;
}

/*Igual a function filtra campos, porem não modifica o valor do campo somente limpa os caracteres*/
function LimpaCaracteres(campo) {
    var s = "";
    vr = campo.value;
    tam = vr.length;
    for (i = 0; i < tam; i++) {
        if (vr.substring(i, i + 1) != "/" && vr.substring(i, i + 1) != "-" && vr.substring(i, i + 1) != "." && vr.substring(i, i + 1) != "," && vr.substring(i, i + 1) != "_") {
            s = s + vr.substring(i, i + 1);
        }
    }
    return s;
}