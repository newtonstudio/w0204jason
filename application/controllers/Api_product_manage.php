<?php
class Api_product_manage extends CI_Controller {

	private function array_to_xml(array $arr, SimpleXMLElement $xml)
	{
	    foreach ($arr as $k => $v) {
	        is_array($v)
	            ? $this->array_to_xml($v, $xml->addChild($k))
	            : $xml->addChild($k, $v);
	    }
	    return $xml;
	}

	public function product_list(){

		$this->load->model("Product_model");

		$productList = $this->Product_model->get_where();		
		/*
		$simpleXML = new simpleXMLElement('<?xml version="1.0"?><results />');

		$result =  array(
			'status' => "OK",
			'result' => $productList,
		);

		$obj = $this->array_to_xml($result, $simpleXML);
		echo $obj->asXML();
		*/

		
		echo json_encode(array(
			'status' => "OK",
			'result' => $productList,
		));
		

	}

	public function get_product($product_id){

		$this->load->model("Product_model");

		$productData = $this->Product_model->getOne(array(
			'id' => $product_id,
		));

		echo json_encode(array(
			'status' => "OK",
			'result' => $productData,
		));


	}

	/*

		JSON


		PHP_INDEXED_ARRAY      => JSON ARRAY
		$tmp = array(                 [[1,2,3]]
			array("1","2","3")   
		);

		
		PHP_ASSOCIATIVE_ARRAY  => JSON OBJECT
		$tmp = array(              {"a":1,"b":2,"c":3}
			'a' => 1,
			'b' => 2,
			'c' => 3,
 		);

 		$productList = array(
 			array("id"=>1,"title"=>"A","price"=>123),
 			array("id"=>2,"title"=>"B","price"=>456),
 			array("id"=>3,"title"=>"C","price"=>789),
 		)

 		=> 

 		[{"id":1,"title":"A,"price":123},{"id":2,"title":"B,"price":456},{"id":3,"title":"C,"price":789}]



		*/



}
?>