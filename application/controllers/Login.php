<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username'))
			redirect('dashboard/index');
	}
	function index()
	{
		$this->load->view('header');
		$this->load->view('login');	
		$this->load->view('footer');
	}
	function forgot()
	{
		$email=$this->input->post('email');
		$this->load->model('login_model');
		$query=$this->db->query("select * from users where email='$email'");
		if($query->num_rows()>0)
		{
			$this->login_model->send($email);	
			$this->session->set_flashdata('pass','<div class="alert alert-success">An Email has been sent at your address.<br>Kindly Reset Your password .</div>');
			$this->index();	
			$this->session->set_flashdata('pass','');
		}
		else
		{
			$this->session->set_flashdata('pass','<div class="alert alert-danger">Sorry!!! No user found corresponding to this email.</div>');
			$this->index();	
			$this->session->set_flashdata('pass','');	
		}
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
				$this->session->set_flashdata('pass','');
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
			$email=$this->input->post('email');
			$this->load->model('login_model');
			if($this->login_model->can_register($username,$email)==0)
			{
				$this->db->query("insert into users values('$username','$password','$email')");
				$this->session->set_flashdata('pass','<div class="alert alert-success">Signup Successfull.<br>Kindly Login</div>');
				$this->index();	
				$this->session->set_flashdata('pass','');
			}
			else if($this->login_model->can_register($username,$email)==3)
			{
				$this->session->set_flashdata('pass','<div class="alert alert-danger">Sorry UserName and Email are already in use.<br>Kindly try another one.</div>');
				$this->index();
				$this->session->set_flashdata('pass','');
			}
			else if($this->login_model->can_register($username,$email)==2)
			{
				$this->session->set_flashdata('pass','<div class="alert alert-danger">Sorry UserName already in use.<br>Kindly try another one.</div>');
				$this->index();
				$this->session->set_flashdata('pass','');
			}
			else if($this->login_model->can_register($username,$email)==1)
			{
				$this->session->set_flashdata('pass','<div class="alert alert-danger">Sorry Email already in use.<br>Kindly try another one.</div>');
				$this->index();
				$this->session->set_flashdata('pass','');
			}
		}
		else
		{
			$this->index();
		}
	}
}
?>