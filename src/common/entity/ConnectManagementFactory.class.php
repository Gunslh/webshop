<?php

class ConnectManagementFactory
{
	const DB_INFO = 'mysql5.6';
	const DB_HOST = 'localhost';
	const DB_USER = 'root';
	const DB_PWD = '';
	const DB_NAME = 'webshop';

	private static $_connection = null;

	public static function instance()
	{
		if (empty(self::$_connection)) {
			self::$_connection = @new mysqli(self::DB_HOST,self::DB_USER,self::DB_PWD,self::DB_NAME);
			if (mysqli_connect_errno()) {
				//printf("</br>Connect failed: %s\n", mysqli_connect_error());
				return false;
			}
		}

		return self::$_connection;
	}
}
?>