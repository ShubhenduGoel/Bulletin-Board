<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cards_model extends CI_Model
{
	function can_create($name,$board)
	{
		$this->db->where('name',$name);
		$this->db->where('board',$board);
		$query=$this->db->get('lists');
		if($query->num_rows() > 0)
			return false;
		return true;
	}
	function can_create_card($name,$list,$board)
	{
		$this->db->where('name',$name);
		$this->db->where('list',$list);
		$this->db->where('board',$board);
		$query=$this->db->get('cards');
		if($query->num_rows() > 0)
			return false;
		return true;
	}
	function get_cards($list,$board)
	{
		$this->db->where('board',$board);
		$this->db->where('list',$list);
		$this->db->where('archive',0);
		$query=$this->db->get('cards');
		return 	$query->result_array();
	}
	function get_archive_cards($list,$board)
	{
		$this->db->where('board',$board);
		$this->db->where('list',$list);
		$this->db->where('archive',1);
		$query=$this->db->get('cards');
		return 	$query->result_array();
	}
}
?>