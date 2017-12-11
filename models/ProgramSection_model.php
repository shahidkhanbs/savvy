<?php
class ProgramSection_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertProgramSection($data){
        $this->school_db->set('TRNDATE',"SYSDATE",false);
        $this->school_db->insert('PROGRAM_SECTION', $data);       
    }    
    function getProgramSections(){
       $this->school_db->select("*");
       $this->school_db->from('V_PROGRAM_SECTION');
       $result = $this->school_db->get();
       return $result->result_array();
    }    
    function getProgramLines(){       
        $this->school_db->select('*');
        $this->school_db->from('V_PROGRAM_CODING');  
        $this->school_db->where("ACTIVE_FLAG",'1');       
        $result = $this->school_db->get();
        return $result->result_array();
    }
    function getSections(){       
        $this->school_db->select('*');
        $this->school_db->from('SECTIONS');
        $this->school_db->where("ACTIVE_FLAG",'1');      
        $result = $this->school_db->get();
        return $result->result_array();
    }
    function editProgramSection($id){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAM_SECTION');
       $this->school_db->where("TRNNO",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeProgramSection($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('TRNNO', $id);
      $this->school_db->update('PROGRAM_SECTION', $data); 
    }
    function updateProgramSection($update,$id){   
      $this->school_db->where('TRNNO', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('PROGRAM_SECTION', $update); 
    }
    
}

