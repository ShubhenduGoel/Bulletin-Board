<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller
{	
	function index()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('pass','<div class="alert alert-success">You have Successfully Logged out.</div>');
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
}
?>