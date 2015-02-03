<?php
class Address extends ItemObject
{
	public $user;
	function __construct(){
		$this->tableName = "shop_address";
	}
	
	function FindById($id)
	{
		self::Select($id);
		$this->user = new User();
		$this->user->FindById($this->info->fk_usrId);
		
	}
	
	function SelectAllAddress()
	{
		self::SelectAll();
	}
}

?>