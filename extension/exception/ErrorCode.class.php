<?php
class ErrorCode{
	const E_SUCCESS = 0;
	const E_ERROR = 0x01;
	const E_WARNING = 0x02;
	const E_PERMISSIONS = 0x03;
	const E_WRONG_PWD = 0x04;
	const E_LOGIN_FAIL = 0x05;
	const E_UNKOWN_ACT = 0x06;
	const E_DB_ERR = 0x07;
	const E_DB_DUPLICATE = 0x08;
	public $err = array (
		self::E_SUCCESS => array('descr' => 'success'),
		self::E_ERROR => array('descr' => 'Error occured'),
		self::E_WARNING => array('descr' => 'Warning'),
		self::E_PERMISSIONS => array('descr' => 'no access permission'),
		self::E_WRONG_PWD => array('descr' => 'invalid password'),
		self::E_LOGIN_FAIL => array('descr' => 'invalid password or username'),
		self::E_UNKOWN_ACT => array('descr' => 'unkown action.'),
		self::E_DB_ERR => array('descr' => 'unkown DB error contact customer service.'),
		self::E_DB_DUPLICATE => array('descr' => 'given message exist.'),
	);
	public static function GetErr($id)
	{		
		$err = new ErrorCode();
		return  $err->err[$id]['descr'];
	}
}
?>