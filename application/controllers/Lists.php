<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lists extends CI_Controller
{

	function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('username'))
			redirect('login');
		$this->load->model('lists_model','l');
	}
	function index()
	{
		$board=$this->session->userdata('board');
		$this->load->view('header');
		$this->load->view('navigation');
		$a['result']=$this->l->get_lists($board);
		$this->load->view('lists',$a);
		$this->load->view('footer');
	}
	function edit_list()
	{
		$board=$this->session->userdata('board');	
		$name=$this->input->post('name');
		$this->session->set_userdata('list',$name);
		redirect('cards/index');
	}
	function delete_list()
	{
		$board=$this->session->userdata('board');	
		$name=$this->input->post('name');
		$this->db->query("delete from lists where name='$name' and board='$board'");
		$this->session->set_flashdata('create','<div class="alert alert-danger">DELETED SUCCESSFULLY.</div>');
		$this->index();
		$this->session->set_flashdata('create','');	
	}
	function create_list()
	{
		$board=$this->session->userdata('board');
		$name=$this->input->post('name');
		if($this->l->can_create($name,$board)==true)
		{
			$this->db->query("insert into lists values('$name','$board',0)");
			$this->session->set_flashdata('create','<div class="alert alert-success">List Created Successfully.</div>');
			$this->index();
			$this->session->set_flashdata('create','');
		}
		else
		{
			$this->session->set_flashdata('create','<div class="alert alert-danger">Sorry!! This List name exists.<br>Kindly Enter a different name to continue.</div>');
			$this->index();
			$this->session->set_flashdata('create','');
		}
	}
	function view_archive()
	{
		$board=$this->session->userdata('board');
		$this->load->view('header');
		$this->load->view('navigation');
		$a['result']=$this->l->get_archive_lists($board);
		$this->load->view('lists_1',$a);
		$this->load->view('footer');	
	}
	function archive()
	{
		$name=$this->input->post('name');
		$board=$this->session->userdata('board');
		$this->db->query("update lists set archive=1 where name='$name' and board='$board'");
		$this->session->set_flashdata('create','<div class="alert alert-success">Archived Successfully.</div>');
		$this->index();
		$this->session->set_flashdata('create','');
	}
	function unarchive()
	{
		$name=$this->input->post('name');
		$board=$this->session->userdata('board');
		$this->db->query("update lists set archive=0 where name='$name' and board='$board'");
		$this->session->set_flashdata('create','<div class="alert alert-success">Unarchived Successfully.</div>');
		$this->view_archive();
		$this->session->set_flashdata('create','');
	}
}
?>