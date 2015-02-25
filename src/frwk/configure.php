<?php
class Configure
{
	public static $DIRECTORY_INDEXS = array (
			'index.php',
			'index.html' 
	);

	public static $MODULES = array(
	    'admin'=>array(
	        'pattern'=>'/^\/admin\/.*/',
	        'filters'=>array(
	            'LoginFilter'
	        ),
	        'loadpath'=>array(
	            'admin/filters/',
	            'admin/actions/',
	        ),
	    ),
	);

	//public static $DIRECTORY_TEMPLATE = 'templates/';
	public static $REQUEST_PAGE_NOT_FOUND = '404.html';
	public static $BASE_CONTROLLER = 'Controller';
// 	public static $DISPATCHER_FILTERS = array (
// 			'LoginFilter',
// 	);
	// public static $ENCODING = 'UTF-8';
}
?>