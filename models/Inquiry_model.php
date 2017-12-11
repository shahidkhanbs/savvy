<?php
class Inquiry_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertInquiry($data){
        $this->school_db->insert('INQUIRY', $data);
        return ($this->school_db->affected_rows() != 1) ? false : true;
        // echo  $this->school_db->last_query(); die; 
    } 
    function insertLocation($data)
    {
      $this->school_db->set('ENT_DATE',"SYSDATE",false);
      $this->school_db->insert('su_location', $data); 
    //  echo  $this->school_db->last_query(); die; 
      return ($this->school_db->affected_rows() != 1) ? false : true;
    }   
    function getInquiries(){
       $this->school_db->select("*");
       $this->school_db->from('INQUIRY');
       $this->school_db->where('MATURE_FLAG','0');
       $result = $this->school_db->get();
       return $result->result_array();
    }   
    function editInquiry($id){
       $this->school_db->select("*");
       $this->school_db->from('INQUIRY');
       $this->school_db->where("TRNNO",$id);
       $result = $this->school_db->get();
       return $result->result_array();
    }  
    
    function getInquiryPackage($id){
        $this->school_db->select("A.FEE_ID, A.ADMISSION_FEE, A.REGISTRATION_FEE, A.SECURITY_FEE, A.ANNUAL_FEE, A.TUTION_FEE, A.TOTAL_FEE ");
        $this->school_db->from('V_FEE_CODING A');
        $this->school_db->where('A.CMPCODE',$this->session->userdata('cmpcode'));
        $this->school_db->where('A.SEGCODE',$this->session->userdata('campus_id'));        
        $this->school_db->where('A.PROGRAM_ID',$id);        
        $query = $this->school_db->get();
        if($query->num_rows())
        {
           return $query->result_array();
        }
    }     
    function getDiscountByProgram($id){
       
        $this->school_db->select("A.FEE_ID, A.ADMISSION_FEE, A.REGISTRATION_FEE, A.SECURITY_FEE, A.ANNUAL_FEE, A.TUTION_FEE, A.TOTAL_FEE ");
        $this->school_db->from(' V_LATEST_FEE_CODING A');
        $this->school_db->where('A.CMPCODE',$this->session->userdata('cmpcode'));
        $this->school_db->where('A.SEGCODE',$this->session->userdata('campus_id'));        
        $this->school_db->where('A.PROGRAM_ID',$id);                      
        $query = $this->school_db->get();
       // echo $query = $this->school_db->last_query(); die;

        if($query->num_rows())
        {
           return $query->result();
        }
        else
        {
          $this->school_db->select("PROGRAM_ID");
          $this->school_db->from('PROGRAM_CODING');
          $this->school_db->where('PROGRAM_LINE_ID',$id);                 
          $queryy = $this->school_db->get();
          $program_id = $queryy->row()->PROGRAM_ID;
         // echo $queryy = $this->school_db->last_query(); die;
          $this->school_db->select("A.FEE_ID, A.ADMISSION_FEE, A.REGISTRATION_FEE, A.SECURITY_FEE, A.ANNUAL_FEE, A.TUTION_FEE, A.TOTAL_FEE ");
          $this->school_db->from(' V_LATEST_FEE_CODING A');
          $this->school_db->where('A.CMPCODE',$this->session->userdata('cmpcode'));
          $this->school_db->where('A.SEGCODE',$this->session->userdata('campus_id'));        
          $this->school_db->where('A.PROGRAM_ID',$program_id);                      
          $queryyy = $this->school_db->get();        
          return $queryyy->result(); 

        }
    }
    function getFeeGroupID($percentage)
    {    
      $this->school_db->select("FN_GET_FEE_GROUP_ID ($percentage)  column_name");
      $this->school_db->from('DUAL');               
      $query = $this->school_db->get();
      return $query->row()->COLUMN_NAME;     
    } 

    function getDiscountPolicy($fee_group_id)
    {    
        $this->school_db->select("*");
        $this->school_db->from(' V_LATEST_FEE_DISCOUNT_POLICY');        
        $this->school_db->where('FEE_GRP_ID',$fee_group_id);        
        $query = $this->school_db->get(); 
     
        if($query->num_rows()=='0')
        {
          $this->school_db->select(" ADMISSION_DISCOUNT, REGISTRATION_DISCOUNT, SECURITY_DISCOUNT,ANNUAL_DISCOUNT,TUTION_DISCOUNT ");
          $this->school_db->from('V_LATEST_FEE_DISCOUNT_POLICY');        
          $this->school_db->where('DISCOUNT_TYPE',2);        
          $query = $this->school_db->get();
          return $query->result();
        } 
        else
        {
          $this->school_db->select(" ADMISSION_DISCOUNT, REGISTRATION_DISCOUNT, SECURITY_DISCOUNT,ANNUAL_DISCOUNT,TUTION_DISCOUNT ");
          $this->school_db->from('V_LATEST_FEE_DISCOUNT_POLICY');        
          $this->school_db->where('FEE_GRP_ID',$fee_group_id);        
          $query = $this->school_db->get();
          return $query->result();
        }     
    } 
    
} 
