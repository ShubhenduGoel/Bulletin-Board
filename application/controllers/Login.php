<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username'))
			redirect('dashboard');
	}
	function index()
	{
		$this->load->view('header');
		$this->load->view('login');	
		$this->load->view('footer');
	}
	function verify()
	{
		if($this->form_validation->run('login_rules'))
		{
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			$this->load->model('login_model');
			if($this->login_model->valid_user($username,$password)==true)
			{
				$this->session->set_userdata('username',$username);
				redirect('dashboard'); 
			}
			else
			{
				$this->session->set_flashdata('pass','<div class="alert alert-danger">Login Failed</div>');
				$this->index();
			}
		}
		else
		{
			$this->index();
		}
	}
	function signup()
	{
		if($this->form_validation->run('signup_rules'))
		{
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			$this->load->model('login_model');
			if($this->login_model->can_register($username)==true)
			{
				$this->db->query("insert into users values('$username','$password')");
				$this->session->set_flashdata('pass','<div class="alert alert-success">Signup Successfull.<br>Kindly Login</div>');
				$this->index();	
			}
			else
			{
				$this->session->set_flashdata('pass','<div class="alert alert-danger">Sorry UserName already in use.<br>Kindly try another one.</div>');
				$this->index();
			}
		}
		else
		{
			$this->index();
		}
	}
}
?>