<?php
class Admission_model extends CI_Model {
  function __construct()
  {
      parent::__construct();
      $this->school_db = $this->load->database('school', TRUE);
  }     
  function getAdmissions(){
     $this->school_db->select("*");
     $this->school_db->from('V_INQUIRY');
     $this->school_db->where('MATURE_FLAG','1');
     $result = $this->school_db->get();
     return $result->result_array();
  }
  function editAdmission($id){
     $this->school_db->select("*");
     $this->school_db->from('INQUIRY');
     $this->school_db->where("TRNNO",$id);
     $result = $this->school_db->get();
     return $result->result_array();
  }    
    
    
}
