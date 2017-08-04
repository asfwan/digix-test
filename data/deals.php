<?php

return [
	// the deals
	'atv_deals' => new Deals([
		'sku'=>'atv',
		'count'=>3,
		'deduct'=>$atv->price
	]),
	
	'ipd_deals' => new Deals([
		'sku'=>'ipd',
		'count'=>4,
		'discount_each'=>50
	]),
	
	'mbp_deals' => new Deals([
		'sku'=>'mbp',
		'count'=>1,
		'discount_with_other'=>$vga
	]),
];