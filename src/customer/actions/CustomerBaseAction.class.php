<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/session/SessionManagement.class.php';?>
<?php
class CustomerBaseAction  extends AjaxAction
{
    protected  $userInfo;
    public function __construct(BaseRequest $request,BaseResponse $response = null){
        parent::__construct($request, $response);
        $this->userInfo = SessionManagement::getUserLoginSession();
    }
}

?>