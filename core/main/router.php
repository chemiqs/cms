<?php


class router
{
	
	private	$controller;
	private $action;
	private $params=array(); //tablica parametrów
	
	
	public function __construct()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		
		$config = registry::register("config");
		
		if(!isset($_GET['page']))
		{
			$path = $config->default_controller; //w $path mamy na wstępie wartość "home"
		}
		else
		{
			$path=$_GET['page'];
		}
		
		
		$routParts = explode("/", $path);

		$this->controller=$routParts[0];
		$this->action = (isset($routParts[1])) ? $routParts[1] : "index";
		
		
		array_shift($routParts);
		array_shift($routParts);
		
		$this->params=$routParts;
		
		
		
		$_SESSION['error'].='==================================================================<br/>';
		$_SESSION['error'].="CONTROLLER: ".$this->controller.", ACTION: ".$this->action.'<br/>';
		$_SESSION['error'].='==================================================================<br/>';
		
	}
	
	
	
	
	public function getController()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		return $this->controller;	
	}
	
	
	
	
	public function getAction()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		return $this->action;	
	}
	
	
	
	
	public function getParams()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		if (isset($_POST) && count($_POST)>0)
		{
			foreach($_POST as $key=>$val)
			{
					$this->params['POST'][$key]=$val;
					
			}
		}
		/*echo"<pre>";
		print_r($this->params);
		echo"</pre>";*/
		return $this->params;
	}
		
}