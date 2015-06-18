<?php include_once dirname(__FILE__).'/../../common/entity/SubMenuEntity.class.php';?>
<?php

class SubMenuInnerPOJO
{
    private $entity;
    public function __construct(){
        $this->entity = new SubMenuEntity();
    }
    
	public function selectByCateId($cateId){
		return $this->entity->selectByCateId($cateId);
	}
}
?>
