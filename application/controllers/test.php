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

	  public function product_form()
	{
		$this->load->view('product_form');	
	}

	public function add_cart()
	{
		$this->load->library('cart');

		// Set array for send data.
			$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty'),
			);

			// This function add items into cart.
			$this->cart->insert($insert_data);

			redirect('/view_cart');
}

	public function view_cart()
	{
		$this->load->view('view_cart');	
	}
}

