<?php

class Fantasygolf extends CI_Controller {
	
	public function index()
	{
		$this->load->helper('url');
		if(!isset($this->session)) {
			$this->session->set_userdata(array('isLoggedIn' => FALSE));
		}
		if($this->isLoggedIn()) {
			redirect('/player');
		}else {
			$this->load->view('header');
			$this->load->view('fantasy_golf');
			$this->load->view('footer');
		}
	}
	
	public function isLoggedIn()
	{
		return $this->session->userdata('isLoggedIn');
	}
		
	public function login()
	{
		if(!$this->session->userdata('isLoggedIn')) {
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}else {
			redirect('/player');
		}
	}
	
	public function loginPost()
	{
		$this->session->set_userdata(array('isLoggedIn' => TRUE));
		redirect('/player');
	}
	
	public function logout()
	{
		$this->session->set_userdata(array('isLoggedIn' => FALSE));
		redirect('/');
	}
	
	public function contactus()
	{
		if($this->isLoggedIn()) {
			$this->load->view('header');
			$this->load->view('menu_bar');
			$this->load->view('contact_us');
			$this->load->view('footer');
		}else {
			$this->load->view('header');
			$this->load->view('contact_us');
			$this->load->view('footer');
		}
	}
	
	public function account()
	{
		if($this->isLoggedIn()) {
			$this->load->view('header');
			$this->load->view('menu_bar');
			$this->load->view('account');
			$this->load->view('footer');
		}else {
			$this->load->view('header');
			$this->load->view('account');
			$this->load->view('footer');
		}
	}
}

?>