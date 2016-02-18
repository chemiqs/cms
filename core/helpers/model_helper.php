<?php
define("MODEL", true);//sprawdzamy w core/main/main.php

function model_load($model, $method='', $params=array())
{
	
	$model = registry::register($model);
	
	if(!empty($method))
	{
		$method = $model->$method($params);	
	}
	
	return $method;
	
}

