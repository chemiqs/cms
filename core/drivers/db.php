<?php


class db
{
	
	public $result = array();
	private $connect;
	
	
	
	public function	__construct($_host=false, $_user=false, $_pass=false, $_name=false)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$config = registry::register("config");
		
		$host = $config->db_host;
        $user = $config->db_user;
        $pass = $config->db_pass;
        $name = $config->db_name;	
		
		if(!isset($host))
		{
			$host = $_host;
            $user = $_user;
            $pass = $_pass;
            $name = $_name;	
		}
		
		if($host === false)
		{
			die("Nie przekazano danych dostepowych do bazy!");
		}
		
		$this->connect = new MySQLi($host, $user, $pass, $name);
		if(mysqli_connect_errno()!==0)
		{
			throw new Exception("Błąd połączenia z bazą danych: ".mysqli_connect_error());	
		}
		else
		{
			$this->connect->query("SET NAMES 'utf8'");
			return $this->connect;
		}
		
	}
	
	
	
	public function execute($sql)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$query_arr = explode(" ", trim($sql));
		$query_type = strtoupper($query_arr[0]);
		
		if($query_type == 'SELECT' || $query_type == 'SHOW')
		{
			return $this->selectable($sql);
		}
		else if($query_type == 'UPDATE' || $query_type == 'DELETE' || $query_type == 'DROP' || $query_type == 'INSERT' || $query_type == 'ALTER' || $query_type == 'CREATE')
		{
			return $this->modifiable($sql);
		}
		
		return false;
		
	}
	
	
	
	private function selectable($query)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->result = array();
		
		$wynik = $this->connect->query($query);
		if(!$wynik)
		{
			return false;
		}
		else
		{
			while (($db_result = $wynik->fetch_assoc()) !== null)
			{
				array_push($this->result, $db_result);
				//$this->result[] = $db_result;
			}
			
			return $this->result;
		}
		
		$this->close();
	}
	
	private function modifiable($query)
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->result = array();
		
		$wynik = $this->connect->query($query);
		return (!($wynik)) ? false : true;
	}
	
	
	
		public function getRow()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$row = mysqli_fetch_row($this->result);
		return $row;
	}
	
	public function count()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$count = count($this->result);
		return (!$count || !is_int($count)) ? 0 : $count;
	}
	
	public function close()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		if($this->connect) mysqli_close($this->connect);
	}
	
	public function __destruct()
	{$_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>';
		$this->close();
	}
	
	
	
	
}