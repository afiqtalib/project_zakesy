<?php

class M_query extends CI_Model {

    function __construct()
    {
        // parent::__construct();
    }   

    /* INSERT DATA */
	 
    function insert_data($arrayData,$table)
    {
        $this->db->insert($table,$arrayData);        
        return $this->db->insert_id();
    }

    /* UPDATE DATA */
    
    function update_data($columnToUpdate, $tableToUpdate, $usingCondition)
    {      
        $this->db->where($usingCondition);
        $this->db->update($tableToUpdate, $columnToUpdate);
    }
        
    /* DELETE DATA */
	 
    function delete_data($table, $where){

        $this->db->where($where);
        $this->db->delete($table);
    }
     
    /* SELECT SPECIFIED ROW */
	 
    function get_specified_row($table, $where = false, $tableNameToJoin = false, $tableRelation = false, $order_by = false, $like = false, $group_by = false)
    {    
        $this->db->select('*');
        $this->db->from($table);

        if($where != false)
        {
             $this->db->where($where); 
        }
		
		if($like != false){
            $this->db->like($like); 
        }
		   
		if($group_by != false){
		   	$this->db->group_by($group_by);
		}
		
        if($order_by != false)
        {
            $this->db->order_by($order_by[0], $order_by[1]);
        }

        if($tableNameToJoin != false && $tableRelation != false){
            for ($i=0; $i < count($tableNameToJoin); $i++){
                $this->db->join($tableNameToJoin[$i], $tableRelation[$i]);
            }      
        }

        $query = $this->db->get();
        return $query->row_array();    
    }
	
	/* SELECT ALL ROWS */
	
	function get_all_rows($table, $where = false, $tableNameToJoin = false, $tableRelation = false, $order_by = false, $like = false, $group_by = false)
    {
        $this->db->select('*');
        $this->db->from($table);

        if($where!=false){
        	$this->db->where($where);
        }
           
		if($like!=false){
            $this->db->like($like); 
        }
		   
		if($group_by!=false){
		   	$this->db->group_by($group_by);
		}
			
        if($order_by!=false){
            $this->db->order_by($order_by[0], $order_by[1]);
        }
        	
		if($tableNameToJoin!=false && $tableRelation!=false){
            for ($i=0; $i < count($tableNameToJoin); $i++){
            	$this->db->join($tableNameToJoin[$i], $tableRelation[$i]);
            }
		}

        $query = $this->db->get();
        return $query->result_array(); 
    }

	/* SELECT NUM ROWS */
	
	function get_num_rows($table, $where = false, $tableNameToJoin = false, $tableRelation = false, $order_by = false)
    {
            

            $this->db->select('*');
            $this->db->from($table);

            if($where!=false){
               $this->db->where($where);
            }
           
           if($order_by!=false){
                $this->db->order_by($order_by[0], $order_by[1]);
           }
        
           if($tableNameToJoin!=false && $tableRelation!=false){
                for ($i=0; $i < count($tableNameToJoin); $i++){
                    $this->db->join($tableNameToJoin[$i], $tableRelation[$i]);
                }
                
           }
         
            $query = $this->db->get();
            return $query->num_rows(); 
           
    }
	
    /* DISPLAY MESSAGE */
	 
    function display_message($messageType, $urlToGo = false){
       
        if($messageType == "insert")
        {
             $this->session->set_flashdata('success', 'Data saved successfully.');
        }
        else if($messageType == "update")
        {
             $this->session->set_flashdata('success', 'Your profile was successfully updated.');
        }
        else if($messageType == "tukar_pass")
        {
             $this->session->set_flashdata('success', 'New password changed successfully.');
        }
         else if($messageType == "delete")
        {
             $this->session->set_flashdata('success', 'Data deleted successfully.');
        }
        else if($messageType == "error")
        {
             $this->session->set_flashdata('error', 'There was an error in processing, please try again.');
        } 
        else if($messageType == "send_email")
        {
             $this->session->set_flashdata('success', 'Email sent successfully.');
        }  
         else if($messageType == "forgotpassword")
        {
             $this->session->set_flashdata('error', 'Invalid email.');
        }   
         else if($messageType == "getverificationcode")
        {
             $this->session->set_flashdata('success', 'Verification code has been sent to your email, please check inbox or spam.');
        }   
		else if($messageType == "login_match")
        {
             $this->session->set_flashdata('error', 'Invalid email or password.');
        }  
        	else if($messageType == "tukar_kata_laluan")
        {
             $this->session->set_flashdata('error', 'Your email or verification code is incorrect.');
        }  
		else if($messageType == "error-attachment")
        {
             $this->session->set_flashdata('error', 'Only JPEG and PNG images are allowed.');
        }
		else if($messageType == "error_old_pass")
        {
             $this->session->set_flashdata('error', 'Old password do not match.');
        } 
		else if($messageType == "error_pass")
        {
             $this->session->set_flashdata('error', 'Password do not match.');
        }   
        	else if($messageType == "error_email")
        {
             $this->session->set_flashdata('error', 'Email address is already registered.');
        }   
		 	else if($messageType == "error_borang")
        {
             $this->session->set_flashdata('error', 'Sorry, you are required to complete this form.');
        }  
        	else if($messageType == "error_activation")
        {
             $this->session->set_flashdata('error', 'Sorry, your account is not active. Verification code has been sent to your email, please check inbox or spam.');
        }   
        if($urlToGo == false){
             $url = current_url();
        }
        else
        {
            $url = $urlToGo;
        }
        return redirect($url);
    }
	
	//get password lama
	function getOldPassword($arr="",$order="",$limit="",$where_special=""){
		  $this->db->select('*');
		  $this->db->from('users');
		  if(!empty($arr)){
		  	foreach($arr as $key=>$val){
				 $this->db->where($key,$val);
			}
		  }
		  if(!empty($where_special)){
        		$this->db->where($where_special,"",FALSE);
		  }
		  if(!empty($order)){
		        foreach($order as $key=>$val){
		          $this->db->order_by($key,$val);  
		        }
		  }
		  if(!empty($limit)){
		       $this->db->limit($limit['limit'], $limit['start']);
		  }
		  $query = $this->db->get();
		  return $query;
	}
	
	//get user
	function getUsers($arr="",$order="",$limit="",$where_special=""){
		  $this->db->select('*');
		  $this->db->from('users');
		  if(!empty($arr)){
		  	foreach($arr as $key=>$val){
				 $this->db->where($key,$val);
			}
		  }
		  if(!empty($where_special)){
        		$this->db->where($where_special,"",FALSE);
		  }
		  if(!empty($order)){
		        foreach($order as $key=>$val){
		          $this->db->order_by($key,$val);  
		        }
		  }
		  if(!empty($limit)){
		       $this->db->limit($limit['limit'], $limit['start']);
		  }
		  $query = $this->db->get();
		  return $query;
	}
	
	//get member
	function getMember($arr="",$order="",$limit="",$where_special=""){
		  $this->db->select('*');
		  $this->db->from('members');
		  if(!empty($arr)){
		  	foreach($arr as $key=>$val){
				 $this->db->where($key,$val);
			}
		  }
		  if(!empty($where_special)){
        		$this->db->where($where_special,"",FALSE);
		  }
		  if(!empty($order)){
		        foreach($order as $key=>$val){
		          $this->db->order_by($key,$val);  
		        }
		  }
		  if(!empty($limit)){
		       $this->db->limit($limit['limit'], $limit['start']);
		  }
		  $query = $this->db->get();
		  return $query;
	}
	
	function total_wasap_link($id_user)
    {
        $query = $this->db->select('COUNT(id) as jumlah_link');
        $query = $this->db->where('wasap_user_id',$id_user);
        $query = $this->db->get('wasap_link');
        $result = $query->result();
    
        return $result[0]->jumlah_link;
    }
    
    function jumlah_custom_staff($id_wasap)
    {
        $query = $this->db->select('COUNT(id_custom_staff) as jumlah_staff');
        $query = $this->db->where('id_wasap_link',$id_wasap);
         $query = $this->db->where('custom_staff_status','1');
        $query = $this->db->get('custom_staff');
        $result = $query->result();
    
        return $result[0]->jumlah_staff;
    }
    
    public function getData($rowno,$rowperpage,$search="") {		
        
        $this->db->select('*');
        $this->db->from('user');
    
        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('phone', $search);
        }
    
        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();
     
        return $query->result_array();
	
	}
	
	public function getrecordCount($search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from('user');
     
        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('phone', $search);
        }
    
        $query = $this->db->get();
        $result = $query->result_array();
     
        return $result[0]['allcount'];
    }
    
    public function getDataPremiumLifetime($rowno,$rowperpage,$search="") {		
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('rank','1');
        $this->db->where('date_end =','0000-00-00');
        $this->db->order_by("date_end", "asc");
        
        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('phone', $search);
        }
    
        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();
     
        return $query->result_array();
	
	}
	
	public function getrecordCountPremiumLifetime($search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from('user');
        $this->db->where('rank','1');
        $this->db->where('date_end =','0000-00-00');
     
        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('phone', $search);
        }
    
        $query = $this->db->get();
        $result = $query->result_array();
     
        return $result[0]['allcount'];
    }
    public function getDataPremiumPackage($rowno,$rowperpage,$search="") {		
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('date_end !=','0000-00-00');
        $this->db->order_by("date_end", "asc");
        
        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('date_end', $search);
        }
    
        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();
     
        return $query->result_array();
	
	}
	
	public function getrecordCountPremiumPackage($search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from('user');
        $this->db->where('date_end !=','0000-00-00');
     
        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('date_end', $search);
        }
    
        $query = $this->db->get();
        $result = $query->result_array();
     
        return $result[0]['allcount'];
    }
    
    function get_list_report_sales($start_date,$end_date,$premium_type)
	{
	    if($premium_type=='all'){
        		$this -> db -> select('*');
        		$this -> db -> from('upgrade_premium_auto');
        		$this -> db -> where('DATE(date_submit) >=',$start_date);
        		$this -> db -> where('DATE(date_submit) <=',$end_date);
        		$this -> db -> where('status_id','1');
        		$this -> db ->join('user', 'upgrade_premium_auto.id_user = user.id', 'LEFT');
        		$this -> db -> order_by('DATE(date_submit)','asc');
        		$query = $this -> db -> get();
        
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    }
	    else
	    {
	        $this -> db -> select('*');
        		$this -> db -> from('upgrade_premium_auto');
        		$this -> db -> where('DATE(date_submit) >=',$start_date);
        		$this -> db -> where('DATE(date_submit) <=',$end_date);
        		$this -> db -> where('status_id','1');
        		$this -> db -> where('premium_type',$premium_type);
        		$this -> db ->join('user', 'upgrade_premium_auto.id_user = user.id', 'LEFT');
        		$this -> db -> order_by('DATE(date_submit)','asc');
        		$query = $this -> db -> get();
        
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    }
	}
	
	 function query_all_wresultSize($q)
	{
	    
        		$this -> db -> select('*');
        		$this -> db -> from('user');
        		$this -> db -> where('email',$q);
        	$query = $this->db->get();        
   return $query->result();
	    }
	    
	
	
	public function getDataFailedPay($rowno,$rowperpage,$search="") {		
        
        $this->db->select('*, count(a.id_user) as jumlah_submit');
        $this->db->from('upgrade_premium_auto a');
        $where = '(a.status_id="0" or a.status_id="2" or a.status_id="3")';
        $this->db->where($where);
        $this->db->where('b.rank','0');
        $this -> db ->join('user b', 'a.id_user = b.id');
        $this->db->group_by("a.id_user");
        $this->db->order_by("date_submit", "desc");
        
        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('phone', $search);
        }
    
        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();
     
        return $query->result_array();
	
	}
	public function getrecordCountFailedPay($search = '') {

         
        $this->db->select('count(*) as allcount');
        $this->db->from('upgrade_premium_auto a');
        $where = '(a.status_id="0" or a.status_id="2" or a.status_id="3")';
        $this->db->where($where);
        $this->db->where('b.rank','0');
        $this -> db ->join('user b', 'a.id_user = b.id');
     
        if($search != ''){
          $this->db->like('email', $search);
          $this->db->or_like('phone', $search);
        }
    
        $query = $this->db->get();
        $result = $query->result_array();
     
        return $result[0]['allcount'];
    }
    
        function get_list_premium_package($email,$start_date,$end_date)
	{
	    if($email=='')
	    {
	        
        		$this -> db -> select('*');
        		$this -> db -> from('user');
        		$this->db->where('date_end !=','0000-00-00');
        		$this -> db -> where('DATE(date_end) >=',$start_date);
        		$this -> db -> where('DATE(date_end) <=',$end_date);
        		$query = $this -> db -> get();
        
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    
	    }
	    else if ($start_date=='' && $end_date=='')
	    {
	        $this -> db -> select('*');
        		$this -> db -> from('user');
        		$this->db->where('date_end !=','0000-00-00');
        		$this -> db -> where('email',$email);
        $query = $this -> db -> get();
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    }
	    else 
	    {
	        $this -> db -> select('*');
        		$this -> db -> from('user');
        		$this->db->where('date_end !=','0000-00-00');
        		$this -> db -> where('DATE(date_end) >=',$start_date);
        		$this -> db -> where('DATE(date_end) <=',$end_date);
        		$this -> db -> where('email',$email);
        		$query = $this -> db -> get();
        
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    }
	}
	function get_list_report_sales_by_month()
	{
	   $tahunini = date("Y");
        		$this -> db -> select('*,sum(pakej) as jumlah_pakej');
        		$this -> db -> from('upgrade_premium_auto');
        		$this -> db -> where('YEAR(date_submit) =',$tahunini);
        	
        		$this -> db -> where('status_id','1');
        	   
        	    $this->db->group_by('MONTH(date_submit)');
        	    $this->db->order_by("MONTH(date_submit)", "asc");
        		$query = $this -> db -> get();
        
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    
	  
	}
	function get_amount_report_sales_by_month_upgrade($bulan)
{
    $tahunini = date("Y");
    $query = $this->db->select('sum(pakej) as jumlah_pakej_by_month');
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','1');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_month;
}
function get_amount_report_sales_by_month_renew($bulan)
{
    $tahunini = date("Y");
    $query = $this->db->select('sum(pakej) as jumlah_pakej_by_month');
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','2');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_month;
}

function get_list_report_sales_by_day($month)
	{
	   $tahunini = date("Y");
        		$this -> db -> select('*,sum(pakej) as jumlah_pakej');
        		$this -> db -> from('upgrade_premium_auto');
        		$this -> db -> where('YEAR(date_submit) =',$tahunini);
        		$this -> db -> where('MONTH(date_submit) =',$month);
        	
        		$this -> db -> where('status_id','1');
        	   
        	    $this->db->group_by('DAY(date_submit)');
        		$query = $this -> db -> get();
        
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    
	  
	}
function get_amount_report_sales_by_day_upgrade($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);

    $query = $this->db->select('sum(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','1');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}
function get_amount_report_sales_by_day_upgrade_pakej_25($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);

    $query = $this->db->select('count(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','1');
$query =$this -> db -> where('pakej','25');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}
function get_amount_report_sales_by_day_upgrade_pakej_100($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);

    $query = $this->db->select('count(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','1');
$query =$this -> db -> where('pakej','100');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}
function get_amount_report_sales_by_day_upgrade_pakej_150($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);

    $query = $this->db->select('count(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','1');
$query =$this -> db -> where('pakej','150');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}
function get_amount_report_sales_by_day_upgrade_pakej_promo_75($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);

    $query = $this->db->select('count(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','1');
$query =$this -> db -> where('pakej','75');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}
function get_amount_report_sales_by_day_renew_pakej_25($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);

    $query = $this->db->select('count(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','2');
$query =$this -> db -> where('pakej','25');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}
function get_amount_report_sales_by_day_renew_pakej_100($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);

    $query = $this->db->select('count(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','2');
$query =$this -> db -> where('pakej','100');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}
function get_amount_report_sales_by_day_renew_pakej_150($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);

    $query = $this->db->select('count(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','2');
$query =$this -> db -> where('pakej','150');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}
function get_amount_report_sales_by_day_renew_pakej_promo_75($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);

    $query = $this->db->select('count(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','2');
$query =$this -> db -> where('pakej','75');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}
function get_amount_report_sales_by_day_renew($day)
{
    $tahunini = date("Y");
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);
    
    $query = $this->db->select('sum(pakej) as jumlah_pakej_by_day');
$query = $this->db->where('DAY(date_submit)',$hari);
$query = $this->db->where('MONTH(date_submit)',$bulan);
$query = $this->db->where('YEAR(date_submit)',$tahunini);
$query =$this -> db -> where('status_id','1');
$query =$this -> db -> where('premium_type','2');
    $query = $this->db->get('upgrade_premium_auto');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_day;
}

function get_list_report_sales_by_user($daymonth)
	{
	   $tahunini = date("Y");
	   $hari=substr($daymonth, 0, 2);
    $bulan=substr($daymonth, 3, 2);
    
        		$this -> db -> select('*');
        		$this -> db -> from('upgrade_premium_auto');
        		$this -> db -> where('YEAR(date_submit) =',$tahunini);
        		$this -> db -> where('MONTH(date_submit) =',$bulan);
        		$this -> db -> where('DAY(date_submit) =',$hari);
        		$this -> db -> where('status_id','1');
        	   $this -> db ->join('user', 'upgrade_premium_auto.id_user = user.id', 'LEFT');
        		//$this -> db -> order_by('DATE(date_submit)','asc');
        		$query = $this -> db -> get();
        		
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    
	  
	}
	
  function get_list_report_expired_by_month()
	{
	            
                $tahunini = date("Y");
                
                                                 
        		$this -> db -> select('*,count(id) as jumlah_user');
        		$this -> db -> from('user');
        		$this -> db -> where('YEAR(date_end) =',$tahunini);
        	   
        	   
        	    $this->db->group_by('MONTH(date_end)');
        	    $this->db->order_by("MONTH(date_end)", "asc");
        		$query = $this -> db -> get();
        
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    
	  
	}
		function get_amount_report_expired_by_month($bulan)
{
    $tahunini = date("Y");
                
    $query = $this->db->select('count(id) as jumlah_pakej_by_month');
$query = $this->db->where('MONTH(date_end)',$bulan);
$query = $this->db->where('YEAR(date_end)',$tahunini);
$query = $this->db->where('date_end !=','0000-00-00');
$query = $this -> db -> where('rank','0');
    $query = $this->db->get('user');
    $result = $query->result();

    return $result[0]->jumlah_pakej_by_month;
}
function get_list_report_expired_by_day($month)
	{
	   $tahunini = date("Y");
        		$this -> db -> select('*,count(id) as jumlah_user');
        		$this -> db -> from('user');
        		$this -> db -> where('YEAR(date_end) =',$tahunini);
        		$this -> db -> where('MONTH(date_end) =',$month);
        		$this->db->where('date_end !=','0000-00-00');
        		$this -> db -> where('rank','0');
        	
        		
        	   
        	    $this->db->group_by('DAY(date_end)');
        	    $this->db->order_by("DAY(date_end)", "asc");
        		$query = $this -> db -> get();
        
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    
	  
	}
	
	function get_amount_report_expired_by_day($day)
{
    
    $hari=substr($day, 0, 2);
    $bulan=substr($day, 3, 2);
$tahunini = date("Y");

    $query = $this->db->select('count(id) as jumlah_id_by_day');
$query = $this->db->where('DAY(date_end)',$hari);
$query = $this->db->where('MONTH(date_end)',$bulan);
$query = $this->db->where('YEAR(date_end)',$tahunini);
$this->db->where('date_end !=','0000-00-00');
$query = $this -> db -> where('rank','0');
    $query = $this->db->get('user');
    $result = $query->result();

    return $result[0]->jumlah_id_by_day;
}

function get_list_report_expired_by_user($daymonth)
	{
	   
	   $hari=substr($daymonth, 0, 2);
    $bulan=substr($daymonth, 3, 2);
    $tahunini = date("Y");
        		$this -> db -> select('*');
        		$this -> db -> from('user');
        		$this -> db -> where('YEAR(date_end) =',$tahunini);
        		$this -> db -> where('MONTH(date_end) =',$bulan);
        		$this -> db -> where('DAY(date_end) =',$hari);
        		//$this -> db -> where('rank','1');
        		$query = $this -> db -> get();
        		
        		if ($query->num_rows() > 0) {
        			
        			foreach ($query->result() as $row) {
        			
        				$data[] = $row;
        			}
        
        			return $data;
        		
        		}
        		
        		return false;
	    
	  
	}
	public function getDataDeleteLink($rowno,$rowperpage,$search="") {		
        
        $this->db->select('wasap_link.id as id_wasap_link, wasap_link.custom_name,user.name,user.phone,user.email,user.rank,user.date_end');
        $this->db->from('wasap_link');
        $this->db->where('wasap_link.delete_link','1');
        $this -> db ->join('user', 'wasap_link.wasap_user_id = user.id', 'LEFT');
        $this->db->order_by("wasap_link.custom_name", "asc");
        
        if($search != ''){
          $this->db->like('wasap_link.custom_name', $search);
        }
    
        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();
     
        return $query->result_array();
	
	}
	
	public function getrecordCountDeleteLink($search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from('wasap_link');
        $this->db->where('delete_link','1');
     $this -> db ->join('user', 'wasap_link.wasap_user_id = user.id', 'LEFT');
        if($search != ''){
          $this->db->like('custom_name', $search);
        }
    
        $query = $this->db->get();
        $result = $query->result_array();
     
        return $result[0]['allcount'];
    }
    function total_user()
    {
        $query = $this->db->select('COUNT(id) as Total_User');
        $query = $this->db->get('user');
        $result = $query->result();
    
        return $result[0]->Total_User;
}
 function total_verify()
    {
        $query = $this->db->select('COUNT(id) as Total_Verify');
        $query = $this->db->where('status','1');
        $query = $this->db->get('user');
        $result = $query->result();
    
        return $result[0]->Total_Verify;
}
function total_link()
    {
        $query = $this->db->select('COUNT(id) as Total_Link');
        $query = $this->db->get('wasap_link');
        $result = $query->result();
    
        return $result[0]->Total_Link;
}
function total_sales_by_day()
    {
        $hariini = date("Y,m,d");
        
        $query = $this->db->select('sum(pakej) as Total_Sales_By_Day');
        $query = $this->db->where('DATE(date_submit)',$hariini);
        $query =$this -> db -> where('status_id','1');
        $query = $this->db->get('upgrade_premium_auto');
        $result = $query->result();
    
        return $result[0]->Total_Sales_By_Day;
   
}
function total_sales_by_month()
    {
        $tahunini = date("Y");
        $bulanini = date("m");
        
        $query = $this->db->select('sum(pakej) as Total_Sales_By_Month');
        $query = $this->db->where('MONTH(date_submit)',$bulanini);
        $query = $this->db->where('YEAR(date_submit)',$tahunini);
        $query =$this -> db -> where('status_id','1');
        $query = $this->db->get('upgrade_premium_auto');
        $result = $query->result();
    
        return $result[0]->Total_Sales_By_Month;
   
}
 function total_expired()
    {
        $hariini = date("Y,m,d");
        
        $query = $this->db->select('COUNT(id) as Total_Expired');
        $query = $this->db->where('date_end <',$hariini);
        $query = $this->db->where('date_end !=','0000-00-00');
        $query = $this->db->where('rank','0');
        $query = $this->db->get('user');
        $result = $query->result();
    
        return $result[0]->Total_Expired;
}
function get_user_pass($email,$password)
	{
	   
	   
        		$this -> db -> select('*');
        		$this -> db -> from('admin');
        		$this -> db -> where('email =',$email);
        		$this -> db -> where('password =',$password);
        		$query = $this->db->get();
        return $query->row_array(); 
	    
	  
	}
	function get_user_pass_rank($email,$password)
	{
	   
	   
        		$this -> db -> select('*');
        		$this -> db -> from('user');
        		$this -> db -> where('email =',$email);
        		$this -> db -> where('password =',$password);
        		$this -> db -> where('status =','1');
        		$query = $this->db->get();
        return $query->row_array(); 
	    
	  
	}

    /*---------------------------------
    //     MODEL YANG GUNA SEKARANG    //
    -----------------------------------*/
    function can_login($email,$password)
	{
        $this->db->where('email', $email);  
        $this->db->where('password', $password);  
        $query = $this->db->get('admin');  
        //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
        if($query->row_array())  
        {  
            return true;  
        }  
        else  
        {  
            return false;       
        }  
	}

    function specific_row($arraycolumn, $table) //test 
	{
        //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
        $this->db->get_where($table, $arraycolumn);
        $query = $this->db->get($table);
        return $query->row_array(); 
	}

}
?>