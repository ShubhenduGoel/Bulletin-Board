<?php

class Login_model extends CI_Model
{
	function valid_user($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query=$this->db->get('users');
		if($query->num_rows() > 0)
			return true;
		return false;
	}
	function can_register($username)
	{
		$this->db->where('username',$username);
		$query=$this->db->get('users');
		if($query->num_rows()>0)
			return false;
		return true;
	}
}

?>