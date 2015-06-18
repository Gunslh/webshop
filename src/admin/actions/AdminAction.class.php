<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/AdminEntity.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/session/SessionManagement.class.php';?>
<?php

class AdminAction extends AjaxAction
{
    private $entity = null;
    public function beforAction(){
        $this->entity = new AdminEntity();
    }
    
    private function saveSessoin($usr){
        $userInfo = $this->entity->get($usr);
        if($userInfo){
            SessionManagement::setAdminLoginSession($userInfo);
        }
    }
    
    public function login(){
        $usr = isset($_POST["usrname"]) ? $_POST["usrname"] : null;
        $pwd = isset($_POST["usrpwd"]) ? $_POST["usrpwd"] : null;
        $json = new stdClass();

        if(empty($usr) || empty($pwd))
        {
            $json->status = ErrorCode::E_LOGIN_FAIL;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_LOGIN_FAIL);
            echo json_encode($json, true);
            return;
        }
        
        if($this->entity->auth($usr, $pwd) === true)
        {
            //将用户信息记录到session中
            $this->saveSessoin($usr);
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
        else {
            $json->status = ErrorCode::E_LOGIN_FAIL;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_LOGIN_FAIL);
        }
        echo json_encode($json);
    }
    
    public function logout(){
        SessionManagement::clrAdminLoginSession();
        $json = new stdClass();
        $json->status = ErrorCode::E_SUCCESS;
        $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        echo json_encode($json);
    }
}
?>
