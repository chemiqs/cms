<?php
class config
{
	private $config;
	
	public function __construct()
	{//$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
	
	
		if(!file_exists("core/config/configs.php"))
		{
			include_once("../../../core/config/configs.php");	
		}
		else
		{
			include_once("core/config/configs.php");	
		}
		
		
		if(isset($configs)) $this->config=$configs;
		
	}
	
	
	public function __get($var)
	{//$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		return $this->config[$var];
	}
}

