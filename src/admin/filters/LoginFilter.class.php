<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/session/SessionManagement.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/AdminLAStatus.class.php';?>
<?php

class LoginFilter extends BaseFilter
{
	const LOGIN_URL = '/admin/AdminAction/login';
	
	private function whitelistFilter(BaseRequest $request){
	    if($request->geturl() === self::LOGIN_URL){
	        return true;
	    }
	    return false;
	}
	
	private function noLogin(BaseRequest $request, BaseResponse $response){
	    if($request->isHttpXRequest()){
	        $json = new stdClass();
	        $json->status = ErrorCode::E_PERMISSIONS;
	        $json->msg = ErrorCode::getErrDesc(ErrorCode::E_PERMISSIONS);
	        echo json_encode($json);
	    }else{
	        $response->redirect(Configure::$REQUEST_PAGE_NOT_FOUND);
	    }
	}
	
	public function beforeFilter(BaseRequest $request, BaseResponse $response)
	{
	    if($this->whitelistFilter($request)){
	        return true;
	    }
	    $userInfo = SessionManagement::getAdminLoginSession();
	    if(empty($userInfo)){
	        $this->noLogin($request, $response);
	        return false;
	    }
	    return true;
	}
}

?>