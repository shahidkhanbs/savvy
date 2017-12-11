<?php
class FineType_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertFineType($data){
        $this->school_db->insert('FINE_TYPE', $data);       
    }    
    function getFineTypes(){
       $this->school_db->select("*");
       $this->school_db->from('FINE_TYPE');
       $result = $this->school_db->get();
       if($result->num_rows()){
          return $result->result_array();
        }     
    }
    function editFineType($id){
       $this->school_db->select("*");
       $this->school_db->from('FINE_TYPE');
       $this->school_db->where("FINE_TYPE_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeFineType($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('FINE_TYPE_ID', $id);
      $this->school_db->update('FINE_TYPE', $data); 
    }
    function updateFineType($update,$id){   
      $this->school_db->where('FINE_TYPE_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('FINE_TYPE', $update); 
    }
    
}

