<?php
class FineTemplate_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertFineTemplate($data){
        $this->school_db->insert('FINE_TEMPLATE', $data);       
    }    
    function getFineTemplates(){
       $this->school_db->select("*");
       $this->school_db->from('V_FINE_TEMPLATE');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getFineTypes(){
       $this->school_db->select("*");
       $this->school_db->from('FINE_TYPE');
       $this->school_db->where('ACTIVE_FLAG',1);
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editFineTemplate($id){
       $this->school_db->select("*");
       $this->school_db->from('FINE_TEMPLATE');
       $this->school_db->where("TEMPLATE_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeFineTemplate($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('TEMPLATE_ID', $id);
      $this->school_db->update('FINE_TEMPLATE', $data); 
    }
    function updateFineTemplate($update,$id){   
      $this->school_db->where('TEMPLATE_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('FINE_TEMPLATE', $update); 
    }
    
}


