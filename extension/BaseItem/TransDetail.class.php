<?php
class TransDetail extends ItemObject
{	
	function __construct()
	{
		$this->tableName = "shop_transDetail";
	}
	
	function FindById($id)
	{
		if(self::Select($id) == false)
			return  false;
	}
	
	function FindAllDetail($transId)
	{
		if(self::SelectBy("fk_transId",$transId) == false)
			return  false;
		return $this->infoArray;
	}
}
?>