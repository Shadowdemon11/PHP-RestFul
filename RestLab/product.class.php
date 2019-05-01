<?php
class Product{
	private $product;
	
	var $hm = array("Apples"=>3.99,"Peaches"=>4.05,
            "Pumpkin"=>13.99,
            "Pie"=>8.00);
	
	public function __construct(){
	
	
	}
	public function getPrice($product)
	{
		try
            {
                $price = $hm[$product];
                return $price;
            }
            catch(Exception $e)
            {
                return 0;
            }
	}
	public function getInfo()
        {
            $temp = array ("String[] GetMethods",
      "GetPrice(String product)",
      "String[] GetProducts()","String GetCheapest()","String GetCostliest()");
            return $temp;
        }
	
	public function getNames()
        {
            $temp = array_keys($hm);
            return $temp;
        }
        
	public function getCheapest()
        {
            $send = $min = min($hm);
            return $send;
        }
	
	public function getCostliest()
        {
            $send = $max = max($hm);
            return $send;
        }
	
}
?>