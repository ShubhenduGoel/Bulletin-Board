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
	function can_register($username,$email)
	{
		$this->db->where('username',$username);
		$query=$this->db->get('users');
		$query1=$this->db->query("select * from users where email='$email'");
		if($query->num_rows()>0 && $query1->num_rows()>0)
			return 3;
		else if($query->num_rows()>0)
			return 2;
		else if($query->num_rows()>0)
			return 1;
		else	
			return 0;
	}
	function send($email)
	{
  		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'goelshubhendu@gmail.com', // change it to yours
		'smtp_pass' => 'hogakuch', // change it to yours
		'mailtype' => 'html',
		'charset' => 'iso-8859-1',
		'wordwrap' => TRUE
  		);
  		$len=10;
  		$characters ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  		$randomString = '';
    	for ($i = 0; $i < $len; $i++) 
    	{ 
	        $index = rand(0, strlen($characters) - 1); 
	        $randomString .= $characters[$index]; 
    	}

    	$password=md5($randomString);
    	$this->db->query("update users set password='$password' where email='$email'");
  		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('goelshubhendu@gmail.com', "Bulletin Admin");
		$this->email->to($email);
		$this->email->subject("Reset Your password");
		$this->email->message("Dear User,".""."\r\nYour Password has been set to ". $randomString . "\r\nKindly Login http://35.223.62.119/ here and change your Password.".""."\r\nThanks\r\n".""."Admin Team");
		$this->email->send();
 	}
}

?>