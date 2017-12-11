<?php
class Student_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }     
    function getStudents(){
       $this->school_db->select("INQUIRY_ID, FULL_NAME, FATHER_NAME, DOB, MOBILE_NO, FATHER_MOBILE_NO, PROGRAM_NAME,PIC_PATH");
       $this->school_db->from('V_STUDENTS');
       $result = $this->school_db->get();
       return $result->result_array();
    }    
    
}
