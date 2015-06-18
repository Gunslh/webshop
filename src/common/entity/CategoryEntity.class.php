<?php include_once dirname(__FILE__).'/ItemObjectEntity.class.php';?>
<?php
class CategoryEntity extends ItemObjectEntity
{	
	function __construct()
	{
		$this->tableName = "shop_category";
	}
	function FindById($id)
	{
		self::Select($id);
		return $this->info;
	}
	function SelectAllCategory()
	{
		if($this->SelectAll() == true)
			return $this->infoArray;
		else
			return  false;
	}
	function Add($name,$descr,$image,
				$isShow,$discount,$guid,
				$seoTitle,$seoDescr,$seoKeyWord)
	{
		$all = $this->query("insert into ".$this->tableName." (".
				"t_cateName, t_cateDescr, t_cateImage, t_isShow, t_discount,".
				" t_guid, t_seoTitle, t_seoDescr, t_seoKeyword) values".
				" ('$name', '$descr', '$image', $isShow, $discount, '$guid'".
				",'$seoTitle','$seoDescr','$seoKeyWord')".
				";");
		if($all === false)
			return false;
		return  true;
	}
	
	function Update($pkid, $name,$descr,$image,
			$isShow,$discount,
			$seoTitle,$seoDescr,$seoKeyWord)
	{	
		$this->query(" update ".$this->tableName." set t_cateName ='$name', t_cateDescr = '$descr',".
		" t_cateImage = '$image' ,t_isShow = $isShow, t_seoTitle= '$seoTitle', t_discount = $discount, ".
		" t_seoDescr= '$seoDescr', t_seoKeyword='$seoKeyWord' where t_pkId = $pkid");
		return true;
	}
}
?>
