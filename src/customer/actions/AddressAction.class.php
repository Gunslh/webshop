<?php include_once dirname(__FILE__).'/../../common/entity/AddressEntity.class.php';?>
<?php
class AddressAction extends CustomerBaseAction
{
    public function add(){
        $country = isset($_POST["country "]) ? $_POST["country "] : "";
        $state = isset($_POST["state"]) ? $_POST["state"] : "";
        $city = isset($_POST["city"]) ? $_POST["city"] : "";
        $street = isset($_POST["street"]) ? $_POST["street"] : "";
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
        $isDefault = isset($_POST["isDefault"]) ? $_POST["isDefault"] : 0;
        $user = $this->userInfo->fk_pkId;
        $json = new stdClass();
        $json->status = ErrorCode::E_SUCCESS;
        $entity = new AddressEntity();
        $dao = new stdClass();
        $dao->t_country = $country;
        $dao->fk_user = $user;
        $dao->t_state = $state;
        $dao->t_city = $city;
        $dao->t_street = $street;
        $dao->t_name = $name;
        $dao->t_phone = $phone;

        $ret = $entity->add($dao);
        if($ret === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
        
        echo json_encode($json);
    }
    
    public function modify(){
        $country = isset($_POST["country "]) ? $_POST["country "] : "";
        $state = isset($_POST["state"]) ? $_POST["state"] : "";
        $city = isset($_POST["city"]) ? $_POST["city"] : "";
        $street = isset($_POST["street"]) ? $_POST["street"] : "";
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
        $isDefault = isset($_POST["isDefault"]) ? $_POST["isDefault"] : 0;
        $pk = isset($_POST["pkid "]) ? intval($_POST["pkid "]) : null;
        $json = new stdClass();
        if(empty($pk)){
            $json->status = ErrorCode::E_ERROR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_ERROR);
            echo json_encode($json);
            return;
        }
        
        $entity = new AddressEntity();
        $dao = new stdClass();
        $dao->t_country = $country;
        $dao->t_pkId = $pk;
        $dao->t_state = $state;
        $dao->t_city = $city;
        $dao->t_street = $street;
        $dao->t_name = $name;
        $dao->t_phone = $phone;
        $dao->t_pkId = $this->userInfo->fk_pkId;
    
        $ret = $entity->modify($dao);
        if($ret === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
    
        echo json_encode($json);
    }
    
    public function del(){
        $pk = isset($_POST["pkid "]) ? intval($_POST["pkid "]) : null;
        $json = new stdClass();
        if(empty($pk)){
            $json->status = ErrorCode::E_ERROR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_ERROR);
            echo json_encode($json);
            return;
        }
        
        $entity = new AddressEntity();
        $ret = $entity->del($pk);
        if($ret === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
        
        echo json_encode($json);
    }
    
    public function getall(){
         $user = $this->userInfo->fk_pkId;
        $json = new stdClass();        
        $entity = new AddressEntity();
        $all = $entity->getall($user);
        if($all === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = $all;
        }
        
        echo json_encode($json);
    }
    
    public function setDefault(){
        $pk = isset($_POST["pkid "]) ? intval($_POST["pkid "]) : null;
        $user = $this->userInfo->fk_pkId;
        $json = new stdClass();
        if(empty($pk)){
            $json->status = ErrorCode::E_ERROR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_ERROR);
            echo json_encode($json);
            return;
        }
    
        $entity = new AddressEntity();
        $ret = $entity->setDefault($user, $pk);
        if($ret === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
        echo json_encode($json);
    }
}
?>
