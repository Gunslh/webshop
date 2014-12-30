<?php
class UserAuth extends BaseEntity
{
	private $db_table = "shop_user";
	
	public function Auth($usr, $pwd)
	{
		$all = $this->query("SELECT count(1) as count FROM ".$this->db_table.' where t_usrName="'.$usr.'" and t_usrPwd="'.$pwd.'";');
		
		if($all === false)
			return false;
		return $all[0]->count;
	}
	
	public function CheckUserExists($usr)
	{
		$all = $this->query("SELECT * FROM ".$this->db_table.' where t_usrName="'.$usr.'";');
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return true;
	}
}
?>