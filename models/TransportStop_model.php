<?php
class TransportStop_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertTransportStop($data){
        $this->school_db->insert('TRANSPORT_STOP', $data);
    }    
    function getTransportStops(){
       $this->school_db->select("*");
       $this->school_db->from('TRANSPORT_STOP');
       $result = $this->school_db->get();
       if($result){
           return $result->result_array();
       }
    }
    function getTransportActiveStop(){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_STOP');
        $this->school_db->where('ACTIVE_FLAG', 1);
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function editTransportStop($id){
       $this->school_db->select("*");
       $this->school_db->from('TRANSPORT_STOP');
       $this->school_db->where("STOP_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeTransportStop($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('STOP_ID', $id);
      $this->school_db->update('TRANSPORT_STOP', $data);
    }
    function updateTransportStop($update,$id){   
      $this->school_db->where('STOP_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE','SYSDATE',false);
      $this->school_db->update('TRANSPORT_STOP', $update);
    }
    
}

