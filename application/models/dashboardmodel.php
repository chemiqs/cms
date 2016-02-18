<?php


class dashboardmodel
{
	private $__config;
    private $__router;
    private $__db;
    private $__params;
	
	public function __construct()
	{
		$this->__config = registry::register("config");
        $this->__router = registry::register("router");
        $this->__db = registry::register("db");
		$this->__params = $this->__router->getParams();
	}
	
	
	
	public function getCredentials()
	{
		$q = $this->__db->execute("Select imie, nazwisko from administrator 
		where nick='{$_SESSION[$this->__config->default_session_admin_auth_var]}' LIMIT 1");
		
		return $q[0]['imie'].' '.$q[0]['nazwisko'];
	}
	
	
	
	public function getTranslationsCount()
	{
		$q = $this->__db->execute("show tables");	
		$bufor = array();
		
		foreach($q as $val)
		{
			if(substr($val['Tables_in_'.$this->__config->db_name], 0, 3)=="tr_")   
			{
				$bufor = $val;
			}
		}
		
		return count($bufor);
	}
	
	
	
	public function getUsersCount()
	{
		$q = $this->__db->execute("SELECT count(*) as count from users");	
		return $q[0]['count'];
	}
	
	
	
	public function getAdminsCount()
	{
		$q = $this->__db->execute("SELECT count(*) as count from administrator where privileges='admin'");	
		return $q[0]['count'];
	}
	
	
	
	public function getAllElements($array)
	{
		$res = "<ul>";
		
		foreach($array as $k=>$v)
		{
			$res.="\t<li>{$k} : [".count($v) ."]</li>";
		}
				
		$res .= "</ul>";
	
	return $res;
	}
	
	
	
	
	
	
	
	
	
	
	
	
}