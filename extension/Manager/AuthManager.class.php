<?php
class AuthManager
{

	public $AuthArray = array(
			1 => array('dir'=>'/admin/', 'LoginPage'=>'/admin/login.html',
					'isAdmin'=>1, 'isRequired' => 1, 'AuthPage' => 'loginAction.php'),
			2 => array('dir'=>'/usradmin/', 'LoginPage'=>'/usradmin/login.html',
					'isAdmin'=>0, 'isRequired' => 1, 'AuthPage' => '/admin/sessionadd.php')
			);

	public function AuthTest($url,$usrSession)
	{		
	
		foreach($this->AuthArray as $Auth)
		{		
			if(strpos($url,$Auth['AuthPage']) !== FALSE)
			{
				return;
			}
			if(strpos($url, $Auth['dir']) !== FALSE)
			{
				//var_dump($usrSession);
				
				if(!isset($usrSession))
				{

					Functions::redirect($Auth['LoginPage']);
					
				}
			}
		}

		//Functions::redirect($this->AuthArray[1]['LoginPage']);
	}
}