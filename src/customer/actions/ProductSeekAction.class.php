<?php include_once dirname(__FILE__).'/./CustomerBaseAction.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/ProductEntity.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/tools/PageTool.class.php';?>
<?php
class ProductSeekAction extends CustomerBaseAction
{  
	
	public function selectAllMenu(){
		$json = new stdClass();
		$entity = new CategoryEntity();
		$cats = $entity->SelectAllCategory();
		$subentity = new SubMenuEntity();
		$objs = array();
		
		if($cats === false){
			$json->status = ErrorCode::E_DB_ERR;
			$json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
		}else{
			$json->status = ErrorCode::E_SUCCESS;
			$json->msg = $cats;
			foreach ($cats as $cat)
			{
				//var_dump($cat);
				$sub = $subentity->FindByCategory($cat->t_pkId);
				if($sub != false) $cat->sub = $sub;

				array_push($objs, $cat);
			}
		}

		echo json_encode($json);
	}
	
    public function selectAllCategory(){
        $json = new stdClass();
        
        $entity = new CategoryEntity();
        $cats = $entity->SelectAllCategory();
        if($cats === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = $cats;
        }
        echo json_encode($json);
    }
    
    public function getSubmenuByCatId(){
        //$userId = $this->userInfo->t_pkid;
        $catId = isset($_POST["catId"]) ? $_POST["catId"] : "";
        $entity = new SubMenuEntity();
        $json = new stdClass();
        $submenus = $entity->FindByCategory($catId);
        if($submenus === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = $submenus;
        }
        echo json_encode($json);
    }
    
    public function getProductCountByCatId(){
        //$userId = $this->userInfo->t_pkid;
        $catId = isset($_POST["catId"]) ? $_POST["catId"] : "";
        $entity = new ProductEntity();
        $json = new stdClass();
        $count = $entity->getCountByCatId($catId);
        if($count === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = $count;
            $json->pageTotal = PageTool::getPageTotal($count);
        }
        echo json_encode($json);
    }
    
    public function getProductByCatId(){
        //$userId = $this->userInfo->t_pkid;
        $catId = isset($_POST["catId"]) ? $_POST["catId"] : "1";
        $page = isset($_POST["page"]) ? $_POST["page"] : 1;
        $entity = new ProductEntity();
        $json = new stdClass();
        $all = $entity->getByCatId($catId, PageTool::getStart($page), PageTool::PER_PAGE_NUM);
        if($all === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = $all;
        }
        echo json_encode($json);
    }
    
    public function getProductCountBySubmenuId(){
        $subId = isset($_POST["subId"]) ? $_POST["subId"] : "1";
        $entity = new ProductEntity();
        $json = new stdClass();
        $count = $entity->getCountBySubId($subId);
        if($count === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = $count;
            $json->pageTotal = PageTool::getPageTotal($count);
        }
        echo json_encode($json);
    }
    
    public function getProductBySubId(){
        //$userId = $this->userInfo->t_pkid;
        $subId = isset($_POST["subId"]) ? $_POST["subId"] : "1";
        $page = isset($_POST["page"]) ? $_POST["page"] : 1;
        $entity = new ProductEntity();
        $json = new stdClass();
        $all = $entity->getBySubId($subId, PageTool::getStart($page), PageTool::PER_PAGE_NUM);
        if($all === false){
            $json->status = ErrorCode::E_DB_ERR;
            $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
        }else{
            $json->status = ErrorCode::E_SUCCESS;
            $json->msg = $all;
        }
        echo json_encode($json);
    }
}
?>
