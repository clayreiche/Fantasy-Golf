<?php

class Courses extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoggedIn')) {
			$data[''] = '';
			
			$this->load->view('header');
			$this->load->view('menu_bar');
			$this->load->view('courses/courses');
			$this->load->view('footer');
		}else {
			redirect('/');
		}
	}
	
	public function addCourse()
	{
		if($this->session->userdata('isLoggedIn')) {
			$this->load->view('header');
			$this->load->view('menu_bar');
			$this->load->view('courses/addcourse');
			$this->load->view('footer');
		}else {
			redirect('/');
		}
	}
	
	public function createCourse()
	{
		if($this->session->userdata('isLoggedIn')) {
			$this->load->view('header');
			$this->load->view('menu_bar');
			$this->load->view('courses/successcourse');
			$this->load->view('footer');
		}else {
			redirect('/');
		}
	}
}

?>