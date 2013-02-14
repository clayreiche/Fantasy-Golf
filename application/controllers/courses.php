<?php

class Courses extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoggedIn')) {
			$data = array('mycourses' => array(),'allcourses' => array());
			$sql = "select id, course_name from coursenames where id in (select course_id from usercourses where user_id = '" . $this->session->userdata('loggedInUserId') . "')";
			$query = $this->db->query($sql);
			foreach($query->result() as $row) {
				$data['mycourses'][] = $row;
			}
			$sql = "select id, course_name from coursenames";
			$query = $this->db->query($sql);
			foreach($query->result() as $row) {
				$data['allcourses'][] = $row;
			}
			
			$this->load->view('header');
			$this->load->view('menu_bar');
			$this->load->view('courses/courses', $data);
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
			//$this->load->database();
			$sql = "insert into coursenames (course_name) values('" . $this->input->post('course_name') . "')";
			$query = $this->db->query($sql);
			if(!$query) {
				echo "SOMETHING BROKE WHILE TRYING TO INSERT NEW COURSE INTO COURSENAMES TABLE!!!";
				return;
			}
			$sql = "select id from coursenames where course_name = '" . $this->input->post('course_name') . "'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0)	{
			   $row = $query->row(); 
			   $course_id = $row->id;
			}else {
				echo "SOMETHING BROKE WHILE TRYING TO GET COURSE_ID FROM COURSENAMES TABLE!!!";
				return;
			}
			$sql = "insert into courses (course_id, tbox, rating, slope, outyds, inyds, totalyds, par, image) values ('" . $course_id . "', '" . $this->input->post('tbox') . "', '" . $this->input->post('rating') . "', '" . $this->input->post('slope') . "', '" . $this->input->post('hole_yards_out') . "', '" . $this->input->post('hole_yards_in') . "', '" . $this->input->post('hole_yards_total') . "', '" . $this->input->post('course_par') . "', '" . $this->input->post('couse_image') . "')";
			$query = $this->db->query($sql);
			if(!$query) {
				echo "SOMETHING BROKE WHILE TRYING TO INSERT NEW COURSE INTO COURSES TABLE!!!";
				return;
			}
			
			$x = 0;
			$holecount = 1;
			for($x = 0; $x < 18; $x++) {
				$sql = "insert into courseholes (course_id, tbox, hole_num, yards, par, handicap) values ('" . $course_id . "', '" . $this->input->post('tbox') . "', '" . $holecount . "', '" . $_POST['hole_yards'][$x] . "', '" . $_POST['hole_par'][$x] . "', '" . $_POST['hole_handicap'][$x] . "')";
				$query = $this->db->query($sql);
				if(!$query) {
					echo "SOMETHING BROKE WHILE TRYING TO INSERT NEW COURSE INTO COURSEHOLES TABLE!!!";
					return;
				}
				$holecount++;
			}
			
			// LINK COURSE TO THE USER
			$sql = "insert into usercourses (user_id, course_id) values ('" . $this->session->userdata('loggedInUserId') . "', '" . $course_id . "')";
			$query = $this->db->query($sql);
			
			$this->load->view('header');
			$this->load->view('menu_bar');
			$this->load->view('courses/courses');
			$this->load->view('footer');
		}else {
			redirect('/');
		}
	}
	
	public function editCourse()
	{
		
	}
	
	public function viewCourse()
	{
		
	}
}

?>