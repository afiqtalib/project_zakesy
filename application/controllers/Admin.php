<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
     public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kuala_Lumpur');	
        error_reporting(E_ERROR | E_PARSE);
	}

    public function index()
	{       
		$this->load->view('admin_v_login');
	}

    function login ()
    {
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if ($this->form_validation->run() == TRUE) {
            //true -- insert input 
            $email=$this->input->post('email');
            $password=md5($this->input->post('password'));
            // check user in database 
            // $table     		= "admin";
			// $arrayWhere 	= array(
            //                     'email'=>$email,
            //                     'password'=>$password
			// 				);
            // $query=$this->M_query->specific_row($arrayWhere, $table);
            // if(!empty($query)) {
            //     // set user session 
            //     $session_data = array(
            //                         'admin_id' 	=> $query['admin_id'],
            //                         'admin_name' => $query['admin_name'],
            //                         'email' 	=> $query['email'],
            //                     );
            //     $this->session->set_userdata($session_data);
            //     redirect('admin/home');
            // }
            $query=$this->M_query->can_login($email,$password);
            if ($query==TRUE) {
                // set user session
                $session_data = array(
                                    'email' 	=> $email,
                                    'password' 	=> $password
                                );
                $this->session->set_userdata($session_data);
                redirect('admin/home');
            }
            else {
                // invalid - send msg ERROR
                $this->session->set_flashdata('error', '');
                // echo "<script type='text/javascript'>alert('Invalid BOSSS.');</script>"; 
                redirect("admin", "refresh");
            }
        }
        else { 
            // false
            $this->load->view('admin_v_login');
        }
    }

    public function home () 
    {
        // CALL SESSION
        $data['email']=$this->session->userdata('email');
        echo $this->session->userdata('admin_id');
        $data['nama']=$this->session->userdata('admin_name');
        echo "<pre>";
            print_r($this->session->userdata());
            echo md5('12345');
        echo "</pre>";
        $this->load->view('admin_v_home',$data);
    }

    function loginnnn ()
    {
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if ($this->form_validation->run() == TRUE) {
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            // check user in database 
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where(array('email'=>$email, 'password'=>$password));
            $query = $this->db->get();

            $user = $query->row();
            // if user are exist
            if ($user->phone) {

                // temporary message
                $this->session->set_flashdata("success", "You are logged in");

                // set session variable  
                $_SESSION['user_logged'] = TRUE;
                $_SESSION['email'] = $user->email;

                // redirect to profile page/ index
                // redirect("user/profile", "refresh");
                echo 'success';

            } else {
                $this->session->set_flashdata("error", "NO!!! your account are not exist oiin database");
                // redirect("auth/login", "refresh"); 
                echo 'errorr';
            }         
        }
        // $this->load->view ('login');
        echo 'sgsgs';
    }

        // function login_process()
	// {
    //     $email = $this->input->post('email');
    //     $password = md5($this->input->post('password'));

    //     if($email && $password) {
    //         $table = "admin";
    //         $where = array(
    //                         'email' 		=> $email,
    //                         'password' 		=> $password
    //                     );	
    //         $user = $this->m_query->get_specified_row($table, $where);
    //         if(!empty($user)){
    //             $sessionData = array(
    //                     'admin_id'  	=> $user['admin_id'],
    //                     'email' 	=> $user['email'],       					
    //                 );
    //             $this->session->set_userdata($sessionData);
    //             redirect('staff_home/dashboard');
    //             echo "haii";
    //         }
        
    //         else{
    //             $this->session->set_flashdata('error', 'Invalid email or password.');        
    //         }		
    //     }
	// 	redirect('admin');
	// }
	
    public function logout()
	{       
        unset($_SESSION['user_data']);        
        redirect('admin');
	}
}
