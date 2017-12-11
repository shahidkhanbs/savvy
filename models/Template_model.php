<?php
class Template_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertTemplate($data){
        $this->school_db->insert('FEE_TEMPLATE', $data);       
    }    
    function getTemplates(){
       $this->school_db->select("*");
       $this->school_db->from('V_FEE_TEMPLATE');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getFeeTitles(){
       $this->school_db->select("*");
       $this->school_db->from('FEE_TITLE');
       $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
       $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));
       $this->school_db->where('ACTIVE_FLAG',1);
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editTemplate($id){
       $this->school_db->select("*");
       $this->school_db->from('FEE_TEMPLATE');
       $this->school_db->where("TEMPLATE_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeTemplate($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('TEMPLATE_ID', $id);
      $this->school_db->update('FEE_TEMPLATE', $data); 
    }
    function updateTemplate($update,$id){   
      $this->school_db->where('TEMPLATE_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('FEE_TEMPLATE', $update); 
    }
    
}
