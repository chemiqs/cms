<?php
class translator extends i18n
{
	private function assemblyName($obj)
	{
		if(is_object($obj))
		{
			return get_class($obj);
		}
		else if(is_string($obj))
		{
			return $obj;
		}
		else
		{
			return ;
		}
	}
	
	
	
	
	public function translate($subject, $view)
	{
		//subject - to jest TEKST1 - czyli tekst jaki ma wyciągnać funkcja z DB - nazwa kolumny do której sie chcemy odwołać
		//View - połączenie kontrolera z nazwą widoku czyli HOME_INDEX
		
		$view = $this->assemblyName($view);
		
		$db = registry::register("db");
		$sgExecption = registry::register("sgException");
		$conf = registry::register("config");
		
				
		$query = "SELECT {$subject} FROM tr_{$view} WHERE lang='{$this->getDefaultLanguage()}'";
		//echo $query; exit;
		
		$query = $db->execute($query);
		
		
		
		if($conf->no_lang_action == "SET_404")
		{
			if(!$query) $sgExecption->errorPage(404);
		}
		else if($conf->no_lang_action = "SET_ERROR_TEXT")
		{
			if(!$query) return $conf->no_lang_error_text;
		}
		else
		{
			if(!$query) return ;	
		}
		
		return $query[0][$subject];
		
		
		
	}
	
	
	
	
	
	
	
	
	
}


























