<?php include_once dirname(__FILE__).'/BaseEntity.class.php';?>
<?php include_once dirname(__FILE__).'/../tools/SEOTool.class.php';?>
<?php
Class ItemObjectEntity extends BaseEntity
{
	public $tableName;
	public $info;
	public $infoArray;
	
	protected function select($id)
	{
		$all = $this->query("SELECT * FROM ".$this->tableName." where t_pkId='$id'");

		if($all === false)
			return false;
		if(count($all) <= 0)
			return false;
		$array = get_object_vars($all[0]);
		$this->info = $this->newInstanceDao();
		foreach($array as $name=>$val)
		{			
			$this->info->{$name} = $val;
		}
		return  true;
	}
	
	function count()
	{
		$all = $this->query("SELECT * FROM ".$this->tableName." where 1 = 1 ");
		
		if($all === false)
			return false;
		
		return count($all);
	}
	
	function del($pkid)
	{
		//return "delete from ".$this->tableName." where t_pkId=".$pkid;
		$this->query("delete from ".$this->tableName." where t_pkId=".$pkid);
	}
	protected function selectAll()
	{
		$all = $this->query("SELECT * FROM ".$this->tableName);
		if($all === false)
			return false;
		if(count($all) <= 0)
			return false;
		$this->infoArray = array();
		foreach ($all as $val){
			$array = get_object_vars($val);
			$info = $this->newInstanceDao();
			foreach($array as $name=>$val)
			{
				$info->{$name} = $val;
			}
			array_push($this->infoArray, $info);
		}
		return  true;
	}
	protected function selectBy($attr,$value)
	{
		$all = $this->query("SELECT * FROM ".$this->tableName." where $attr='$value'");
		if($all === false)
			return false;
		if(count($all) <= 0)
			return false;

		$this->infoArray = array();
		foreach ($all as $val){
			$array = get_object_vars($val);
			$info = $this->newInstanceDao();
			foreach($array as $name=>$val)
			{
				$info->{$name} = $val;
			}
			array_push($this->infoArray, $info);
		}
		return true;
	}
	
	function seoToHtml()
	{
		if(isset($this->info->t_seoTitle) && isset($this->info->t_seoDescr) && isset($this->info->t_seoKeyword)){
			echo SEOTool::toHeadHtml($this->info->t_seoTitle, $this->info->t_seoDescr, $this->info->t_seoKeyword);
		}	
		else
			echo "not ok";
	}
	
	function selectCountBy($attr,$val)
	{

		$all = $this->query("SELECT * FROM ".$this->tableName." where $attr='$val'");
		if($all === false)
			return false;
		return count($all);			
	}
}
?>
