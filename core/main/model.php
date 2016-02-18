<?php

class model
{
	
	public function __get($model)
	{
		$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		
		$config = registry::register("config");
		$_model = $model.'model';
		$modelfile = $config->model_path.$_model.".php";  //app/models/
		
		if(!file_exists($modelfile))
		{
			$modelfile="core/models/nullmodel.php";
			$_model = "nullmodel";	
		}
		
		include_once($modelfile);
		
		$modelobj = registry::register("$_model");
		return $modelobj;
	}
	
	
	
	
}