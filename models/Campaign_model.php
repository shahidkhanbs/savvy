<?php
class Campaign_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertCampaign($data){
        $this->school_db->insert('CAMPAIGN', $data);       
    }    
    function getCampaigns(){       
        $this->school_db->select('*');
        $this->school_db->from('V_CAMPAIGN');      
        $result = $this->school_db->get();
        return $result->result_array();
    }
    function getAcademicYears(){
       $this->school_db->select("*");
       $this->school_db->from('ACADEMIC_YEAR');
       $this->school_db->where("ACTIVE_FLAG",1);
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editCampaign($id){
       $this->school_db->select("*");
       $this->school_db->from('CAMPAIGN');
       $this->school_db->where("CAMPAIGN_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }
    
    function changeCampaign($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('CAMPAIGN_ID', $id);
      $this->school_db->update('CAMPAIGN', $data); 
    }
    function updateCampaign($update,$id){   
      $this->school_db->where('CAMPAIGN_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('CAMPAIGN', $update); 
    }
    
}

