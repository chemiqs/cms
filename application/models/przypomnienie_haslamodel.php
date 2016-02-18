<?php

class przypomnienie_haslamodel
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
	
	
	//update hasla w DB
	private function updateUserPasswd ($LOGIN, $newPw)
	{
		
		$query = $this->__db->execute("UPDATE users SET password = '{$newPw}' WHERE username='{$LOGIN}'");
		return $query;
	}
	
	
	
		//wyszukiwanie usera w tabeli users po mailu
	private function isExistByLoginMail ($LOGIN, $MAIL)
	{
		
		$query = $this->__db->execute("select * from users where username='{$LOGIN}' and mail='{$MAIL}' LIMIT 1");
		return $query;
	}
	
	
	//metoda zwraca true lub false w przypadku kiedy użytkownik istnieje lub nie istnieje
	private function lostPaswword ($LOGIN, $MAIL)
	{
		
		if($this->isExistByLoginMail($LOGIN, $MAIL)&& count($this->isExistByLoginMail($LOGIN, $MAIL))>0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	
	
	public function getContent()
	{
		$content="";
		
		if(isset($this->__params['POST']['nick']))
		{
			$content.='<div class="box-artykuly produkty-opis"><img src="'.directory_images().'naglowek1-lostpw.jpg" alt="HEADER" id="lostpw-header" />';	
			if($this->lostPaswword($this->__params['POST']['nick'], $this->__params['POST']['mail']))
			{
				$signs = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '@', '#', '$', '%', '&', '*');
				$newPw = '';
				for($i=0; $i<=8; $i++)
				{
					$newPw.=$signs[rand(0, count($signs))];
				}
				
				if($this->updateUserPasswd($this->__params['POST']['nick'], md5($newPw)))
				{
					$content.= '<h3>Twoje hasło zostało zresetowane.</h3><p>Nowe hasło to: '.$newPw.'</p><br><br>';
				}
				else
				{
					$content.='Niestety nie udało się zresetowac hasła - spróbuj ponownie później.';
				}
				
				
			}
			else
			{
				$content.='Brak użytkownika w bazie';
			}
			$content.='</div>';
		}
		else
		{
			$content.='
				<div class="box-artykuly produkty-opis">
					
						<img src="'.directory_images().'naglowek1-lostpw.jpg" alt="HEADER" id="lostpw-header" />
						<div id="lostpw-tools" class="formularz">
						
							<form name="lostpw-form" id="lostpw-form" action="" method="POST">
						
						<table class="objTable">
							
							<tbody>
								
								<tr>
									<td><span class="star">*</span> Podaj nick:</td>
									<td><input type="text" value="" name="nick" class="required" minlength="5" maxlength="25" /></td>
									<td></td>
								</tr>
								
								<tr>
									<td><span class="star">*</span> Twój e-mail:</td>
									<td><input type="text" value="" name="mail" class="required email" /></td>
									<td></td>
								</tr>
								
							</tbody>
							
						</table>
						
						   <br /><br />
						   
						   <input type="submit" name="submit-form" class="submit-form" value="Przypomnij" />
						   <input type="reset" name="submit-form" class="reset-form" value="Reset" /><br class="clear" />
						   </form>
						   
						   <br /><br />
						
						</div>
						
					</div>
			';
		}
		
		return $content;
		
	}
	
	
	
	
}

?>