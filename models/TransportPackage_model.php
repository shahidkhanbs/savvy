<?php
class TransportPackage_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertTransportPackage($data){
        $this->school_db->set('TRNDATE','SYSDATE',false);
        $this->school_db->insert('TRANSPORT_PACKAGE', $data);
    }
    function getTransportPackage(){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_PACKAGE');
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function getTransportActivePackage(){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_PACKAGE');
        $this->school_db->where('ACTIVE_FLAG', 1);
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function editTransportPackage($id){
        $this->school_db->select("*");
        $this->school_db->from('TRANSPORT_PACKAGE');
        $this->school_db->where("TRNNO",$id);
        $result = $this->school_db->get();
        return $result->result();
    }
    function changeTransportPackage($id,$status){
        $data = array('ACTIVE_FLAG' => $status);
        $this->school_db->where('TRNNO', $id);
        $this->school_db->update('TRANSPORT_PACKAGE', $data);
    }
    function updateTransportPackage($update,$id){
        $this->school_db->where('TRNNO', $id);
        $this->school_db->set('LAST_UPDATE_DATE','SYSDATE',false);
        $this->school_db->update('TRANSPORT_PACKAGE', $update);
    }

}

