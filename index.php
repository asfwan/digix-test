<?php
	
	//include classes
	require_once('classes/Checkout.php');
	require_once('classes/Deals.php');
	require_once('classes/Item.php');
	
	//load catalogue and extract
	$catalogues = require_once('data/catalogue.php');
	extract($catalogues);
	
	//load deals and extract
	$deals = require_once('data/deals.php');
	extract($deals);
	
	
	
	// create new checkout [1]
	$co = new Checkout([
		'deals'=>[$atv_deals,$ipd_deals,$mbp_deals]
	]);
	
	$co->scan($atv);
	$co->scan($atv);
	$co->scan($atv);
	$co->scan($vga);
	$co->total();
	
	echo "<br><br>";
	
	
	
	
	
	// create new checkout [2]
	$co = new Checkout([
		'deals'=>[$atv_deals,$ipd_deals,$mbp_deals]
	]);
	
	$co->scan($atv);
	$co->scan($ipd);
	$co->scan($ipd);
	$co->scan($atv);
	$co->scan($ipd);
	$co->scan($ipd);
	$co->scan($ipd);
	$co->total();
	
	echo "<br><br>";
	
	
	
	
	
	// create new checkout [3]
	$co = new Checkout([
		'deals'=>[$atv_deals,$ipd_deals,$mbp_deals]
	]);
	
	$co->scan($mbp);
	$co->scan($vga);
	$co->scan($ipd);
	$co->total();
	
	