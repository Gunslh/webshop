<?php include_once dirname(__FILE__).'/../../common/entity/PictureEntity.class.php';?>
<?php
class MediaManager{
	const imagesPath = "uploads/";
	
	function __construct() {
		$root = APP_DIR.self::imagesPath;
		if(!file_exists($root))
			mkdir($root);
	}
	
	public function  saveMedia($urls){
		$imageRoot = APP_DIR.self::imagesPath;
		$urlsArray = $this->UrlsBreaks($urls);
		$pictureEntity = new PictureEntity();
		$newArray = array();
		
		foreach($urlsArray as $url)
		{
			if($url != ""){
				$filePath = APP_DIR.$url;
				rename($filePath, $imageRoot.basename($url));
				//echo $filePath ." ". $imageRoot.basename($url)."<br>";
				array_push($newArray, self::imagesPath.basename($url));
			}
		}
		
		return $pictureEntity->addUrls($newArray);
	}	
	
	public function UrlsBreaks($urls){
		return explode("|",$urls);		
	}
}
?>