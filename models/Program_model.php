<?php
class Program_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertProgram($data){
        $this->school_db->insert('PROGRAMS', $data);       
    }    
    function getPrograms(){       
        $this->school_db->select('ps.*, pg.GRP_NAME');
        $this->school_db->from('PROGRAMS ps');
        $this->school_db->join('PROGRAM_GROUP pg', 'ps.GRP_ID = pg.GRP_ID', 'INNER');         
        $result = $this->school_db->get();
        return $result->result_array();
    }
    function getGroups(){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAM_GROUP');
       $this->school_db->where("ACTIVE_FLAG",1);
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editProgram($id){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAMS');
       $this->school_db->where("PROGRAM_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }
    
    function changeProgram($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('PROGRAM_ID', $id);
      $this->school_db->update('PROGRAMS', $data); 
    }
    function updateProgram($update,$id){   
      $this->school_db->where('PROGRAM_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('PROGRAMS', $update); 
    }
    
}
