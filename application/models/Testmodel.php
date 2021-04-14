<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testmodel extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);

	}

	public function abc()
	{
		$data= $this->db->get('admin_registers');
		echo '<pre>';
		print_r($data->result_array());
		
	}

		public function get_data()
	{
		       // $this->db->where('id',2);
		        //$this->db->order_by('id','desc');
		        //$this->db->limit(1);
		$data= $this->db->order_by('id','desc')->limit(1)->get('user_registers');
		echo '<pre>';
		print_r($data->result_array());
		
	}


}
