<?php

class LoginFilter extends BaseFilter
{
	const LOGIN_ACTION = 'LoginSkipAction?method=login';
	
	public function beforeFilter(BaseRequest $request, BaseResponse $response)
	{
	    //echo "loginFilter<br/>";
	}
}

?>