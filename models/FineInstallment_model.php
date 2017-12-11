<?php
class FineInstallment_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
    function insertfineInstallment($data){
    	$this->school_db->insert('FINE_INSTALLMENT',$data);
    	return ($this->school_db->affected_rows() != 1) ? false : true;
    }
    function getUnpaidInstallments() {
    	$this->school_db->select('*');
    	$this->school_db->from('v_fine_installment');
        $this->school_db->where('PAID_FLAG',0);
    	$query = $this->school_db->get();
    	return $query->result_array();
    }
    function getPaidInstallments() {
        $this->school_db->select('*');
        $this->school_db->from('v_fine_installment');
        $this->school_db->where('PAID_FLAG',1);
        $query = $this->school_db->get();
        return $query->result_array();
    }
    function getAllInstallments() {
        $this->school_db->select('*');
        $this->school_db->from('v_fine_installment');
        $query = $this->school_db->get();
        return $query->result_array();
    }
    function getStudents() {
    	$this->school_db->select('*');
    	$this->school_db->from('V_STUDENTS');
    	$query = $this->school_db->get();
    	return $query->result_array();
    }
    function getFines() {
    	$this->school_db->select('*');
    	$this->school_db->from('V_FINE_TEMPLATE');
    	$this->school_db->where('ACTIVE_FLAG',1);
    	$query = $this->school_db->get();
    	return $query->result_array();
    }
    function updateInstallment($update,$id){   
      $this->school_db->where('TRNNO', $id);
      $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
      $this->school_db->update('FINE_INSTALLMENT', $update); 
    } 
     
   
    
}

