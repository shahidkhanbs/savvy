<?php
class ProgramCoding_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertProgramCoding($data){
        $this->school_db->insert('PROGRAM_CODING', $data);       
    }    
    function getProgramCodings(){
       $this->school_db->select("*");
       $this->school_db->from('V_PROGRAM_CODING');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getProgramGenders(){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAM_GENDER');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getProgramMediums(){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAM_MEDIUM');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getProgramShifts(){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAM_SHIFT');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getPrograms(){       
        $this->school_db->select('*');
        $this->school_db->from('PROGRAMS');        
        $result = $this->school_db->get();
        return $result->result_array();
    }
    function editProgramCoding($id){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAM_CODING');
       $this->school_db->where("PROGRAM_LINE_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeProgramCoding($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('PROGRAM_LINE_ID', $id);
      $this->school_db->update('PROGRAM_CODING', $data); 
    }
    function updateProgramCoding($update,$id){   
      $this->school_db->where('PROGRAM_LINE_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('PROGRAM_CODING', $update); 
    }
    
}

