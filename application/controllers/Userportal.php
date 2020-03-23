<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Userportal extends CI_Controller
{
	function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('username'))
			redirect('login');
		$this->load->model('login_model','l');
	}
	function index()
	{
		//$this->load->model('Userportal_model');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('userportal');
		$this->load->view('footer');
	}
	function change_password()
	{
		$username=$this->session->userdata('username');
		$password=md5($this->input->post('password'));
		if($this->form_validation->run('change_password_rules'))
		{
			if($this->l->valid_user($username,$password)==true)
			{
				$new_pass=md5($this->input->post('new_password'));
				$this->db->query("update users set password='$new_pass' where username='$username'");
				$this->session->set_flashdata('pass','<div class="alert alert-success">Password Changed Successfully!!</div>');	
				$this->index();
				$this->session->set_flashdata('pass','');
			}
			else
			{
				$this->session->set_flashdata('pass','<div class="alert alert-danger">Sorry!! You did not enter your current password Correctly. Please try again !!</div>');
				$this->index();
				$this->session->set_flashdata('pass','');
			}
		}
		else
			$this->index();
	}
}
?>