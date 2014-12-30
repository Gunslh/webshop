<?php
class MediaManager{
	const imagesPath = "/frwk/upload/images/";
	
	
	function __construct() {
		$root = Functions::getAppDir();
		$root .= $this::imagesPath;
		if(!file_exists($root))
			mkdir($root);
	}
	
	public function  saveMedia($urls){
		$serverRoot = Functions::getAppDir();
		$imageRoot = $serverRoot.$this::imagesPath;
		
		$urlsArray = $this->UrlsBreaks($urls);
		$pictureEntity = new PictureEntity();
		$newArray = array();
		
		foreach($urlsArray as $url)
		{
			if($url != ""){
				$filePath = $serverRoot.$url;
				rename($filePath, $imageRoot.basename($url));
				//echo $filePath ." ". $imageRoot.basename($url)."<br>";
				array_push($newArray, $this::imagesPath.basename($url));
			}
		}
		
		return $pictureEntity->addUrls($newArray);
	}	
	
	public function UrlsBreaks($urls){
		return explode("|",$urls);		
	}
	
	//public function deleteMedia
}
?>