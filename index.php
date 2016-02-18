<?php
ob_start();
if(!isset($_SESSION)) session_start();
$_SESSION['error']="<br/><br/>SESSION:<br />";
$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';


require_once("core/init.php");					// __autoload()
$router = registry::register("router");
dispatcher::dispatch($router);

$i18n = registry::register("i18n");
$i18n->setMainLanguage();

//unset ($_SESSION['error']);
//print_r ($_SESSION['error']);

ob_end_flush();
?>