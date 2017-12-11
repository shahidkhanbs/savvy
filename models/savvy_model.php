<?php
class Savvy_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function getNextId($pk,$table,$db) {
        $this->$db->select("nvl(max(nvl($pk,0)),0)+1 as NEXTVAL");
        $this->$db->from($table);
        $query = $this->$db->get();
        return  $query->row()->NEXTVAL;
    }
    function getNextTrnId() {
        $this->school_db->select("TO_CHAR(NVL(MAX(NVL(TO_NUMBER(SUBSTR(TRNNO,7,6)),0)),0) + 1,'000009') as NEXTVAL");
        $this->school_db->from('INQUIRY');
        $this->school_db->where('FYID',$this->session->userdata('fyid'));
        $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
        $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));        
        $query = $this->school_db->get();
        return  $query->row()->NEXTVAL;
    }
    function getPrograms(){
       $this->school_db->select("*");
       $this->school_db->from('PROGRAMS');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getProgramLines(){
       $this->school_db->select("*");
       $this->school_db->from('v_program_coding');
       $this->school_db->where('ACTIVE_FLAG',1);
       $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
       $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getProducts(){
       $this->school_db->select("*");
       $this->school_db->from('PRODUCT');
       $result = $this->school_db->get();
       return $result->result_array();
    }
     function getFeeGroups(){
       $this->school_db->select("*");
       $this->school_db->from('FEE_GROUP');
       $result = $this->school_db->get();
       return $result->result_array();
    }    
    function getReligions(){
       $this->school_db->select("*");
       $this->school_db->from('religion');
       $result = $this->school_db->get();
       return $result->result_array();
    }    
    function getLocations(){
      $this->school_db->select("CITY_ID");
      $this->school_db->from('V_CMPDTL'); 
      $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
      $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));              
      $query = $this->school_db->get();
      $city =  $query->row()->CITY_ID; 
      $this->school_db->select("*");
      $this->school_db->from('su_location');
      $this->school_db->where('CITY_ID',$city);
      $result = $this->school_db->get();
      return $result->result_array();
    }
    function getAddress(){
      $this->school_db->select("PROVINCE_ID, CITY_ID, LOCATION_ID");
      $this->school_db->from('V_CMPDTL'); 
      $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
      $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));              
      $query = $this->school_db->get();
      //echo  $this->school_db->last_query(); die;
      return $query->result_array();
    }
    function getCity(){
      $this->school_db->select("CITY_ID");
      $this->school_db->from('V_CMPDTL'); 
      $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
      $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));              
      $query = $this->school_db->get();
      return $query->row()->CITY_ID; 
    }
    function getAcedmicYear()
    {       
      $this->school_db->select("FN_GET_ACTIVE_AY_ID  as AYID");
      $this->school_db->from('DUAL');            
      $query = $this->school_db->get();
      return  $query->row()->AYID;
    }
    function getCampaign()
    {       
      $this->school_db->select("FN_GET_ACTIVE_CAMPAIGN_ID  as CAMPAIGN_ID");
      $this->school_db->from('DUAL');            
      $query = $this->school_db->get();
      return  $query->row()->CAMPAIGN_ID;
    }
    function getReferences(){
       $this->school_db->select("*");
       $this->school_db->from('reference');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getInstitutes(){
       $this->school_db->select("*");
       $this->school_db->from('institute');
       $result = $this->school_db->get();
       return $result->result_array();
    }    
    function getStops(){
       $this->school_db->select("*");
       $this->school_db->from('TRANSPORT_STOP');
       $this->school_db->where('CMPCODE',$this->session->userdata('cmpcode'));
       $this->school_db->where('SEGCODE',$this->session->userdata('campus_id'));
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getFyidForTrnno()
    {       
        $this->school_db->select("TO_CHAR(SDATE,'YY')  as NEXTVAL");
        $this->school_db->from('CONFIG');
        $this->school_db->where('FYID',$this->session->userdata('fyid'));             
        $query = $this->school_db->get();
        return  $query->row()->NEXTVAL;
    }
    function getTransportFee($stop_id){
        $this->school_db->select("AMOUNT");
        $this->school_db->from('V_TRANSPORT_PACKAGE');
        $this->school_db->where("STOP_ID",$stop_id);
        $result = $this->school_db->get();
        //echo $this->school_db->last_query(); die;
        return $result->result_array();
    }
    function getTransportVehicle($stop_id){
        $this->school_db->select("*");
        $this->school_db->from('V_TRANSPORT_VEHICLE');
        $this->school_db->where("ROUTE_ID",$stop_id);
        $result = $this->school_db->get();
        //echo $this->school_db->last_query(); die;
        return $result->result_array();
    }
    function getReference($db,$table, $pk, $fk,$value)
    {
        $this->$db->select($value);
        $this->$db->from($table);
        $this->$db->where($pk, $fk);
        $query = $this->$db->get();
        return  $query->row()->$value;
    }


}

