<?php

class managementmodel
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
	}
	
	
	
	
	public function getTranslationsTables() //zwraca tabele nazw tabel w DB z przedrostkiem "tr_"
	{
		$q = $this->__db->execute("show tables");	
		$bufor = array();
		
		foreach($q as $val)
		{
			
			if(substr($val['Tables_in_'.$this->__config->db_name], 0, 3)=="tr_")   
			{
				$bufor[] = $val['Tables_in_'.$this->__config->db_name];
			}
		}
		
		return $bufor;
	}
	
	
	
	private function getAvailableLangs($tbl_name)
	{
		$q = $this->__db->execute("select distinct(lang) from {$tbl_name}");
		if(empty($q))
		{
			return ;
		}
		else
		{
			foreach($q as $lang)
			{
				$res[] = "<img src=\"".directory_images()."flags/".strtolower($lang['lang']).".png\" alt=\"".$lang['lang']."\" />";
			}
		}
		
		return $res;
	}
	
	
	
	
	
	
	public function drawTranslationsTable()
	{
		$res = '<table class="text wideTable">
                        <tr class="legend">
                            <td>Nazwa</td>
                            <td class="sec">ID tłumaczenia</td>
                            <td class="thd">Języki strony</td>
                            <td>Funkcje</td>
                        </tr>';
						
		$langs = Array();
		
		$tbls = $this->getTranslationsTables();
		
		
		foreach($tbls as $tbl)
		{
			$cols = "";
			$res .= '<tr class="content">
                        <td><strong>'.str_replace("_", "/", substr($tbl, 3)).'</strong></td>';
			
			$q = $this->__db->execute("SHOW COLUMNS IN $tbl");
			
			foreach($q as $key => $val)
			{
				if($val['Field'] != "id" && $val['Field'] != "lang")
				{
					$cols .= $val['Field'].", ";
				}
			}
			
			$res .= "<td>".rtrim($cols, ", ")."</td>";
            $res .= "<td>".implode("&nbsp;", $this->getAvailableLangs($tbl))."</td>";
			$res .= '<td>
						<input type="submit" value="Edycja" 
								onclick="window.location.replace(\''.SERVER_ADDRESS.'administrator/management/translationEditor/'.$tbl.'\');" class="customBtn editBtn _m5" />
                         <input type="submit" value="Usuń" onclick="removeTranslation(\''.$tbl.'\');" 
						 											class="customBtn removeBtn _m5" />
					</td>
                    </tr>';
		}

		$res .= "</table>";
		
		return $res;
	}
	
	
	
	
}