<?php

//error_reporting(E_ALL);
$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
if(!isset($_SESSION)) session_start();

set_include_path(get_include_path() . PATH_SEPARATOR . 'core/test');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/main');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/drivers');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/helpers');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/library');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/library/Utils');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/interfaces');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/i18n');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/errors');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/models');
set_include_path(get_include_path() . PATH_SEPARATOR . 'application/controllers');
set_include_path(get_include_path() . PATH_SEPARATOR . 'application/models');
set_include_path(get_include_path() . PATH_SEPARATOR . 'application/views');

function __autoload($name)
{
	include_once($name.".php");
	
}


?>