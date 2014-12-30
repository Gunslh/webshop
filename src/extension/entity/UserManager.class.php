<?php
class UserManager extends BaseEntity
{
	private $db_table = "shop_user";
	private $userAuth;
	function __construct()
	{
		$this->userAuth = new UserAuth();
	}
	
	public function Add($usr, $pwd, $name, $tele, $zipCode, $addr)
	{
		$all = $this->query("INSERT ".$this->db_table."(`t_pkid`, `t_usrName`, `t_usrPwd`, ".
				"`t_regDate`, `t_name`, `t_telephone`, `t_zipCode`, `t_address`, `t_lastLogin`, `t_lastPurchase`, `t_status` )".
				" values ('', '$usr', '$pwd', NOW(), '$name', '$tele', '$zipCode', '$addr', NOW(), '', '".UserStats::U_REGISTER."')");
		if($all === false)
			return false;
		return true;
	}

	public function Get($usr)
	{
		$all = $this->query("SELECT `t_pkid`, `t_usrName`, `t_usrPwd`, `t_regDate`, `t_name`,".
				"`t_telephone`, `t_zipCode`, `t_address`,`t_lastLogin`, `t_lastPurchase` ,`t_status` FROM ".
				"".$this->db_table." where t_usrName='$usr';");
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return $all;
	}
	
	public function Unregister($usr)
	{
		$all = $this->query("UPDATE ".$this->db_table.' set t_stats = "'.$U_UNREGISTER.'"
				 where t_usrName="'.$usr.'" and t_stats = "'.$U_REGISTER.'" ;');
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return $all[0];
	}
	public function Auth($usr, $pwd)
	{		
		return $this->userAuth->Auth($usr, $pwd);
	}

	public function CheckUserExists($usr)
	{
		return $this->userAuth->CheckUserExists($usr);
	}
}
?>