<?php
//class for the deals
class Deals{
	public function __construct($params=[]){
		$this->sku = isset($params['sku'])?$params['sku']:NULL;
		$this->count = isset($params['count'])?$params['count']:NULL;
		
		//these are types of rules for the deals
		$this->deduct = isset($params['deduct'])?$params['deduct']:NULL; //deduct price when buy 3 [get one free]
		$this->discount_each = isset($params['discount_each'])?$params['discount_each']:NULL; //discount each product when exceed certain amount
		$this->discount_with_other = isset($params['discount_with_other'])?$params['discount_with_other']:NULL; //discount when bought with other product
		return $this;
	}
	
	public function with($deals){
    	return $this;
	}
}