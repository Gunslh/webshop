<?php include_once dirname(__FILE__).'/../../common/entity/CustomizedEntity.class.php';?>
<?php

class CustomizedInnerPOJO
{
    private $entity;
    public function __construct(){
        $this->entity = new CustomizedEntity();
    }
    public function getAll()
    {
    	return $this->entity->getAll();
    }
    public function getByGuid($guid)
    {
    	return $this->entity->getByGuid($guid);
    }
    public function getByUser($usrid)
    {
    	return $this->entity->getByUser($usrid);
    }
    public function comfired($id)
    {
    	return $this->entity->comfired($id);
    }
    public function getAllUncomfired()
    {
    	return $this->entity->getAllUncomfired();
    }
    
	
}
?>
