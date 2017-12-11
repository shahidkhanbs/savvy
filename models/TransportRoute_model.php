<?php
class TransportRoute_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertTransportRoute($data){
        $this->school_db->insert('TRANSPORT_ROUTE', $data);
    }
    function getTransportRoute(){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_ROUTE');
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function getTransportActiveRoutes(){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_ROUTE');
        $this->school_db->where('ACTIVE_FLAG', 1);
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function editTransportRoute($id){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_ROUTE');
        $this->school_db->where("ROUTE_ID",$id);
        $result = $this->school_db->get();
        return $result->result();
    }
    function changeTransportRoute($id,$status){
        $data = array('ACTIVE_FLAG' => $status);
        $this->school_db->where('ROUTE_ID', $id);
        $this->school_db->update('TRANSPORT_ROUTE', $data);
    }
    function updateTransportRoute($update,$id){
        $this->school_db->where('ROUTE_ID', $id);
        $this->school_db->set('LAST_UPDATE_DATE','SYSDATE',false);
        $this->school_db->update('TRANSPORT_ROUTE', $update);
    }

}

