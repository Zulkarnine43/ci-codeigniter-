<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeController extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}

		public function index()
	{
		$this->load->view('pages/login');
	}

	public function login_action()
	{
		// $this->load->view('pages/login');
		// echo '<pre>';
		// print_r($_POST);
            $username = $this->input->post('username');
            $password = $this->input->post('password');


		$this->load->model('Loginmodel');
		$Login_data=$this->Loginmodel->loginmodel($username, $password);

		// 	echo '<pre>';
		// print_r($Login_data);

		$row = $Login_data->result_id->num_rows;

		if($row>0){
			$this->session->set_userdata(array(
               'username' =>  $username
			));

			
			// foreach ($Login_data->result_array() as $row)
			// 	{
				  
			// 	   echo $row['username'];
			// 	}

			$this->load->view('pages/index');
		}else{
			echo "failed";
		}
	}
}
