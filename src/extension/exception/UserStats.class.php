<?php
class UserStats{
	const U_REGISTER = 0;
	const U_UNREGISTER = 1;

	
	public $stats = array (
		self::U_REGISTER => array('descr' => 'The user has registered'),
		self::U_UNREGISTER => array('descr' => 'The user has unregistered'),
		);
	public static function GetStats($id)
	{		
		$stat = new UserStats();
		return  $stat->$stats[$id]['descr'];
	}
}
?>