<?php
class Section_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertSection($data){
        $this->school_db->insert('SECTIONS', $data);       
    }    
    function getSections(){
       $this->school_db->select("*");
       $this->school_db->from('SECTIONS');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editSection($id){
       $this->school_db->select("*");
       $this->school_db->from('SECTIONS');
       $this->school_db->where("SECTION_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeSection($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('SECTION_ID', $id);
      $this->school_db->update('SECTIONS', $data); 
    }
    function updateSection($update,$id){   
      $this->school_db->where('SECTION_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('SECTIONS', $update); 
    }
    
}
