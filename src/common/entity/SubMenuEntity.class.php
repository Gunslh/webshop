<?php include_once dirname(__FILE__).'/ItemObjectEntity.class.php';?>
<?php include_once dirname(__FILE__).'/CategoryEntity.class.php';?>
<?php
class SubMenuEntity extends ItemObjectEntity
{	
	public $category;
	function __construct()
	{
		$this->tableName = "shop_submenu";
	}
	function FindByCategory($cateId)
	{
	    $sql = "select * from ".$this->tableName." where fk_cateId=$cateId and t_isShow=1";
		$all = $this->query($sql);
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
		$this->category = new  CategoryEntity();
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
	
	function selectByCateId($cateId)
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
	    $sql = "insert into ".$this->tableName." (".
				"t_menuName, t_menuDescr, fk_mediaId, t_isShow, t_discount,".
				" t_guid, t_seoTitle, t_seoDescr, t_seoKeyword , fk_cateId) values".
				" ('$name', '$descr', $image, $isShow, $discount, '$guid'".
				",'$seoTitle','$seoDescr','$seoKeyWord', $fk_cateId)";
		$all = $this->query($sql);
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
