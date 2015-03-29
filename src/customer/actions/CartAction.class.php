<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/CartEntity.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/ProductEntity.class.php';?>
<?php
class CartAction extends AjaxAction
{
    private function totalPrice($all){
        $total = 0;
        foreach ($all as $val){
            $total += doubleval($val->t_price);
        }
        return $total;
    }
    
    public function watchCart(){
        $json = new stdClass();
        $json->status = ErrorCode::E_SUCCESS;
        $entity = new CartEntity();
        $user = 1;
        $all = $entity->allcart($user);
        if($all === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $t = new stdClass();
            $t->totalPrice = $this->totalPrice($all);
            array_push($all, $t);
            $json->msg = $all;
        }
        echo json_encode($json);
    }
    
    public function add(){
        $productId = isset($_POST["productId"]) ? $_POST["productId"] : null;
        $total = isset($_POST["total"]) ? $_POST["total"] : 1;
        $selected = isset($_POST["selected"]) ? $_POST["selected"] : 1;
        $price = isset($_POST["price"]) ? $_POST["price"] : 0;
        $user = 1;
        $json = new stdClass();
        $json->status = ErrorCode::E_SUCCESS;
        $entity = new CartEntity();
        $dao = new stdClass();
        $dao->fk_product = $productId;
        $dao->fk_user = $user;
        $dao->t_price = $price;
        $dao->t_total = $total;
        $dao->t_selected = $selected;
        
        if($dao->t_price === 0){
            $pEntity = new ProductEntity();
            $product = $pEntity->FindById($dao->fk_product);
            $dao->t_price = $product->t_price;
        }
        
        $ret = $entity->add2update($dao);
        if($ret === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
        
        echo json_encode($json);
    }
    
public function del(){
        $productId = isset($_POST["productId"]) ? $_POST["productId"] : null;
        $user = 1;
        $json = new stdClass();
        $json->status = ErrorCode::E_SUCCESS;
        $entity = new CartEntity();
        $dao = new stdClass();
        $dao->fk_product = $productId;
        $dao->fk_user = $user;
        
        $ret = $entity->del($dao);
        if($ret === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
        
        echo json_encode($json);
    }
    
    public function allSelect(){
        $user = 1;
        $json = new stdClass();
        $json->status = ErrorCode::E_SUCCESS;
        $entity = new CartEntity();
    
        $ret = $entity->allSelect($user);
        if($ret === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
    
        echo json_encode($json);
    }
    
    public function allCanel(){
        $user = 1;
        $json = new stdClass();
        $json->status = ErrorCode::E_SUCCESS;
        $entity = new CartEntity();
    
        $ret = $entity->allCanel($user);
        if($ret === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_SUCCESS);
        }
    
        echo json_encode($json);
    }
}
?>
