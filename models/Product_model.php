<?php
class Product_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertProduct($data){
        $this->school_db->insert('PRODUCT', $data);       
    }    
    function getProducts(){
       $this->school_db->select("*");
       $this->school_db->from('PRODUCT');
       $result = $this->school_db->get();
       return $result->result_array();
    }
    function editProduct($id){
       $this->school_db->select("*");
       $this->school_db->from('PRODUCT');
       $this->school_db->where("PRODUCT_ID",$id);
       $result = $this->school_db->get();
       return $result->result();
    }    
    function changeProduct($id,$status){
      $data = array('ACTIVE_FLAG' => $status);    
      $this->school_db->where('PRODUCT_ID', $id);
      $this->school_db->update('PRODUCT', $data); 
    }
    function updateProduct($update,$id){   
      $this->school_db->where('PRODUCT_ID', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('PRODUCT', $update); 
    }
    
}
