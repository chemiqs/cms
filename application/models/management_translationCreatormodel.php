<?php

class management_translationCreatormodel
{
	private $__config;
	private $__router;
    private $__params;
    private $__db;
	
	public function __construct()
	{
		$this->__config = registry::register("config");
		$this->__router = registry::register("router");
        $this->__params = $this->__router->getParams();
        $this->__db = registry::register("db");
		
		$_errObject=registry::register("sgException");
		if(isset($this->__params[0]) && isset($this->__params['POST']['newTranslation'])) $this->_addNewTranslation();
		
		
	}
	



	private function _addNewTranslation()
	{
		
		
		
		$name = "tr_".$this->__params['POST']['name'];	//$name = tr_nazwa-z-inputu
		
		unset($this->__params['POST']['newTranslation'],$this->__params['POST']['name']);
		
		//tworzymy nową tabelę w DB
		$this->__db->execute("create table {$name} (id int(11) not null auto_increment primary key,
													lang varchar(10) not null)
									engine=myisam character set utf8 collate utf8_polish_ci");
									
		
		//2 stosy dla POST
		$id_stack=array();
		$lang_stack = array();
		foreach($this->__params['POST'] as $key => $val)
		{
			//stripos - czy w elemencie KEY znajduje sie ID
			if((stripos($key, 'id')!==false) && (!empty($val)))
			{
				$id_stack[] = $val;
			}
			elseif((stripos($key, 'lang')!==false) && (!empty($val)))
			{
				$lang_stack[]=$val;	
			}
		}
		
		
		
		if((!empty($id_stack)) && (!empty($lang_stack)))
		{
			//dodajemy wiersze czyli LANG
			foreach($lang_stack as $key=>$val)
			{
				$this->__db->execute("INSERT INTO {$name} VALUES (NULL, '{$val}')");
			}
			
			//dodajemy kolumny CZYLI ID
			foreach($id_stack as $key=>$val)
			{
				$this->__db->execute("ALTER TABLE $name ADD $val LONGTEXT NOT NULL");
			}
			
		}
		else
		{
			return false;	
		}
		
		
		
	}



	
}