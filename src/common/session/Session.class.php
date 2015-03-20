<?php

class Session
{
	public function __construct()
	{
		$this->start();
	}
	
	private function start()
	{
		if(!isset($_SESSION)){
			@session_start();
		}
	}
	
	public function get($key)
	{
		return @$_SESSION[$key];
	}

	public function add($key,$value)
	{
	    $_SESSION[$key] = $value;
	}
	
	function del($key)
	{
		unset($_SESSION[$key]);
	}
}
?>