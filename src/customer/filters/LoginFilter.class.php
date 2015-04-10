<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/session/SessionManagement.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/AdminLAStatus.class.php';?>
<?php

class LoginFilter extends BaseFilter
{
	const LOGIN_ACTION_URL = 'customer/UserAction/login';
	const LOGIN_PAGE_URL = 'login.html';
	public static $filters = Array(
			1=>'/customer/ProductSeekAction/selectAllMenu',
			2=>'/customer/ProductSeekAction/getCateInfo',
			3=>'/customer/ProductSeekAction/selectAllCategory',
			4=>'/customer/ProductSeekAction/getSubmenuByCatId',
			5=>'/customer/ProductSeekAction/getProductCountByCatId',
			6=>'/customer/ProductSeekAction/getProductByCatId',
			7=>'/customer/actions/ProductSeekAction/getProductByCatId',
			8=>'/customer/actions/ProductSeekAction/getProductCountByCatId',
			9=>'/customer/actions/ProductSeekAction/getProductMedia',
			10=>'/customer/CartAction/watchCart',
			11=>'/customer/actions/ProductSeekAction/getProductBySubId',
			12=>'/customer/actions/ProductSeekAction/getProductCountBySubmenuId',
			);
	
	private function whitelistFilter(BaseRequest $request){
		
	    if($request->geturl() === WEB_ROOT.self::LOGIN_ACTION_URL){
	        return true;
	    }
	    foreach (LoginFilter::$filters as  $filter)
	    {
	    	if($request->geturl() === $filter)
	    	{
	    		return true;
	    	}
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
	        //$response->redirect(self::LOGIN_PAGE_URL);
	    }
	}
	
	public function beforeFilter(BaseRequest $request, BaseResponse $response)
	{
	    if($this->whitelistFilter($request)){
	        return true;
	    }
	    $userInfo = SessionManagement::getUserLoginSession();
	    if(empty($userInfo)){
	        $this->noLogin($request, $response);
	        return false;
	    }
	    return true;
	}
}

?>