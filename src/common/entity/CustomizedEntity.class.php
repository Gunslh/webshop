<?php include_once dirname(__FILE__).'/BaseEntity.class.php';?>
<?php
class CustomizedEntity extends BaseEntity
{
	const TABLE_NAME = "shop_customized";
	
	public function add($name, $lastname,$email,$phone,
			$descr,$height,$bust, $waist,$hip, $weight, $file1, $file2,$uid,$guid)
	{
	    $sql=  "INSERT INTO `webshop`.`shop_customized`".
	    "(`t_name`, `t_lastname`, `t_email`, `t_phone`, `t_descr`,".
	    "`t_height`, `t_bust`, `t_waist`, `t_hip`, `t_weight`, `t_pic1`, ".
	    "`t_pic2`, `fk_usr_id`, `t_guid`) VALUES".
	    "('".$name."','".$lastname."','".$email."','".$phone."','".$descr."',".
	    $height.",".$bust.",".$waist.",".$hip.",".$weight.",'".$file1."','".$file2."',".$uid.",'".$guid."');";
	    																 
		$all = $this->query($sql);
		if($all === false)
			return false;
		return true ;
	}
	
	public function get($usr)
	{
		$all = $this->query("SELECT * FROM ".self::TABLE_NAME.' where t_name="'.$usr.'";');
		if($all === false)
			return false;
		if(count($all) == 0)
			return  false;
		return $all[0];
	}
}

?>
