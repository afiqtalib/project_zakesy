<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kuala_Lumpur');	
        error_reporting(E_ERROR | E_PARSE);
        if($this->session->userdata('admin_id') == ''){
			redirect('admin_login');
		}
	}

    public function index()
	{       
		$this->load->view('admin_v_login');
	}

    public function home () 
    {
        // CALL SESSION
        $data['email']=$this->session->userdata('email');
        $data['nama']=$this->session->userdata('admin_name');
        $data['title']='Admin | Title'; // title tab
        // echo "<pre>";
        //     print_r($this->session->userdata());
        //     echo md5('12345');
        // echo "</pre>";
        $this->load->view('admin_v_home',$data);
    }

    public function list()
	{       
		$this->load->view('patient_v_list');
	}
	
}
