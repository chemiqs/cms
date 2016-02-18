<?php
Abstract class controller
{
	
	public $params;
	public $post;
	public $template;
	public $_ActionHooks = array();

	abstract public function main();


	public function __construct($params=array())
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->params = $params;
	}
	
	

	public function __get($var)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'   --------------->>>>>>>>>>  VAR: '.$var.'<br/>';
		if($var=='params')
		{
			return $this->params;
		}
		else
		{
			
			return registry::register("$var");	
		}
	}
	
	
	
	public function addSubpage($view, $subpage)
	{
		
		$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		
		if(isset($this->params[0]))
		{
			if($this->params[0]==$subpage)
			{
				$templatefile=$view."_".$this->params[0];	
				$this->view->setTemplate($templatefile);
				$this->model->$templatefile;
			}
		}
	}
	
	
	public function setParams($params)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->params[]=$params;
	}
	
	public function setPostParams($post)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->post=$post;	
		
	}
	
	
	public function setView($view)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->template=$view;
	}
	
	
	public function addHook($callbackFunc)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->_ActionHooks[$callbackFunc]=$callbackFunc;
	}
	
	
	
	
	public function getActionHooks()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		return 	$this->_ActionHooks;
	}
	
	
	
}