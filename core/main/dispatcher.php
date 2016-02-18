<?php

class dispatcher
{
	public static function dispatch($router)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		ob_start();
		$config = registry::register("config");
		$sgException = registry::register("sgException");
		
		if($router instanceof router)
		{
			$controller     = $router->getController();
            $action         = $router->getAction();
            $params         = $router->getParams();
			
			
			
		}
		else
		{
			$sgException->throwException("Router nie został znaleziony lub nie jest instancją tej klasy.");
		}
		
		$controllerfile = $config->controller_path.$controller.".php";   //application/controller/home.php (logowanie.php)
		
			
		if(!file_exists($controllerfile))
		{
			$sgException->throwException("Kontroler '".$controller."' nie został znaleziony w systemie!");
		}
		
		include_once($controllerfile);
		$sys = new $controller($params);
		
		
		//----------------------------------
		$sys->$action();
		//ma załadowane wszystkie helpery dla kontrolera i danej akcji
		//-----------------------------------------
		
		
		
		ob_start();
				
		$view = registry::register("view");
		if(!empty($sys->template)) $view->setTemplate($sys->template);
		
		$template = $view->getTemplate($action);  // action =index      template=index
		
		
		
		//controller=home
		main::_templateLoader($controller, $template);
		
		
		
	}
}

?>