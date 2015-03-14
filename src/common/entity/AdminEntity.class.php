<?php include_once dirname(__FILE__).'/BaseEntity.class.php';?>
<?php
class AdminEntity extends BaseEntity
{
	const TABLE_NAME = "shop_admin";
	
	public function auth($usr, $pwd)
	{
	    $sql = "select count(1) as count FROM shop_admin where t_name='$usr' and t_pwd='$pwd'";
		$all = $this->query($sql);
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
