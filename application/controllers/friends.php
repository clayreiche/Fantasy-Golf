<?php

class Friends extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoggedIn')) {
			$this->load->view('header');
			$this->load->view('menu_bar');
			$this->load->view('friends.php');
			$this->load->view('footer');
		}else {
			redirect('/');
		}
	}
}

?>