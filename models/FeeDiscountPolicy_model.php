<?php
class FeeDiscountPolicy_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertFeeDiscount($data){
        $this->school_db->insert('FEE_DISCOUNT_POLICY', $data); 
    }    
    function getFeeDiscounts(){
       $this->school_db->select("*");
       $this->school_db->from('V_FEE_DISCOUNT_POLICY');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function getFeeGroup(){
       $this->school_db->select("*");
       $this->school_db->from('FEE_GROUP');
       $this->school_db->where('ACTIVE_FLAG',1);
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editFeeDiscount($id){
       $this->school_db->select("*");
       $this->school_db->from('FEE_DISCOUNT_POLICY');
       $this->school_db->where("TRNNO",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeFeeDiscount($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('TRNNO', $id);
      $this->school_db->update('FEE_DISCOUNT_POLICY', $data); 
    }
    function updateFeeDiscount($update,$id){   
      $this->school_db->where('TRNNO', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('FEE_DISCOUNT_POLICY', $update); 
    }
    
}
