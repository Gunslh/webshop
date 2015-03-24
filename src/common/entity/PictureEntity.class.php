<?php
class PictureEntity extends BaseEntity{
	
	public function addUrls($urlsArray)
	{
		$id = $this->query("insert into shop_media () values ()");
		if($id == null)
			return  false;
		
		foreach($urlsArray as $url)
		{
			if($url !== "")
			{
				$this->query('insert into shop_picture (fk_mediaId,t_url) values ('.$id.',"'.$url.'"); ');
				//echo 'insert into shop_picture (fk_mediaId,t_url) values ('.$id.',"'.$url.'"); '."<br>";			
			}
		}
		return $id;
	}
}
?>