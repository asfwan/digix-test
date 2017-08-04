<?php
//class for the checkout
class Checkout{
	private $totals = 0;
	private $deduct = 0;
	
	public function __construct($params=[]){
		$this->deals = isset($params['deals'])?$params['deals']:NULL;
		//if($this->deals) echo "Deals are set!<br>";
	}
	
	public function total(){
    	$this->process_deals();
    	foreach($this->items as $item){
	    	$this->totals += $item->price;
    	}
    	$this->totals -= $this->deduct;
    	echo "Total price of scanned items: \$".$this->totals." (plus deduction of \$".$this->deduct.")";
	}
	
	public function scan($item){
    	$this->items[] = $item;
    	echo "Scanned ".$item->name."<br>";
	}
	
	public function process_deals(){
    	foreach($this->deals as $deal){
	    	$sku = $deal->sku;
	    	$sku_count = 0;
	    	$one_time_flag = true;
	    	foreach($this->items as $item){
		    	if($item->sku == $sku){
			    	$sku_count ++;
			    	
			    	// rule 1
			    	if($deal->deduct){
				    	if($sku_count == $deal->count){
							$sku_count = 0;
							//echo "DEAL!";
							$this->deduct += $deal->deduct;
				    	}
		    		}
		    		if($deal->discount_each){
			    		if($sku_count >= $deal->count){
				    		//echo "DISC!";
					    	if($one_time_flag) {
						    	$this->deduct += $deal->discount_each * ($deal->count);
						    	$one_time_flag = false;
						    }
					    	else $this->deduct += $deal->discount_each;
				    	}
			    	}
			    	if($deal->discount_with_other){
				    	if($sku_count == $deal->count){
							$sku_count = 0;
							//echo "DISC_OTH!";
							$others_count = 0;
							foreach($this->items as $item){
								if($item->sku==$deal->discount_with_other->sku){
									$others_count ++;
								}
							}
							$this->deduct += $deal->discount_with_other->price;
							
				    	}
			    	}
			    }
			    
	    	}
    	}
	}
}