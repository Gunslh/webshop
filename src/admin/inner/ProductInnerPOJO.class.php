<?php include_once dirname(__FILE__).'/../../common/entity/ProductEntity.class.php';?>
<?php

class ProductInnerPOJO
{
    private $entity;
    public function __construct(){
        $this->entity = new ProductEntity();
    }
    
	public function findAll(){
		return $this->entity->SelectAllProduct();
	}
}
?>
