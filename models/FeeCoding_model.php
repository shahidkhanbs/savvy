<?php
class FeeCoding_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertFeeCoding($data){
        $this->school_db->insert('FEE_CODING', $data);     
    }    
    function getFeeCodings(){
       $this->school_db->select("*");
       $this->school_db->from('V_FEE_CODING');
       $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
       $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));
       $result = $this->school_db->get();
       return $result->result_array();
    }
     function getPrograms(){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAMS');
       $this->school_db->where('ACTIVE_FLAG',1);
       $result = $this->school_db->get();
       return $result->result_array();
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
    function getTemplates(){
       $this->school_db->select("*");
       $this->school_db->from('V_FEE_TEMPLATE');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getFeeGroups(){
       $this->school_db->select("*");
       $this->school_db->from('FEE_GROUP');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editFeeCoding($id){
       $this->school_db->select("*");
       $this->school_db->from('FEE_CODING');
       $this->school_db->where("FEE_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeFeeCoding($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('FEE_ID', $id);
      $this->school_db->update('FEE_CODING', $data); 
    }
    function updateFeeCoding($update,$id){   
      $this->school_db->where('FEE_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('FEE_CODING', $update); 
    }
    
}
