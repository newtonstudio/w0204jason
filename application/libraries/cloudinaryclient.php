<?php

require "./vendor/autoload.php";

use Cloudinary\Cloudinary;

class Cloudinaryclient {

	public function __construct(){

		\Cloudinary::config(array( 
		  "cloud_name" => "iteatech", 
		  "api_key" => "948589699166452", 
		  "api_secret" => "Ov-hUIQSBHqx5kiI8RuAxUc5PDI" 
		));

	}

	public function process($path, $config){

		$result = \Cloudinary\Uploader::upload($path, $config);
		return $result['secure_url'];

	}

}

?>