<?php
class Profile_manage extends CI_Controller {

	private $data;

	public function test(){
		
	}

	public function __construct(){
		parent::__construct();
		$this->data = array();

		$this->load->library("session");

		$islogin = $this->session->userdata("is_login");

		if(empty($islogin)) {
			redirect(base_url('login'));
		}


	}

	public function index($page=1){

		$this->load->model("Visitor_model");

		$dataList = $this->Visitor_model->get_where(array());

		$dateGroup = array();

		if(!empty($dataList)) {
			foreach($dataList as $v) {

				if(isset($dateGroup[substr($v['created_date'],0,7)])) {
					$dateGroup[substr($v['created_date'],0,7)]++;
				} else {
					$dateGroup[substr($v['created_date'],0,7)] = 1;
				}

			}
		}

		ksort($dateGroup);

		$finalFormat = array(
			array("Month", "Qty")
		);

		if(!empty($dateGroup)){
			foreach($dateGroup as $k=>$v) {
				$finalFormat[] = array(
					$k, $v
				);
			}
		}



		$this->data['finalFormat'] = $finalFormat;
		$this->data['title'] = "Profile";

		$this->load->model("Contact_model");

		$total_contact = $this->Contact_model->record_count(array(
			'is_deleted' => 0,
		));

		$limit = 10;

		$this->load->library("pagination");
		$config = array(
			'base_url' => base_url('profile'),
			'total_rows' => $total_contact,
			'per_page' => $limit,
			'use_page_numbers' => true,

			'full_tag_open' => '<ul class="pagination">',
			'full_tag_close' => '</ul>',

			'first_tag_open' => "<li>",
			'first_tag_close' => "</li>",
			'first_link'	=> "First",

			'last_tag_open' => "<li>",
			'last_tag_close' => "</li>",
			'last_link'	=> "Last",

			'prev_tag_open' => "<li>",
			'prev_tag_close' => "</li>",
			'prev_link'	=> '<span aria-hidden="true">&laquo;</span>',

			'next_tag_open' => "<li>",
			'next_tag_close' => "</li>",
			'next_link'	=> '<span aria-hidden="true">&raquo;</span>',

			'cur_tag_open' => '<li class="active"><a href="#">',
			'cur_tag_close' => "</a></li>",

			'num_tag_open' => '<li>',
			'num_tag_close' => "</li>",
			
		);

		$this->pagination->initialize($config);

		$pagination = $this->pagination->create_links();

		$this->data['pagination'] = $pagination;

		$start = ($page - 1) * $limit;

		$total_page = ceil( $total_contact / $limit );


		$this->data['contactList'] = $this->Contact_model->fetch($limit, $start, array(
			'is_deleted' => 0,
		));


		/*

		//traditional way of pagination
		

		

		$this->data['total_page'] = $total_page;
		$this->data['page'] = $page;
		*/


		$this->load->view("header", $this->data);
		$this->load->view("profile");
		$this->load->view("footer");

	}

	public function delete($id){

		$this->load->model("Contact_model");
		$this->Contact_model->update(array(
			'id' => $id,
		),array(
			'is_deleted' 	=> 1,
		));
		redirect(base_url('profile'));

	}

	public function contactGenerator(){
		$this->load->model("Contact_model");

		for($i=0; $i < 1000; $i++) {

			$this->Contact_model->insert(array(
				'name' 			=> "Name ".$i,
				'email' 		=> "abc".$i."@gmail.com",
				'is_deleted' 	=> 0,
				'created_date'  => date("Y-m-d H:i:s"),
			));

		}

	}


	public function visitorGenerator(){
		$this->load->model("Visitor_model");

		for($i=0; $i < 1000; $i++) {


			$randomNumber = rand(0, 365);

			$this->Visitor_model->insert(array(
				'qty' 			=> 1,
				'created_date'  => date("Y-m-d H:i:s", time()+$randomNumber*24*3600),
			));

		}

	}

}
?>