<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cards extends CI_Controller
{

	function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('username'))
			redirect('login');
		$this->load->model('lists_model','l');
		$this->load->model('cards_model','c');
	}
	function index()
	{
		$username=$this->session->userdata('username');
		$board=$this->session->userdata('board');
		$list=$this->session->userdata('list');
		$this->load->view('header');
		$this->load->view('navigation');
		$a['result']=$this->c->get_cards($list,$board);
		$this->load->view('cards',$a);
		$this->load->view('footer');
	}
	function create_card()
	{
		$board=$this->session->userdata('board');
		$list=$this->session->userdata('list');
		$name=$this->input->post('name');
		if($this->l->can_create_card($name,$list,$board)==true)
		{
			$this->db->query("insert into cards values('$name','$list' ,'$board',0)");
			$this->session->set_flashdata('create','<div class="alert alert-success">Card Created Successfully.</div>');
			$this->index();
			$this->session->set_flashdata('create','');
		}
		else
		{
			$this->session->set_flashdata('create','<div class="alert alert-danger">Sorry!! This Card name exists.<br>Kindly Enter a different name to continue.</div>');
			$this->index();
			$this->session->set_flashdata('create','');
		}
	}
	function view_archive()
	{
		$board=$this->session->userdata('board');
		$list=$this->session->userdata('list');
		$this->load->view('header');
		$this->load->view('navigation');
		$a['result']=$this->c->get_archive_cards($list,$board);
		$this->load->view('cards_1',$a);
		$this->load->view('footer');	
	}
	function archive()
	{
		$name=$this->input->post('name');
		$board=$this->session->userdata('board');
		$list=$this->session->userdata('list');
		$this->db->query("update cards set archive=1 where name='$name' and list='$list' and board='$board'");
		$this->session->set_flashdata('create','<div class="alert alert-success">Archived Successfully.</div>');
		$this->index();
		$this->session->set_flashdata('create','');
	}
	function unarchive()
	{
		$name=$this->input->post('name');
		$board=$this->session->userdata('board');
		$list=$this->session->userdata('list');
		$this->db->query("update cards set archive=0 where name='$name' and list='$list' and board='$board'");
		$this->session->set_flashdata('create','<div class="alert alert-success">Unarchived Successfully.</div>');
		$this->view_archive();
		$this->session->set_flashdata('create','');
	}
	function delete_card()
	{
		$board=$this->session->userdata('board');	
		$name=$this->input->post('name');
		$list=$this->session->userdata('list');
		$this->db->query("delete from cards where name='$name' and list='$list' and board='$board'");
		$this->session->set_flashdata('create','<div class="alert alert-danger">DELETED SUCCESSFULLY.</div>');
		$this->index();
		$this->session->set_flashdata('create','');	
	}
	function move_card()
	{
		$board=$this->session->userdata('board');	
		$name=$this->input->post('name');
		$list=$this->session->userdata('list');
		$this->session->set_userdata('card',$name);
					
	}
}
