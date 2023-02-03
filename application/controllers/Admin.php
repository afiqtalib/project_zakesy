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
    function login ()
    {
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if ($this->form_validation->run() == TRUE) {
            //true 
            $email=$this->input->post('email');
            $password=$this->input->post('password');

            $query=$this->M_query->can_login($email,$password);
            if ($query==TRUE) {
                $session_data = array(
                                        'email' 	=> $email,
                                        'password' 	=> $password
                                    );
                $this->session->set_userdata($session_data);
                // $this->session->set_flashdata("success", "");

                redirect('admin/home');
                // echo "<script type='text/javascript'>alert('Successfuly BOSSS.');</script>"; 
                // redirect("admin", "refresh");
            }
            else {
                // invalid 
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
        $data['email']=$this->session->userdata('email');
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
	
	public function index()
	{       
		$this->load->view('admin_v_login');
	}
}
