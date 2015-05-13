<?php include_once dirname(__FILE__).'/../../common/entity/UserEntity.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/AddressEntity.class.php';?>
<?php
class UserAction extends CustomerBaseAction
{
    private $entity = null;
    public function beforAction(){
        $this->entity = new UserEntity();
    }
    
    private function saveSessoin($usr){
        $userInfo = $this->entity->get($usr);
        if($userInfo){
            SessionManagement::setUserLoginSession($userInfo);
        }
    }
    
    public function getSession()
    {
    	$json = new stdClass();
    	$json->status = ErrorCode::E_SUCCESS;
    	$json->msg = SessionManagement::getUserLoginSession();
    	if( $json->msg == null )
    	{
    		$json->status = ErrorCode::E_ERROR;
    		$json->msg = ErrorCode::getErrDesc(ErrorCode::E_ERROR);
    	}
    	echo json_encode($json);
    }
    
    public function logout(){
    	$json = new stdClass();
    	$json->status = ErrorCode::E_SUCCESS;
    	$json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS); 
    	SessionManagement::clrUserLoginSession();
    	echo json_encode($json);
    }
    public function loginTest(){
    	$json = new stdClass();
    	$json->status = ErrorCode::E_SUCCESS;
    	$json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
    	SessionManagement::clrUserLoginSession();
    	echo json_encode($json);
    }
    public function login(){
        $json['status'] = ErrorCode::E_SUCCESS;
        
        $usr = isset($_POST["usrname"]) ? $_POST["usrname"] : null;
        $pwd = isset($_POST["usrpwd"]) ? $_POST["usrpwd"] : null;
        //$session = new Session();
        $json = new stdClass();
        $json->status = ErrorCode::E_SUCCESS;
        $entity = new UserEntity();
        if(empty($usr) || empty($pwd))
        {
            $json->status = ErrorCode::E_LOGIN_FAIL;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_LOGIN_FAIL);
            echo json_encode($json, true);
            return;
        }
        if($entity->auth($usr, $pwd) === true)
        {
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
    
    public function registerCheck()
    {
        $usr = isset($_POST["usrname"]) ? $_POST["usrname"] : null;
        $json = new stdClass();
        $entity = new UserEntity();
        if(empty($usr)){
            $json->status = ErrorCode::E_NOT_EXISTS;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_NOT_EXISTS);
            echo json_encode($json, true);
            return;
        }
        if($entity->checkUserExists($usr) == true)
        {
            $json->status = ErrorCode::E_IS_EXISTS;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_IS_EXISTS);
        }
        else {
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
        echo json_encode($json);
    }
    
    public function register(){
        $usr = isset($_POST["usrname"])?$_POST["usrname"]:null;
        $pwd = isset($_POST["usrpwd"])?$_POST["usrpwd"]:null;
        $name = isset($_POST["usrrealname"])?$_POST["usrrealname"]:null;
        $tele = isset($_POST["usrtele"])?$_POST["usrtele"]:null;
        $zipCode = isset($_POST["usrzipcode"])?$_POST["usrzipcode"]:null;
        $addr = isset($_POST["usraddr"])?$_POST["usraddr"]:null;
        $json = new stdClass();
        
        if(empty($usr) || empty($pwd) || empty($name) ||empty($tele))
        {
            $json->status = ErrorCode::E_INPUT_ERROR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_INPUT_ERROR);
            echo json_encode($json);
            return;
        }

        $entity = new UserEntity();
        if($entity->add($usr, $pwd, $name, $tele, $zipCode, $addr) == true)
        {
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
        else {
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }
        echo json_encode($json);     
    }
    public function addressLoad()
    {
    	$json = new stdClass();
    	$entity = new AddressEntity();
    	 
    	$list = $entity->getall($this->userInfo[0]->t_pkid);
    	$json->msg = $list;
    	$json->status = ErrorCode::E_SUCCESS;
    	echo json_encode($json);
    }
    public function addressAdd()
    {
    	$dao = new stdClass();
    	$json = new stdClass();
    	$dao->t_name = isset($_POST["name"])?$_POST["name"]:null;
    	$dao->t_country = isset($_POST["country"])?$_POST["country"]:null;
    	$dao->t_state = isset($_POST["state"])?$_POST["state"]:null;
    	$dao->t_city = isset($_POST["city"])?$_POST["city"]:null;
    	$dao->t_street = isset($_POST["street"])?$_POST["street"]:null;
    	$dao->t_phone = isset($_POST["phone"])?$_POST["phone"]:null;
    	$dao->fk_usrId = $this->userInfo[0]->t_pkid;
    	$entity = new AddressEntity();
    	
    	$entity->add($dao);
    	
    	$json->status = ErrorCode::E_SUCCESS;
        $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        
        echo json_encode($json);
    }
    public function addressDel()
    {
    	$json = new stdClass();
    	$id = isset($_POST["id"])?$_POST["id"]:null;
    	$entity = new AddressEntity();
    	$usrid = $this->userInfo[0]->t_pkid;
    	$entity->del($id);
    	$json->status = ErrorCode::E_SUCCESS;
        $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        
        echo json_encode($json);
    }
    public function addressDefault()
    {
    	$json = new stdClass();
    	$id = isset($_POST["id"])?$_POST["id"]:null;
    	$entity = new AddressEntity();
    	$usrid = $this->userInfo[0]->t_pkid;
    	$entity->setDefault($usrid,$id);
    	$json->status = ErrorCode::E_SUCCESS;
    	$json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
    
    	echo json_encode($json);
    }
}
?>
