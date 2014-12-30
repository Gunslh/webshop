<?php
class AdminUser extends BaseEntity
{
	private $db_table = "shop_admin";
	
	public function Auth($usr, $pwd)
	{
		$all = $this->query("SELECT count(1) as count FROM ".$this->db_table.' where t_name="'.$usr.'" and t_pwd="'.$pwd.'";');
		
		if($all === false)
			return false;
		return $all[0]->count;
	}
	
	public function Get($usr)
	{
		$all = $this->query("SELECT * FROM ".$this->db_table.' where t_name="'.$usr.'";');
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return $all[0];
	}
}

?>