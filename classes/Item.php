<?php
	
// class for the product
class Item{
	public function __construct($params=[]){
		$this->name = isset($params['name'])?$params['name']:NULL;
		$this->sku = isset($params['sku'])?$params['sku']:NULL;
		$this->price = isset($params['price'])?$params['price']:NULL;
	}
}