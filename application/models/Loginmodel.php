<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);

	}

	public function loginmodel($username, $password)
	{
	 $this->db->where(array(
       'username' => $username,
       'password' => $password
	 ));

	 $data=$this->db->get('registration');
     // echo '<pre>';
     // print_r($data);
      return $data->result_array();


	}

}
