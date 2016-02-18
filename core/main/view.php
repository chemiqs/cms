<?php


class view
{
	private $vars = array();
	private $template;
	
	public function __get($var)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		return registry::register($var);
		
	}
	
	
	public function __set($key, $val)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		
		$this->vars[$key]=$val;
	}
	
	
	public function setTemplate($template)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->template = $template;
	}
	
	public function getTemplate($controller=null)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		
		return (empty($this->template)) ? $controller : $this->template;	
	}
	
	
	public function addExternalView($controller, $view="index")
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$config = registry::register("config");
		$filepath = $config->view_path.$controller."/".$view.".php";
		
		if(file_exists($filepath)) include_once($filepath);
		
	}
	
	
	
	
}

