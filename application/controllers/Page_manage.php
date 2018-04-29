<?php
class Page_manage extends CI_Controller {

	private $data;

	public function __construct(){
		parent::__construct();

		

		$this->data = array();

		$this->data['description'] = "Welcome to our shopping page";
		$this->data['keywords'] = "shopping,accessories,3c,iphone";
	}

	public function index(){

		
		$this->data['title'] = "HOME";

		$this->load->view("header", $this->data);
		$this->load->view("index");
		$this->load->view("footer");
	}

	public function about(){
		
		$this->data['title'] = "ABOUT";

		$this->load->view("header", $this->data);
		$this->load->view("about");
		$this->load->view("footer");
	}

	public function contact(){
		
		$this->data['title'] = "CONTACT";

		$this->load->view("header", $this->data);
		$this->load->view("contact");
		$this->load->view("footer");
	}

	private function productCommon(){
		$this->load->model("Product_model");
	}

	public function product(){

		

		$this->productCommon();
		
		$this->data['title'] = "PRODUCT";
		
		$this->data['product_list'] = $this->Product_model->get_where();


		$this->output->cache(10);
		$this->load->view("header", $this->data);
		$this->load->view("product");
		$this->load->view("footer");
		
	}

	public function product_detail($id, $title) {

		$this->productCommon();

		$this->data['title'] = urldecode($title);

		$this->data['id'] = $id;


		$productData =$this->Product_model->getOne(array(
			'id' => $id,
		));

		$this->data['productData'] = $productData;

		$this->load->view("header", $this->data);
		$this->load->view("product_detail");
		$this->load->view("footer");


	}

	public function contact_submit(){

		/*

		$email 		= $_POST['email'];
		$name 		= $_POST['name'];
		$tel 		= $_POST['tel'];
		$gender 	= $_POST['gender'];
		$Country 	= $_POST['Country'];
		$marketing 	= implode(",", $_POST['marketing']);
		$message        = $_POST['msg'];

		*/
		$this->load->library("cloudinaryclient");



		

		$email = $this->input->post("email", true);
		$name = $this->input->post("name", true);
		$tel = $this->input->post("tel", true);
		$gender = $this->input->post("gender", true);
		$Country = $this->input->post("Country", true);
		$marketing = $this->input->post("marketing", true);
		$msg = $this->input->post("msg", true);

		$this->load->model("Contact_model");

		$insert_array = array(
			'email' => $email,
			'name' => $name,
			'tel' => $tel,
			'gender' => $gender,
			'Country' => $Country,
			'marketing' => implode(",",$marketing),
			'msg' => $msg,
		);


		if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {

			$url = $this->cloudinaryclient->process($_FILES['picture']['tmp_name'], array(
				'width' => 400, 
				'height' => 300,
				'crop' => "fill", 
				"format" => "jpg",
				'gravity' => "face"
			));

			$insert_array['avatar'] = $url;

		}




		$this->Contact_model->insert($insert_array);

		$this->load->library("emailer");

		$this->emailer->send("Your shopping site has a new contact!", json_encode(array(
			'email' => $email,
			'name' => $name,
			'tel' => $tel,
			'gender' => $gender,
			'Country' => $Country,
			'marketing' => implode(",",$marketing),
			'msg' => $msg,
		)));

		redirect(base_url('contact?success=true'));


	}

}
?>