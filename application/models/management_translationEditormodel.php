<?php

class management_translationEditormodel
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
		
		if(!isset($this->__params[1])) $_errObject->errorPage(404);
		if(!$this->_validateTablename($this->__params[1])) $_errObject->errorPage(404);
		if(isset($this->__params[2]) && !$this->_validateColumnname($this->__params[2])) $_errObject->errorPage(404);	
		
	}
	


	private function _validateTablename($name)
	{
		$q = $this->__db->execute("select * from ".addslashes($name));
		
		return !empty($q);		
	}
	
	
	
	private function _validateColumnname($column)
	{
		$q = $this->__db->execute("select ".$column." from ".$this->__params[1]);
		
		return !empty($q);		
	}
	
	
	public function getTranslationSubject()
	{
		return str_replace("_", " ", substr($this->__params[1],3));	
	}
	
	
	
	private function getTranslationId($tbl_name)
	{
		$q = $this->__db->execute("SHOW COLUMNS IN $tbl_name");
		$bufor=array();
		
		foreach($q as $val)
		{
			if($val['Field']!="id" && $val['Field']!="lang")
				$bufor[]=$val['Field'];
			
		}
		
		return $bufor;
	}
	
	
	
	public function getTranslationButtonIDs()
	{
		
		$res="";
		$nextCol = count($this->getTranslationId($this->__params[1]))+3;
		
		foreach($this->getTranslationId($this->__params[1]) as $key=>$val)
		{
			$res.='<div id="customLinkBtn" clas="_m5 customInlineBtn">
				<a href="'.SERVER_ADDRESS.'administrator/management/translationEditor/'.$this->__params[1].'/'.$val.'">'.$val.'</a></div>';
		}
		
		$res .= '<div id="customLinkBtn" class="_m5 customInlineBtn"><a href="javascript:addNewtranslationID(\''.$this->__params[1].'\', \'tekst'.$nextCol.'\');">+ DODAJ NOWY</a></div>';
		
		return $res;
		
	}
	
	
	
	public function getTranslationEditors()
	{
		$langs = $this->getAvailableLangs($this->__params[1]);
		
		$res = "";
		
		foreach($langs as $key => $lang)
		{
			if($this->__params[2])
			{
				$res .= '
			<p>Język tłumaczenia: <strong>'.strtoupper($lang).'</strong></p>
			<textarea class="codeMirrorArea" id="code'.$key.'" name="'.$lang.'">'.$this->getTranslationText($lang).'</textarea><br />
			<br />';
			}
		}
		
		return $res;
	}
	
	
	
	private function getAvailableLangs($tbl_name)
	{
		$res = Array();
		$q = $this->__db->execute("SELECT DISTINCT lang FROM $tbl_name");
		
		if(!empty($q))
		{
			foreach($q as $lang)
			{
				$res[] = $lang['lang'];
			}
		}
		
		
		
		return $res;
	}
	
	
	
	
	private function getTranslationText($lang)
	{
		if(!isset($this->__params[2]))
		{
			$col = $this->getTranslationID($this->__params[1]);
		}
		else
		{
			$col = $this->__params[2];
		}
		
		$q = $this->__db->execute("SELECT $col FROM {$this->__params[1]} WHERE lang = '{$lang}'");
		
		return $q[0][$col];
	}
	
	
	public function getTranslationInfoLoc()
	{
		return $this->__params[1].";".$this->__params[2];
	}
	
}