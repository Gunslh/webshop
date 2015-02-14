<?php
class UserShoppingCartManager extends BaseEntity
{
	private $db_table = "shop_shopping_cart";
	
	public function Add($usr, $name, $prodId, $num, $unitPrice)
	{
		$all = $this->query("INSERT ".$this->db_table."(`t_pkid`, `t_usrName`, `t_prodId`, `t_num`".
				"`t_unit_price`)".
				" values ('', '$usr', '$name', '$prodId', $num', '$unitPrice')");
		if($all === false)
			return false;
		return true;
	}

	public function Get($usr)
	{
		$all = $this->query("SELECT `t_pkid`, `t_usrName`, `t_prodId`, `t_num`".
				"`t_unit_price` FROM ".
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