<?php
class Transaction extends ItemObject
{	
	public $user;
	public $address;
	public $product;
	function __construct()
	{
		$this->tableName = "shop_transaction";
	}
	function FindById($id)
	{
		if(self::Select($id) == false)
			return false;
		$this->user = new User();
		$this->user->FindById($this->info->fk_user);
		$this->address = new Address();
		$this->address->FindById($this->info->fk_address);
		$this->product = new Product();
		$this->product->FindById($this->info->fk_product);
		
		return  true;
	}
}
?>