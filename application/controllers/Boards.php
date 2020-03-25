<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Boards extends CI_Controller
{

	function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('username'))
			redirect('login');
		$this->load->model('boards_model','b');
	}
	function index()
	{
		$username=$this->session->userdata('username');
		$this->load->view('header');
		$this->load->view('navigation');
		$a['result']=$this->b->get_boards($username);
		$this->load->view('boards',$a);
		$this->load->view('footer');
	}
	function loadboard($rowno=0)
	{
		$username=$this->session->userdata('username');
		$search_text="";
		if($this->input->post('search')!=NULL)
		{
			$search_text=$this->input->post('search');
			$this->session->set_userdata(array("search"=>$search_text));
		}
		else
		{
			if($this->session->userdata('search') != NULL)
			{
        		$search_text=$this->session->userdata('search');
      		}
		}
		$rowperpage=3;
		if($rowno != 0)
		{
      		$rowno = ($rowno-1) * $rowperpage;
   	 	}
   	 	$allcount=$this->b->getrecordCount('boards','name',$username,$search_text);
   	 	$users_record = $this->b->getData('boards','name',$username,$rowno,$rowperpage,$search_text);
   	 	$config['base_url']=base_url().'index.php/boards/loadboard';
   	 	$config['use_page_numbers'] = TRUE;
    	$config['total_rows'] = $allcount;
    	$config['per_page'] = $rowperpage;
		
    	$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
	    $data['result'] = $users_record;
	    $data['row'] = $rowno;
	    $data['search'] = $search_text;
	    $this->load->view('header');
	    $this->load->view('navigation');
		$this->load->view('boards_2',$data);
		$this->load->view('footer');
	}
	function view_archive()
	{
		$username=$this->session->userdata('username');
		$this->load->view('header');
		$this->load->view('navigation');
		$a['result']=$this->b->get_archive_boards($username);
		$this->load->view('boards_1',$a);
		$this->load->view('footer');	
	}
	function new_board()
	{
		$username=$this->session->userdata('username');
		$name=$this->input->post('name');
		if($this->b->can_create($name)==true)
		{
			$this->db->query("insert into boards(owner,name) values('$username','$name')");
			$this->session->set_flashdata('create','<div class="alert alert-success">Board Created Successfully.</div>');
			$this->index();
			$this->session->set_flashdata('create','');
		}
		else
		{
			$this->session->set_flashdata('create','<div class="alert alert-danger">Sorry!! This bulletin name exists.<br>Kindly Enter a different name to continue.</div>');
			$this->index();
			$this->session->set_flashdata('create','');
		}
	}
	function edit_board()
	{	
		$name=$this->input->post('name');
		$this->session->set_userdata('board',$name);
		redirect('lists/index');	
	}
	function delete_board()
	{
		$name=$this->input->post('name');
		$this->db->query("delete from boards where name='$name'");
		$this->db->query("delete from lists where board='$name'");
		$this->db->query("delete from cards where board='$name'");
		$this->session->set_flashdata('create','<div class="alert alert-danger">DELETED SUCCESSFULLY.</div>');
		$this->index();
		$this->session->set_flashdata('create','');
	}
	function archive()
	{
		$name=$this->input->post('name');
		$this->db->query("update boards set archive=1 where name='$name'");
		$this->session->set_flashdata('create','<div class="alert alert-success">Archived Successfully.</div>');
		$this->index();
		$this->session->set_flashdata('create','');
	}
	function unarchive()
	{
		$name=$this->input->post('name');
		$this->db->query("update boards set archive=0 where name='$name'");
		$this->session->set_flashdata('create','<div class="alert alert-success">Unarchived Successfully.</div>');
		$this->view_archive();
		$this->session->set_flashdata('create','');
	}
	function members()
	{
		$name=$this->input->post('name');
		$this->session->set_userdata('board',$name);
		$this->db->query("drop table if exists temp");
		$this->db->query("create table temp(username varchar(30));");
		$name=$this->session->userdata('board');
		$this->db->query("insert into temp select owner from boards where name='$name'"); 
		$this->db->query("drop table if exists temp1");
		$this->db->query("create table temp1(username varchar(30));");
		$this->db->query("insert into temp1 select users.username from users left join temp on temp.username =users.username where temp.username is null");
		$query=$this->db->query("select * from temp1");
		$a['result']=$query->result_array();
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('boards_3',$a);
		$this->load->view('footer');	
	}
	function add_member()
	{
		$name=$this->input->post('name');
		$brd=$this->session->userdata('board');
		$this->db->query("insert into boards(owner,name) values('$name','$brd')");
		$this->db->query("drop table if exists temp");
		$this->db->query("create table temp(username varchar(30));");
		$brd=$this->session->userdata('board');
		$this->db->query("insert into temp select owner from boards where name='$brd'"); 
		$this->db->query("drop table if exists temp1");
		$this->db->query("create table temp1(username varchar(30));");
		$this->db->query("insert into temp1 select users.username from users left join temp on temp.username =users.username where temp.username is null");
		$query=$this->db->query("select * from temp1");
		$a['result']=$query->result_array();
		$this->load->view('header');
		$this->load->view('navigation');
		$this->session->set_flashdata('create','<div class="alert alert-success">Added Successfully.</div>');
		$this->load->view('boards_3',$a);
		$this->load->view('footer');	
		$this->session->set_flashdata('create','');
	}


}
?>