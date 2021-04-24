<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeController extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
		 $this->load->library('email');
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



                $sdata=array();
                $error="";
		        $config['upload_path']          = 'image/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100000;
                $config['max_width']            = 2048;
                $config['max_height']           = 1024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                        $error =  $this->upload->display_errors();

                    
                }
                else
                {
                        $sdata = $this->upload->data();
                        
                        $data['image']=$config['upload_path'].$sdata['file_name'];
                }


// Email verification Start
    $config = Array(
     'protocol' => 'smtp',
     'smtp_host' => 'ssl://smtp.gmail.com',
     'smtp_port' => '465',
     'smtp_timeout' => '60',

     'smtp_user' => 'md.shaon4100@gmail.com', // change it to yours
     // 'smtp_pass' => 'zpqhnhmssouswukq', // change it to yours
     'smtp_pass' => 'Sh@on599',
     'mailtype' => 'html',
     'charset' => 'utf-8',
     'wordwrap' => TRUE
  );

    $email=$this->input->post('email');
    $message=$this->input->post('designation');
   
   $this->load->library('email', $config);

  $this->email->set_newline("\r\n");
  // $this->email->initialize($config);
  $this->email->from('md.shaon4100@gmail.com');
  $this->email->to($email);  
  $this->email->subject("Email Verification");
  $this->email->message($message);
  $this->email->send();


//  $to =  $this->input->post('email');  

// $config = Array(
//         'protocol'  => 'smtp',
//         'smtp_host' => 'smtp.gmail.com',
//         'smtp_port' => 465,
//         'smtp_user' => 'md.shaon4100@gmail.com',
//         'smtp_pass' => 'Sh@on599',
//         'mailtype'  => 'html',
//         'charset'   => 'utf-8'

//     );

//     $this->load->library('email', $config);
//     $this->email->set_newline("\r\n");

//     $this->email->from('md.shaon4100@gmail.com');
//     $this->email->to($to);

//     $this->email->subject('mail from website');
//     $this->email->message('click here');

//     $this->email->send();


    // $config['protocol']    = 'smtp';
    // $config['smtp_host']    = 'ssl://smtp.gmail.com';
    // $config['smtp_port']    = '465';
    // $config['smtp_timeout'] = '60';

    // $config['smtp_user']    = 'md.shaon4100@gmail.com';    //Important
    // $config['smtp_pass']    = 'zpqhnhmssouswukq';  //Important

    // $config['charset']    = 'utf-8';
    // $config['newline']    = "\r\n";
    // $config['mailtype'] = 'html'; // or html
    // $config['validation'] = TRUE; // bool whether to validate email or not 

     
    // $to =  $this->input->post('email');  // User email pass here
    // $subject = 'Welcome To ci';

    // $from = 'md.shaon4100@gmail.com';  
    // $emailContent= 'check mail'; 

    // $this->email->initialize($config);
    // $this->email->set_mailtype("html");
    // $this->email->from($from);
    // $this->email->to($to);
    // $this->email->subject($subject);
    // $this->email->message($emailContent);
    // $this->email->send();

// Email verification End


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

