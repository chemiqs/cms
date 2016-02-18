<?php

class nullmodel
{
	public function __contruct($model)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		return $model;	
	}
	
}
