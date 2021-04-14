<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

		public function home()
	{
		$this->load->model('Testmodel');	
		$this->Testmodel->abc();

	}

		public function get_data()
	{
		$this->load->model('Testmodel');	
		$this->Testmodel->get_data();

	}

		public function session()
	{
         echo base_url();

          // for set session
		$this->session->set_userdata(array(
            'id' =>1,
            'token' =>'sbduaskjfjsdalfds'
		));

		//echo  $this->session->id; die;

		// for unset session 
        // $this->session->sess_destroy();

		//$this->load->library('session');
		 echo '<pre>';
		 print_r($this->session);

	}
}
