<?php
class UploadManager{
	const tmpPath = "uploads/.tmp/";
	function __construct() {
		$root = APP_DIR.self::tmpPath;
		if(!file_exists($root))
			mkdir($root);
	}
	
	function GetUpLoadFile($_FILE,$fileElementName){
		//return $_FILE[$fileElementName]['name'];
		if(!empty($_FILE[$fileElementName]['error']))
		{
			switch($_FILE[$fileElementName]['error'])
			{
				case '1':
					$msg = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
					break;
				case '2':
					$msg = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
					break;
				case '3':
					$msg = 'The uploaded file was only partially uploaded';
					break;
				case '4':
					$msg = 'No file was uploaded.';
					break;
		
				case '6':
					$msg = 'Missing a temporary folder';
					break;
				case '7':
					$msg = 'Failed to write file to disk';
					break;
				case '8':
					$msg = 'File upload stopped by extension';
					break;
				case '999':
				default:
					$msg = 'No error code avaiable';
			}
		}elseif(empty($_FILE[$fileElementName]['tmp_name']) || $_FILE[$fileElementName]['tmp_name'] == 'none')
		{
			$msg = 'No file was uploaded..';
		}else
		{
			$fileType = $this->GetExtension($_FILE[$fileElementName]['name']);
			if(!($fileType === 'png' || $fileType === 'jpg' || $fileType === 'bmp' || $fileType === 'gif'))
			{
				$return['err'] = "不支持非图片上传";
				return $return;
			}
			
// 			$msg = " File Name: " . $_FILE[$fileElementName]['name'] . ", ";
// 			$msg .= " File Size: " . @filesize($_FILE[$fileElementName]['tmp_name']);
// 			$msg .= " File Path: ". $url;
			$url = $this->save($_FILE[$fileElementName]['tmp_name'], $this->GetNewName($_FILE[$fileElementName]['name']));
			$return['url'] = $url;
			//for security reason, we force to remove all uploaded file
			//unlink($_FILE[$fileElementName]['tmp_name']);
		}
		$return['err'] = isset($msg)? $msg:"";
		return $return;
		
	}

	private function GetNewName($name){
		return uniqid().'.'.$this->GetExtension($name);
	}
	private function GetExtension($file)
	{
		return end((explode('.', $file)));
	}
	private function  save($file,$name){
		$path = self::tmpPath.$name;
		move_uploaded_file($file,APP_DIR.$path);
		return WEB_ROOT.$path;
	}
	
	function delete($path)
	{
		$file = APP_DIR.$path;
		@unlink($file);
	}
}

?>