<?php

class home extends controller
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
		$this->addHook($this->i18n->languageDetector());
		
		$this->main->metatags_helper;
		$this->main->head_helper;
		$this->main->loader_helper;
		$this->main->module_helper;
		$this->main->model_helper;
		$this->main->directory_helper;
		$this->main->translate_helper;
	}

		
	
}