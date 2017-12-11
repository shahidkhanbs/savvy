<?php
class Challan_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertFeeChallan($data){
    	$this->school_db->insert('FINE_INSTALLMENT',$data);
    	return ($this->school_db->affected_rows() != 1) ? false : true;
    }
    function getUnpaidChallans() {
    	$this->school_db->select('*');
    	$this->school_db->from('V_FEE_INSTALLMENT_MST');
    	$query = $this->school_db->get();
    	return $query->result_array();
    }    
    function getStudents() {
    	$this->school_db->select('*');
    	$this->school_db->from('V_STUDENTS');
    	$query = $this->school_db->get();
    	return $query->result_array();
    }    
    function getStudentsByProgram($program_id, $date){
        $query = $this->school_db->query("SELECT * from V_STUDENTS
        Where PROGRAM_LINE_ID = '$program_id'
        AND STUDENT_ID NOT IN (
        Select DISTINCT STUDENT_ID from FEE_INSTALLMENT_MST 
        Where PROGRAM_LINE_ID = '$program_id' AND
        '$date' BETWEEN  FROM_MONTH and TO_MONTH )");
        // echo $query = $this->school_db->last_query(); die;
        return $query->result_array();
    }
    function getProgramLines(){
      $this->school_db->select("*");
      $this->school_db->from('v_program_coding');
      $this->school_db->where('ACTIVE_FLAG',1);
      $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
      $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));
      $result = $this->school_db->get();
      return $result->result_array();
    } 
    function getAmountByProgram($id){       
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

    function getNextLineNo($TRN) {
        $this->school_db->select("nvl(max(nvl(LINE_NO,0)),0)+1 as NEXTVAL");
        $this->school_db->from('FEE_INSTALLMENT_DTL');
        $this->school_db->where('TRNNO',$TRN);
        $query = $this->school_db->get();
        return  $query->row()->NEXTVAL;
    }

    function getChallanMSTTRNNO($student_id){
        $this->school_db->select("count(STUDENT_ID) NEXTTRN");
        $this->school_db->from('FEE_INSTALLMENT_MST');
        $this->school_db->where('STUDENT_ID',$student_id);
        $query = $this->school_db->get();
        //return  $query->row()->NEXTTRN;
        if($query->row()->NEXTTRN=='0')
        {
            $this->school_db->select(" '$student_id'||1  MAXID");
            $this->school_db->from('DUAL');               
            $query = $this->school_db->get();
            return $query->row()->MAXID;
        }
        else
        {
            $this->school_db->select("max(TRNNO) + 1 MAXID");
            $this->school_db->from('FEE_INSTALLMENT_MST');               
            $query = $this->school_db->get();
            return $query->row()->MAXID;
        }

    }

     
   
    
}



