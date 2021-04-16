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

	public function register(){
		$this->load->view('pages/registration');
	}

  public function register_save(){
		$data= array(
           'name' =>$this->input->post('name'),
           'username' =>$this->input->post('username'),
           'password' =>$this->input->post('password'),
           'email' =>$this->input->post('email'),
           'address' =>$this->input->post('address'),
           'designation' =>$this->input->post('designation'),
		);

        $this->db->insert('registration',$data);
           echo "successfully added";
			}

	public function login_action()
	{
		// $this->load->view('pages/login');
		// echo '<pre>';
		// print_r($_POST);
            $username = $this->input->post('username');
            $password = $this->input->post('password');


		$this->load->model('Loginmodel');
		$result['data']=$this->Loginmodel->loginmodel($username, $password);

		// 	echo '<pre>';
		// print_r($Login_data);

		// $row = $result->result_id->num_rows;

		// if($row>0){
			$this->session->set_userdata(array(
               'username' =>  $username
			));

			// foreach ($Login_data->result_array() as $row)
			// 	{
				  
			// 	   echo $row['username'];
			// 	}

			$this->load->view('pages/index', $result);
		// }else{
		// 	echo "failed";
		// }
	}

	public function edit_data ($email){
		// echo $email;

		//$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->FROM('registration');
		
          

         // $data=array();

		$query_result=$this->db->get();
		$result['data']=$query_result->result_array();
      
		//print_r($query_result->result());
       $this->load->view('pages/edit_registration',$result);

	}

	public function register_update(){
		 $email_old = $this->input->post('email_old');

		 
		 

		$data= array(
           'name' =>$this->input->post('name'),
           'username' =>$this->input->post('username'),
           'password' =>$this->input->post('password'),
           'email' =>$this->input->post('email'),
           'address' =>$this->input->post('address'),
           'designation' =>$this->input->post('designation'),
		);

		$this->db->where('email', $email_old);
		$this->db->update('registration',$data);
           echo "successfully updated";
			}

			public function delete_data($email){
               $this->db->where('email', $email);
               $this->db->delete('registration');

                echo "successfully deleted";
			}

			public function add_new($username){
				echo $username;
			}
	}

