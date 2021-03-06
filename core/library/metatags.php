<?php


class metatags
{
	private $_config;
	private $_router;
	private $_db;
	private $__view;
		

		
	public function __construct($name=null)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->_config = registry::register("config");	
		$this->_router = registry::register("router");
		$this->_db = registry::register("db");
		
		$this->__view = (empty($name)) ? $this->_config->default_meta_tags_index : $name;
	}
	
	
	
	public function _load()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		
		
		$query = "SELECT * FROM meta_tags, meta_tags_index
		 	WHERE meta_tags.id = meta_tags_index.meta_tags_id
			AND meta_tags_index.name='{$this->__view}'";
	
		$query = $this->_db->execute($query);
	
		return $query;
	}
	
}