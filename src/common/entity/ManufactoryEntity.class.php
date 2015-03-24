<?php include_once dirname(__FILE__).'/BaseEntity.class.php';?>
<?php include_once dirname(__FILE__).'/ItemObjectEntity.class.php';?>
<?php
class ManufactoryEntity extends ItemObjectEntity
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
