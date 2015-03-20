<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/session/SessionManagement.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/AdminLAStatus.class.php';?>
<?php

class PermissionsManageFilter extends BaseFilter
{
	public function beforeFilter(BaseRequest $request, BaseResponse $response){
	    $userInfo = SessionManagement::getAdminLoginSession();
	    if(empty($userInfo)){
	        return false;
	    }
	    if(intval($userInfo->t_level) === AdminLAStatus::LIMIT_AUTHORITY_ADMIN){
	        
	    }else if( intval($userInfo->t_level) === AdminLAStatus::LIMIT_AUTHORITY_CUSTOMER){
	        
	    }else if( intval($userInfo->t_level) === AdminLAStatus::LIMIT_AUTHORITY_SALES){
	        
	    }
	    return true;
	}
}

?>