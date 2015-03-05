<?php
class AdminEntity extends BaseEntity
{
	const TABLE_NAME = "shop_user";
	
	public function auth($usr, $pwd)
	{
		$all = $this->query("SELECT count(1) as count FROM ".self::TABLE_NAME.' where t_name="'.$usr.'" and t_pwd="'.$pwd.'";');
		
		if($all === false)
			return false;
		return $all[0]->count;
	}
	
	public function get($usr)
	{
		$all = $this->query("SELECT * FROM ".self::TABLE_NAME.' where t_name="'.$usr.'";');
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return $all[0];
	}
}

?>
