<?php
class Boards_model extends CI_Model
{
	function can_create($name)
	{
		$this->db->where('name',$name);
		$query=$this->db->get('boards');
		if($query->num_rows() > 0)
			return false;
		return true;
	}
	function getData($table,$column,$owner,$rowno, $rowperpage,$search='')
	{
		$this->db->select('*');
		$this->db->where('owner',$owner);
    	$this->db->where('archive',0);
    	$this->db->from($table);
    	if($search != '')
    	{
			$this->db->like($column, $search);
	    }
	    $this->db->limit($rowperpage, $rowno); 
    	$query = $this->db->get();
    	return $query->result_array();
    }
    function getrecordCount($table,$column,$owner,$search = '') 
    {
	    $this->db->select('count(*) as allcount');
	    $this->db->from($table);
	 	$this->db->where('owner',$owner);
	 	$this->db->where('archive',0);
	    if($search != '')
	    {
	    	$this->db->like($column, $search);
	    }
	    $query = $this->db->get();
	    $result = $query->result_array();
	    return $result[0]['allcount'];
  	}
	function get_boards($username)
	{
		$this->db->where('owner',$username);
		$this->db->where('archive',0);
		$query=$this->db->get('boards');
		return 	$query->result_array();
	}
	function get_archive_boards($username)
	{
		$this->db->where('owner',$username);
		$this->db->where('archive',1);
		$query=$this->db->get('boards');
		return 	$query->result_array();
	}
}
?>