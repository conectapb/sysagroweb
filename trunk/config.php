<?php

//if ( ! defined('BASE_URL')) exit('No direct script access allowed');
/**
* declaração de constates para configiraçoes de banco
* SITE:/
* @todo DECLARAÇÃO DE CONSTANTES PARA CONEÇÃO COM O BANCO DE DADOS
* @return 
*/
define( "DATABASE_SERVER1",   "mysql.webcindario.com" );
define( "DATABASE_NAME1",     "axelalexander" );
define( "DATABASE_USERNAME1", "axelalexander" );
define( "DATABASE_PASSWORD1", "766312" );

define( "DATABASE_SERVER",   "localhost" );
define( "DATABASE_USERNAME", "root" );
define( "DATABASE_PASSWORD", "" );
define( "DATABASE_NAME",     "mestre" );


# TITULOS 
/**
* declaração de constates PARA LABEL STATICOS
* @todo labels da aplicação para titulos
* @return titulos string
*/
define('TITULO_LOGIN', 'Axel Alexander - ::&Aacute;rea Restrita - Identifique-se ::');
define('TITULO_AREA_RESTRITA', 'Axel Alexander - &Aacute;rea Restrita');
define('TITULO_SITE', 'Axel Alexander :: Web Developer ::');
define('TITULO_WS', 'Axel Alexander Web Services ');
define('TITULO_MOB', 'Axel Alexander :: Web Version Mobile ::  ');


# BASE URL 
/**
* declaração de constates BASE_URL
* SITE: http;//localhost/axelalexander/
* @todo caminho da aplicação
* @return http://localhost/axelalexander/
*/
define('BASE_URL'    , 'http://localhost/axelalexander/');
define('BASE_UR1L'   , 'http://www.axelalexander.webcindario.com/');
define('BASE_DEV'    , 'http://axeldeveloper.atspace.eu/');
define('BASE_MOBILE' , 'http://localhost/axelalexander/mobile/');

define('TARGET1', 'http://localhost/axelalexander/');
define('TARGET', 'http://www.axelalexander.webcindario.com/');



# COMPONENTES CSS - THEME
/**
* @todo declaração de constates - caminho para css js jquery imagens flash json ajax etc
* @return http://www.axelalexander.webcindario.com/web-files/
*/
define('BASE_FILES', BASE_URL . 'web-files/');
define('BASE_THEME', BASE_URL . 'web-files/ui-themes/');
define('BASE_PLUG' , BASE_URL . 'web-files/plugin/');
define('BASE_CSS'  , BASE_URL . 'web-files/css/');
define('BASE_JS'   , BASE_URL . 'web-files/js/');
define('BASE_JQ'   , BASE_URL . 'web-files/jquery/');
define('BASE_JQG'  , BASE_URL . 'web-files/jqGrid/');
define('BASE_JQX'  , BASE_URL . 'web-files/jqwidgets/');
define('BASE_JQUI' , BASE_URL . 'web-files/jquery-ui/');
define('BASE_MOB'  , BASE_URL . 'web-files/jquery-mobile/' );
define('BASE_IMG'  , BASE_URL . 'web-files/images/');
define('BASE_AJAX' , BASE_URL . 'web-files/ajax/');
define('BASE_FLASH', BASE_URL . 'web-files/flash/');
define('BASE_UTIL' , BASE_URL . 'web-files/uteis/');
define('BASE_CK'   , BASE_URL . 'web-files/ckeditor/');


#  MVC
/**
* @todo declaração de constates  para aplicação MVC 
* @return system/config/
*/
define('CONFIG'     , 'system/config/');
define('CONTROLLERS', 'system/controller/');
define('VIEWS'      , 'system/view/');
define('VO'         , 'system/vo/');
define('MODELS'     , 'system/model/');
define('HELPERS'    , 'system/helper/');
define('LIBRARY'    , 'system/libs/');
define('VALIDATIONS', 'system/validations/');
define('ROTA'       , 'system/config/');
define('ERRO_401'   , 'system/error/');
define('BASEL_SQL'  , 'SQL/');
define('EXT'        , '.php');
define('SEPARATOR'  , '/');
define('MYSQLDB_CHARACTERSET', 'utf8');


?>