<?php

class Fantasygolf extends CI_Controller {
	
	public function index()
	{
		$this->load->helper('url');
		if(!isset($this->session)) {
			$this->session->set_userdata(array('isLoggedIn' => FALSE, 'badLoginAttempts' => '0'));
		}
		if($this->isLoggedIn()) {
			redirect('/players');
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
			redirect('/players');
		}
	}
	
	public function loginPost()
	{
		$badLogins = $this->session->userdata('badLoginAttempts');
		echo $badLogins;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->load->database();
		$sql = "select * from users where email = '" . $username . "' AND password = '" . $password . "'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {		
			$this->session->set_userdata(array('isLoggedIn' => TRUE, 'badLoginAttempts' => '0'));
			redirect('/players');
		}else {
			$badLogins++;
			$this->session->set_userdata(array('isLoggedIn' => FALSE, 'badLoginAttempts' => $badLogins));
			if($badLogins > '3') {
				$query = $this->db->query("update users set status = '0' where email = '" . $username . "'");
				redirect('/players');
			}
			redirect('/fantasygolf/login');
		}
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
	
	public function accounts()
	{
		if($this->isLoggedIn()) {
			$this->load->view('header');
			$this->load->view('menu_bar');
			$this->load->view('accounts/accounts');
			$this->load->view('footer');
		}else {
			$this->load->view('header');
			$this->load->view('accounts/accounts');
			$this->load->view('footer');
		}
	}
}

?>