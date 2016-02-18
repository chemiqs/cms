<?php
$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
if(!isset($_SESSION)) session_start();

echo "Obsługa błędów! <br />";
echo "<pre>";
echo ($_SESSION['debug']);
echo "<pre><br><hr><br>";


if(isset($_SESSION['debug']))
{
	echo base64_decode($_SESSION['debug']);	
}
