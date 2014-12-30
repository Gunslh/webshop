<?php
class SubMenu extends ItemObject
{	
	public $category;
	function __construct()
	{
		$this->tableName = "shop_submenu";
	}
	function FindByCategory($cateId)
	{
		$all = $this->query("select * from ".$this->tableName." where fk_cateId =".$cateId);
		if($all === false)
			return  false;
		if(count($all) <= 0)
			return false;
		return $all;
	}
	
	
	function FindById($id)
	{
		if(self::Select($id) == false)
			return  false;
		$this->category = new  Category();
		$this->category->FindById($this->info->fk_cateId);
		return $this->info;
	}
	function SelectAllMenu()
	{
		if($this->SelectAll() == true)
			return $this->infoArray;
		else
			return  false;
	}
	
	function SelectCategory($cateId)
	{
		if($this->SelectBy("fk_cateId", $cateId) == true)
			return $this->infoArray;
		else
			return  false;
	}
	
	function Add($name,$descr,$image,
			$isShow,$discount,$guid,
			$seoTitle,$seoDescr,$seoKeyWord,$fk_cateId)
	{
		$all = $this->query("insert into ".$this->tableName." (".
				"t_menuName, t_menuDescr, t_menuImage, t_isShow, t_discount,".
				" t_guid, t_seoTitle, t_seoDescr, t_seoKeyword , fk_cateId) values".
				" ('$name', '$descr', '$image', $isShow, $discount, '$guid'".
				",'$seoTitle','$seoDescr','$seoKeyWord', $fk_cateId)".
				";");
		if($all === false)
			return false;
		return  true;
	}
	function Update($pkid, $name,$descr,$image,
			$isShow,$discount,
			$seoTitle,$seoDescr,$seoKeyWord)
	{
		$this->query(" update ".$this->tableName." set t_menuName ='$name', t_menuDescr = '$descr',".
				"t_isShow = $isShow, t_seoTitle= '$seoTitle', t_discount = $discount, ".
				" t_seoDescr= '$seoDescr', t_seoKeyword='$seoKeyWord' where t_pkId = $pkid");
		return true;
	
	}
	
}
?>