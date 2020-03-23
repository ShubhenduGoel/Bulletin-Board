<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username'))
			redirect('login');
	}
	function index()
	{
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('dashboard');
		$this->load->view('footer');	
	}
	
}

?>