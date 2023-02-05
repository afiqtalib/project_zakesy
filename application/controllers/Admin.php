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

    public function home () 
    {
        // CALL SESSION
        $data['email']=$this->session->userdata('email');
        // echo $this->session->userdata();
        $data['nama']=$this->session->userdata('admin_name');
        echo "<pre>";
            print_r($this->session->userdata());
            echo md5('12345');
        echo "</pre>";
        $this->load->view('admin_v_home',$data);
    }
	
    public function logout()
	{       
        unset ($_SESSION);
        session_destroy();
        redirect("admin","refresh");
	}
}
