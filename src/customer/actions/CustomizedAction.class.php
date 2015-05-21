<?php include_once dirname(__FILE__).'/../../common/tools/UploadManager.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/CustomizedEntity.class.php';?>
<?php
class CustomizedAction extends CustomerBaseAction
{
	const customize_base = "uploads/customize/";

	public function add()
	{
		$root = APP_DIR.self::customize_base;
		if(!file_exists($root))
			mkdir($root);
			
		//var_dump($_POST);
		//var_dump($this->userInfo);
		$imageRoot = APP_DIR.self::customize_base;
		$entity = new CustomizedEntity();
		$name = isset($_POST["name"])?$_POST["name"]:"";
		$lastname = isset($_POST["lastname"])?$_POST["lastname"]:"";
		$descr = isset($_POST["descr"])?$_POST["descr"]:"";
		$phone = isset($_POST["phone"])?$_POST["phone"]:"";
		$email = isset($_POST["email"])?$_POST["email"]:"";
		$height = isset($_POST["height"])?$_POST["height"]:0;
		$waist = isset($_POST["waist"])?$_POST["waist"]:0;
		$bust = isset($_POST["bust"])?$_POST["bust"]:0;
		$hip = isset($_POST["hip"])?$_POST["hip"]:0;
		$weight = isset($_POST["weight"])?$_POST["weight"]:0;
		$mediaManager = new UploadManager();
		$pic ="";
		$pic1="";
		if ($_FILES['files']['size'] != 0){
			$ret = $mediaManager->GetUpLoadFile($_FILES, "files");
			$pic = "/".self::customize_base.basename($ret['url']);
			rename(APP_DIR.$ret['url'], $imageRoot.basename($ret['url']));
		}
		$guid =  $this->guid();
		if ($_FILES['files1']['size'] != 0){
			$ret1 = $mediaManager->GetUpLoadFile($_FILES, "files1");
			$pic1 = "/".self::customize_base.basename($ret1['url']);
			rename(APP_DIR.$ret1['url'], $imageRoot.basename($ret1['url']));
		}
		$entity->add($name, $lastname,$email,$phone,
				$descr,$height,$bust, $waist,$hip, $weight, $pic, $pic1,$this->userInfo[0]->t_pkid, $guid);
		$this->redirect("customized_done.html?guid=".$guid);

	}
	private function guid(){

		mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uuid = substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12);
		return $uuid;
	}
}
?>

