<?php
class TransportVehicleType_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertTransportVehicleType($data){
        $this->school_db->insert('TRANSPORT_VEHICLE_TYPE', $data);
    }
    function getTransportVehicleType(){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_VEHICLE_TYPE');
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function getTransportActiveVehicletype(){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_VEHICLE_TYPE');
        $this->school_db->where('ACTIVE_FLAG', 1);
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function editTransportVehicleType($id){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_VEHICLE_TYPE');
        $this->school_db->where("VEH_TYPE_ID",$id);
        $result = $this->school_db->get();
        return $result->result();
    }
    function changeTransportVehicleType($id,$status){
        $data = array('ACTIVE_FLAG' => $status);
        $this->school_db->where('VEH_TYPE_ID', $id);
        $this->school_db->update('TRANSPORT_VEHICLE_TYPE', $data);
    }
    function updateTransportVehicleType($update,$id){
        $this->school_db->where('VEH_TYPE_ID', $id);
        $this->school_db->set('LAST_UPDATE_DATE','SYSDATE',false);
        $this->school_db->update('TRANSPORT_VEHICLE_TYPE', $update);
    }

}

