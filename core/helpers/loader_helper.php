<?php
define('LOADER', true);

function stylesheet_load($files)
{
	if(isset($files))
	{
		$echo="";
		$files = explode(",",$files);
		
		foreach($files as $file)
		{
			$file = trim($file);
			$file = str_replace("/", "__", base64_encode($file));
			$echo.="<link rel=\"stylesheet\" type=\"text/css\" href=\"cScript/".$file."\" />\n";
		}
		return $echo;
	}
	else
	{
		return "Nie podano nazw arkuszy styli";
	}
	
}




function javascript_load($files)
{
	if(isset($files))
	{
		$echo="";
		$files = explode(",",$files);
		
		foreach($files as $file)
		{
			$file = trim($file);
			$file = str_replace("/", "__", base64_encode($file));
			$echo.="<script type=\"text/javascript\" src=\"jScript/".$file."\"></script>\n";
		}
		return $echo;
	}
	else
	{
		return "Nie podano nazw plikow JS";
	}
	
}




function add_javascript($file)
{
	$res="";
	if (file_exists($file)) $res="<script type=\"text/javascript\" >\n".file_get_contents($file)."\n</script>\n";
	return $res;	
}























