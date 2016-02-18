<?php
class main
{
	static public function _templateLoader($controller, $template)
	{	
		$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$config = registry::register("config");
		$templatefile = $config->view_path.$controller."/".$template.".php"; //$configs['view_path'] = "application".DS."views".DS;
		
		
		if(file_exists($templatefile))
		{
			include_once($templatefile);
		}
		else
		{
			$error = registry::register("sgException");
			
			$error->throwException("Widok ". $template.".php jest niedostępny");
		}
	}
	
	
	
	public function __get($name)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.", PARAM __GET: ".$name.'<br/>';
		
		$arr = explode("_", $name);
		$filename = $arr[0]."_".$arr[1].".php";
		$type = $arr[1];
		include_once($filename);
		
		if(!defined(strtoupper($arr[0])))
		{
			throw new Exception("Błąd wczytania pliku {$filename}!");
		}
		
		
	}
	
	

	
	
}