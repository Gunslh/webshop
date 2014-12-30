<?php
class MediaManager{
	const upLoadPath = "/frwk/upload/";
	const displayPath = "/upload/";
	public function getUpload($_FILE,$fileElementName)
	{
		$msg = "ok";
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
					$error = 'No error code avaiable';
			}
		}elseif(empty($_FILE['fileToUpload']['tmp_name']) || $_FILE['fileToUpload']['tmp_name'] == 'none')
		{
			$error = 'No file was uploaded..';
		}else
		{
			$msg .= " File Name: " . $_FILE['fileToUpload']['name'] . ", ";
			$msg .= " File Size: " . @filesize($_FILE['fileToUpload']['tmp_name']);
			$url = $this->saveMedia($_FILE['fileToUpload']['tmp_name'],  $_FILE['fileToUpload']['name']);
			$msg .= " File Path: ". $url;
			//for security reason, we force to remove all uploaded file
			@unlink($_FILE['fileToUpload']);
		}
		return $msg;
	}
	
	public function  saveMedia($file,$name){
		$root = Functions::getAppDir();
		$root .= $this::upLoadPath;
		
		@move_uploaded_file($file,$root.$name);
		return $this::displayPath.$name;
	}
	
	public function  saveTempMedia($file,$name){
		$root = Functions::getAppDir();
		$root .= $this::upLoadPath;
	
		@move_uploaded_file($file,$root.$name);
		return $this::displayPath.$name;
	}
	
	public function deleteMedia
}
?>