<?php
class User extends ItemObject
{

	function __construct()
	{
		$this->tableName = "shop_user";
	}
	function FindById($id)
	{
		self::Select($id);
	}
	function FindByName($name)
	{
		self::SelectBy("t_usrName", $name);
	}
	function SelectAllUser()
	{
		self::SelectAll();
	}
	function auth($name,$pwd)
	{
		echo $name;
	}
}	
?>
