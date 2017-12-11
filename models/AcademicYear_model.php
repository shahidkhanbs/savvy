<?php
class AcademicYear_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertAcademicYear($data){
        $this->school_db->insert('ACADEMIC_YEAR', $data);       
    }    
    function getAcademicYears(){
       $this->school_db->select("*");
       $this->school_db->from('ACADEMIC_YEAR');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editAcademicYear($id){
       $this->school_db->select("*");
       $this->school_db->from('ACADEMIC_YEAR');
       $this->school_db->where("AYID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeAcademicYear($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('AYID', $id);
      $this->school_db->update('ACADEMIC_YEAR', $data); 
    }
    function updateAcademicYear($update,$id){   
      $this->school_db->where('AYID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('ACADEMIC_YEAR', $update); 
    }
    
}
