<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lists_model extends CI_Model
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
		$this->db->where('list',$list);
		$this->db->where('board',$board);
		$this->db->where('archive',0);
		$query=$this->db->get('cards');
		return 	$query->result_array();
	}	
	function get_lists($board)
	{
		$this->db->where('board',$board);
		$this->db->where('archive',0);
		$query=$this->db->get('lists');
		return 	$query->result_array();
	}
	function get_count_lists($board)
	{
		$this->db->select('count(*) as allcount');
		$this->db->where('board',$board);
		$this->db->from('lists');
		$query = $this->db->get();
	    $result = $query->result_array();
	    return $result[0]['allcount'];
	}
	function get_archive_lists($board)
	{
		$this->db->where('board',$board);
		$this->db->where('archive',1);
		$query=$this->db->get('lists');
		return 	$query->result_array();
	}
}
?>