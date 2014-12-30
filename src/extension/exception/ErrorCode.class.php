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
	const E_FILE_ERR = 0x09;
	const E_IS_EXISTS = 0x0a;
	const E_NOT_EXISTS = 0x0b;
	const E_INPUT_ERROR = 0x0c;

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
		self::E_FILE_ERR => array('descr' => 'file operation error.'),
		self::E_IS_EXISTS => array('descr' => 'data is exists.'),
		self::E_NOT_EXISTS => array('descr' => 'data is not exists.'),
		self::E_INPUT_ERROR => array('descr' => 'input error.'),
	);
	public static function GetErr($id)
	{		
		$err = new ErrorCode();
		return  $err->err[$id]['descr'];
	}
}
?>