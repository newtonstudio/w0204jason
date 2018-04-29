<?php
class Login_manage extends CI_Controller {

	public function login(){

		$this->data['title'] = "Login";

		$this->load->view("header", $this->data);
		$this->load->view("login");
		$this->load->view("footer");

	}

	public function login_submit(){

		$username = $this->input->post("username", true);
		$password = $this->input->post("password", true);

		$this->load->model("Admin_model");

		$adminData = $this->Admin_model->getOne(array(
			'email' 	=> $username,
			'password' 	=> $password,
		));

		if(empty($adminData)) {
			redirect(base_url('login?failure=true'));
		} else {

			$this->load->library("session");

			$this->session->set_userdata("is_login", true);

			redirect(base_url('profile'));
		}


	}

}
?>