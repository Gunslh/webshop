<?php
class UserAddrManager extends BaseEntity
{
	private $db_table = "shop_user_addr";
	
	public function Add($usr, $name, $contry, $tele, $zipCode, $area, $flag)
	{
		$all = $this->query("INSERT ".$this->db_table."(`t_pkid`, `t_usrName`, `t_name`, `t_countrycode`".
				"`t_telephone`, `t_zipCode`, `t_area`, `t_address`, `t_flag`)".
				" values ('', '$usr', '$name', '$contry', $tele', '$zipCode', ".
				"'$area', '$flag')");
		if($all === false)
			return false;
		return true;
	}

	public function Get($usr)
	{
		$all = $this->query("SELECT `t_pkid`, `t_usrName`, `t_name`, `t_countrycode`".
				"`t_telephone`, `t_zipCode`, `t_area`, `t_address`, `t_flag` FROM ".
				"".$this->db_table." where t_usrName='$usr';");
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return $all;
	}
	
	public function Del($pkid)
	{
		$all = $this->query("DELETE FROM ".
				"".$this->db_table." where t_pkid ='$pkid';");
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return $all;
	}
}
?>