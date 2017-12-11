<?php
class FeeGroup_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertFeeCoding($data){
        $this->school_db->insert('FEE_GROUP', $data);       
    }    
    function getFeeCodings(){
       $this->school_db->select("*");
       $this->school_db->from('FEE_GROUP');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    
  
    function editFeeCoding($id){
       $this->school_db->select("*");
       $this->school_db->from('FEE_GROUP');
       $this->school_db->where("FEE_GRP_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeFeeCoding($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('FEE_GRP_ID', $id);
      $this->school_db->update('FEE_GROUP', $data); 
    }
    function updateFeeCoding($update,$id){   
      $this->school_db->where('FEE_GRP_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('FEE_GROUP', $update); 
    }
    
}
