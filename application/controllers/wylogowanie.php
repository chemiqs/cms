<?php

class wylogowanie extends controller
{

	public function __call($method, $args)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		
		if(!is_callable($method))
		{
			$this->sgException->errorPage(404);
		}
	}
	
	public function main()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		
	}
	
	
	public function index()
	{
		
		$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';

		$this->main->model_helper;

	}

		
	
}