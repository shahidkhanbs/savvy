<?php
class ProgramGroup_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertProgramGroup($data){
        $this->school_db->insert('PROGRAM_GROUP', $data);       
    }    
    function getProgramGroups(){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAM_GROUP');
       $this->school_db->order_by("GRP_ID", "desc");
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editProgramGroup($id){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAM_GROUP');
       $this->school_db->where("GRP_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeProgramGroup($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('GRP_ID', $id);
      $this->school_db->update('PROGRAM_GROUP', $data); 
    }
    function updateProgramGroup($update,$id){   
      $this->school_db->where('GRP_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('PROGRAM_GROUP', $update); 
    }
    
}
