/* -------------------------------------------------------------------------- 
 *  app_site Cojunto de Funções  JavaScript do site , version 0.1
 *  (c) 2010-2011 Axel Alexander
 *
 * 
 --------------------------------------------------------------------------*/

var base_url       = 'http://localhost/sysagroweb/public/';
var texto_deletar  = "Deseja relamente excluir o registro";
var $divPagina     = "";
var $divWindow     = "";

/*************************************************
* Js alert confirm
*************************************************/
function JsconfirmDelete(){
    var agree=confirm(texto_deletar+" ? ");
    if (agree)
         return true ;
    else
         return false ;
}


/*************************************************
* limpa campos ao clicar
*************************************************/
function LimpaCampoText(field){
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

/*************************************************
* metodo GET para gerar o relatorio em pdf
************************************************/
function administrador(){
   document.location  = base_url+'Auth';
   return true;
}

/********************************************************
* "Shorthand" pra document.getElementById("azz").value
*
* Autor: Renan Siravegna
* E-mail: rsmoreira@fazenda.ms.gov.br
*/
function retornaElementById(id) {
    return document.getElementById(id).value;
}


/********************************************************
* Função que recarrega a pagina
* Autor  : Axel alexander
* E-mail : axbenites@fazenda.ms.gov.br
*/
function recarregaPagina() {
    location.reload();
    //window.location.reload();
}

/********************************************************
* Função que redireciona a pagina
* Autor  : Axel alexander
* E-mail : axbenites@fazenda.ms.gov.br
*/
function RedirecionaPagina(url){
	window.location = url;
}
