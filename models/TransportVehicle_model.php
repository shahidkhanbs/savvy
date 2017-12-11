<?php
class TransportVehicle_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertTransportVehicle($data){
        $this->school_db->insert('TRANSPORT_VEHICLE', $data);
    }
    function getTransportVehicle(){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_VEHICLE');
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function getTransportActiveVehicle(){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_VEHICLE');
        $this->school_db->where('ACTIVE_FLAG', 1);
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function editTransportVehicle($id){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_VEHICLE');
        $this->school_db->where("VEHICLE_ID",$id);
        $result = $this->school_db->get();
        return $result->result();
    }
    function changeTransportVehicle($id,$status){
        $data = array('ACTIVE_FLAG' => $status);
        $this->school_db->where('VEHICLE_ID', $id);
        $this->school_db->update('TRANSPORT_VEHICLE', $data);
    }
    function updateTransportVehicle($update,$id){
        $this->school_db->where('VEHICLE_ID', $id);
        $this->school_db->set('LAST_UPDATE_DATE','SYSDATE',false);
        $this->school_db->update('TRANSPORT_VEHICLE', $update);
    }

}

