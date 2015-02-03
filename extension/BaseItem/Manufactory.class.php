<?php
class Manufactory extends ItemObject
{
	function __construct(){
		$this->tableName = "shop_manufactory";
	}
	
	function FindById($id)
	{
		self::Select($id);
		
	}	
}

?>