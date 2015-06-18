<?php include_once dirname(__FILE__).'/../../common/entity/CategoryEntity.class.php';?>
<?php

class CategoryInnerPOJO
{
    private $entity;
    public function __construct(){
        $this->entity = new CategoryEntity();
    }
    
	public function findAll(){
		return $this->entity->SelectAllCategory();
	}
}
?>
