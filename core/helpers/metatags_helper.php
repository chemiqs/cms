<?php
$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';


define("METATAGS",true);  //sprawdzamy w core/main/main.php



function add_metatags($name="")
{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';

	$_meta = registry::register("metatags", $name);
	$res = $_meta->_load();
	
	if($res)
	{
		$_res="";
		unset($res[0]['id'], $res[0]['meta_tags_id'], $res[0]['name']);
		
		foreach($res[0] as $key=>$val)
		{
			if(strtoupper($key) =="CONTENT_TYPE")
			{
				$_res.="<meta http-equiv=\"content-type\" content=\"text/html; charset=" .$val."\" />\n";	
			}
			else
			{
				$_res.="<meta name=\"".str_replace("_","-",$key)."\" content=\"" .$val."\" />\n";
			}
		}
		return $_res;
	}

	return ;


}