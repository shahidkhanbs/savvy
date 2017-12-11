<?php
class FeeTitle_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertFeeTitle($data){
        $this->school_db->insert('FEE_TITLE', $data);       
    }    
    function getFeeTitles(){
       $this->school_db->select("*");
       $this->school_db->from('FEE_TITLE');
       $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
       $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));
       $result = $this->school_db->get();
       if($result->num_rows()){
          return $result->result_array();
        }     
    }
    function editFeeTitle($id){
       $this->school_db->select("*");
       $this->school_db->from('FEE_TITLE');
       $this->school_db->where("FEE_TITLE_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeFeeTitle($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('FEE_TITLE_ID', $id);
      $this->school_db->update('FEE_TITLE', $data); 
    }
    function updateFeeTitle($update,$id){   
      $this->school_db->where('FEE_TITLE_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('FEE_TITLE', $update); 
    }
    
}
