<?php include_once dirname(__FILE__).'/ItemObjectEntity.class.php';?>
<?php include_once dirname(__FILE__).'/SubMenuEntity.class.php';?>
<?php include_once dirname(__FILE__).'/ManufactoryEntity.class.php';?>
<?php
class ProductEntity extends ItemObjectEntity
{	
	public $subMenu;
	public $menuFactory;
	function __construct()
	{
		$this->tableName = "shop_product";
	}
	
	function FindById($id)
	{
		if(self::Select($id) == false)
			return  false;
		$this->subMenu = new SubMenuEntity();
		$this->subMenu->FindById($this->info->fk_menuId);
		$this->menuFactory = new ManufactoryEntity();
		$this->menuFactory->FindById($this->info->fk_manufactoryId);
		return $this->info;
	}
	function SelectAllProduct()
	{
		if($this->SelectAll() == true)
			return $this->infoArray;
		else
			return  false;
	}
	
	function FindByMenu($cateId)
	{
		$all = $this->query("select * from ".$this->tableName." where fk_menuId=".$cateId);
		if($all === false)
			return  false;
		if(count($all) < 0)
			return false;
		return $all;
	}
	
	function Add($name,$descr,$image,
			$isShow,$discount,$guid,
			$seoTitle,$seoDescr,$seoKeyWord, $price,
			 $subselect){
				
	    $sql = "insert into ".$this->tableName." (".
				"t_title, t_descr, fk_mediaId, t_isShow, t_discount,".
				" t_guid, t_seoTitle, t_seoDescr, t_seoKeyword, t_price, fk_menuId) values".
				" ('$name', '$descr', $image, $isShow, $discount, '$guid'".
				",'$seoTitle','$seoDescr','$seoKeyWord','$price', $subselect)";
		$all = $this->query($sql);
		if($all === false)
			return false;
		return  true;
	}
	
	function Update($pkid, $name,$descr,$image,
			$isShow,$discount,
			$seoTitle,$seoDescr,$seoKeyWord)
	{
		$this->query(" update ".$this->tableName." set t_title ='$name', t_descr = '$descr',".
				"t_isShow = $isShow, t_seoTitle= '$seoTitle', t_discount = $discount, ".
				" t_seoDescr= '$seoDescr', t_seoKeyword='$seoKeyWord' where t_pkId = $pkid");
		return true;
	
	}
}
?>
