<?php
require_once "RestService.class.php";
require_once "product.class.php";

class MyService extends RestService{
	//normally would use database or other data store
	public $products;
	
	public function __construct($request,$origin){
		parent::__construct($request);
		
		for ($i=0;$i< 5;$i++){
			$this ->products[] = new Product();
		}
	}
	
	protected function product($args){
		if($this->endpoint =="/Services" && $this->method == "GET"){
			$prods = array();
			foreach($this-> products as $prod){
				$prods = array("getInfo"=>$prod->getInfo());
			}
			return $prods;
		}else if ($this->endpoint =="/Products/{$args[1]}" && $this-> method == "GET"){
			$prods = array();
			foreach($this-> products as $prod){
				$prods = array("getPrice"=>$prod->getPrice($args[1]));
			}
			return $prods;
			}
		else if ($this->endpoint =="/Products" && $this-> method == "GET"){
			$prods = array();
			foreach($this-> products as $prod){
				$prods = array("getNames"=>$prod->getNames());
			}
			return $prods;
			}
		else if ($this->endpoint =="/Products/Cheapest" && $this-> method == "GET"){
			$prods = array();
			foreach($this-> products as $prod){
				$prods = array("getCheapest"=>$prod->getCheapest());
			}
			return $prods;
			}
		else if ($this->endpoint =="/Products/Costliest" && $this-> method == "GET"){
			$prods = array();
			foreach($this-> products as $prod){
				$prods = array("getCostliest"=>$prod->getCostliest());
			}
			return $prods;
			}
			
			else{
				return parent::_response("Requested resource doesn't exists 404");
			}
	
	if ($this->method == "POST"){
			return "Post worked";	
		}
	

	



try{
	$API = new MyService($_REQUEST['request'],$_SERVER['HTTP_ORIGIN']);
	echo $API->processAPI();
}
catch(Exception $e){
	echo json_encode(Array('error'=>$e->getMessage()));
}
}
}

?>