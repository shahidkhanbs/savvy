<?php
class AssignSection_model extends CI_Model {

    function __construct()
    {
      parent::__construct();
      $this->school_db = $this->load->database('school', TRUE);
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
    function getSectionByProgram($id){
        $query = $this->school_db->query("SELECT  DISTINCT TRNNO, PS_NAME, SECTION_DESC  from V_PROGRAM_SECTION
        Where PROGRAM_LINE_ID = '$id'
        AND TRNNO NOT IN (
        Select DISTINCT SECTION_ID from STUDENTS A
        Where PROGRAM_LINE_ID = '$id'
        AND SECTION_ID IS NOT NULL)");
        return $query->result();
    }
    function getStudents($program){
       $this->school_db->select("*");
       $this->school_db->from('V_STUDENTS');
       $this->school_db->where('Roll_NO IS  NULL',null, false);
       $this->school_db->where('SECTION_ID IS  NULL',null, false);  
       if($program!='')
       {
        $this->school_db->where('PROGRAM_LINE_ID',$program);
       }       
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getremoveStudents($program,$section){
       $this->school_db->select("*");
       $this->school_db->from('V_STUDENTS'); 
       if($program!='')
       {
        $this->school_db->where('PROGRAM_LINE_ID',$program);
       } 
       if($section!='')
       {
        $this->school_db->where('SECTION_ID',$section);
       }   
       $this->school_db->order_by("Roll_NO", "asc");    
       $result = $this->school_db->get();
       return $result->result_array();

    }
    function allSectionByProgram($id){
        $query = $this->school_db->query("SELECT  DISTINCT TRNNO, PS_NAME, SECTION_DESC  from V_PROGRAM_SECTION
        Where PROGRAM_LINE_ID = '$id'");
        return $query->result();
    }
    function getStudentsByProgram($program){
       $this->school_db->select("*");
       $this->school_db->from('V_STUDENTS');  
       $this->school_db->where('PROGRAM_LINE_ID',$program);           
       $this->school_db->order_by("Roll_NO", "asc");           
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getStudentss(){
      $this->school_db->select("*");
      $this->school_db->from('V_STUDENTS');
      $result = $this->school_db->get();
      return $result->result_array();
    }
    function getRollNumber($program,$section)
    {       
      $this->school_db->select("max(ROLL_NO)+1 as   max_roll_no");
      $this->school_db->from('STUDENTS');
      $this->school_db->where('PROGRAM_LINE_ID',$program);             
      $this->school_db->where('SECTION_ID',$section);             
      $query = $this->school_db->get();
      // echo $this->school_db->last_query(); die;
      return $result = $query->row()->MAX_ROLL_NO;
    }
       
   
    
}

