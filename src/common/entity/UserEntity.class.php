<?php
class UserEntity extends BaseEntity
{
	const TABLE_NAME = "shop_user";
	function __construct()
	{
	}

	public function add($usr, $pwd, $name, $tele, $zipCode, $addr)
	{
		$all = $this->query("INSERT ".self::TABLE_NAME."(`t_pkid`, `t_usrName`, `t_usrPwd`, ".
				"`t_regDate`, `t_name`, `t_telephone`, `t_zipCode`, `t_address`, `t_lastLogin`, `t_lastPurchase`, `t_status` )".
				" values ('', '$usr', '$pwd', NOW(), '$name', '$tele', '$zipCode', '$addr', NOW(), '', '".UserStats::U_REGISTER."')");
		if($all === false)
			return false;
		return true;
	}

	public function get($usr)
	{
		$all = $this->query("SELECT `t_pkid`, `t_usrName`, `t_usrPwd`, `t_regDate`, `t_name`,".
				"`t_telephone`, `t_zipCode`, `t_address`,`t_lastLogin`, `t_lastPurchase` ,`t_status` FROM ".
				"".self::TABLE_NAME." where t_usrName='$usr';");
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return $all;
	}
	
	public function unregister($usr)
	{
		$all = $this->query("UPDATE ".self::TABLE_NAME.' set t_stats = "'.$U_UNREGISTER.'"
				 where t_usrName="'.$usr.'" and t_stats = "'.$U_REGISTER.'" ;');
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return $all[0];
	}

	public function auth($usr, $pwd)
	{
		$all = $this->query("SELECT count(1) as count FROM ".self::TABLE_NAME.' where t_usrName="'.$usr.'" and t_usrPwd="'.$pwd.'";');
		
		if($all === false)
			return false;
		return $all[0]->count;
	}
	
	public function checkUserExists($usr)
	{
		$all = $this->query("SELECT * FROM ".self::TABLE_NAME.' where t_usrName="'.$usr.'";');
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return true;
	}
}
?>
