<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FeeDiscountPolicy extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('FeeDiscountPolicy_model');    
    }
    public function index(){ 
        $data['title']="Discount Policy";
        $data['fee_groups'] = $this->FeeDiscountPolicy_model->getFeeGroup();  
        $data['discounts'] =  $this->FeeDiscountPolicy_model->getFeeDiscounts();  
        $this->load->view('fee_discount_policy/index', $data);    
    }
   
    public function store(){    
        $data = array(
        'TRNNO' =>   $this->Savvy_model->getNextId('TRNNO','FEE_DISCOUNT_POLICY','school_db'),
        'TRNDATE' => date('d-M-Y'),
        'CMPCODE' =>  $this->session->userdata('cmpcode'), 
        'SEGCODE' =>  $this->session->userdata('campus_id'),  
        'DISCOUNT_TYPE' => $this->input->post('type'), 
        'FEE_GRP_ID' =>   $this->input->post('fee_group'), 
        'ADMISSION_DISCOUNT' =>   $this->input->post('adm_fee'), 
        'REGISTRATION_DISCOUNT' =>   $this->input->post('reg_fee'), 
        'SECURITY_DISCOUNT' =>   $this->input->post('security_fee'), 
        'ANNUAL_DISCOUNT' =>   $this->input->post('annual_fee'), 
        'TUTION_DISCOUNT' =>   $this->input->post('tution_fee'), 
        'REMARKS' => strtoupper($this->input->post('remarks')),  
        'UCODE' =>  $this->session->userdata('login_id'), 
       );  
        $this->FeeDiscountPolicy_model->insertFeeDiscount($data);
        $data['discounts'] = $this->FeeDiscountPolicy_model->getFeeDiscounts();  
        print($this->load->view('fee_discount_policy/fee_discount_policy_table', $data)); 
    }
    public function toggle(){    
        $discount_policy_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->FeeDiscountPolicy_model->changeFeeDiscount($discount_policy_id,$status);
        $data['discounts'] = $this->FeeDiscountPolicy_model->getFeeDiscounts();  
        print($this->load->view('fee_discount_policy/fee_discount_policy_table', $data)); 
    }
    public function edit(){    
           $discount_policy_id = $this->input->post('id'); 
           $data = $this->FeeDiscountPolicy_model->editFeeDiscount($discount_policy_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->TRNNO;   
                $output['fee_id'] = $row->FEE_GRP_ID;  
                $output['adm'] = $row->ADMISSION_DISCOUNT;  
                $output['reg'] = $row->REGISTRATION_DISCOUNT;  
                $output['sec'] = $row->SECURITY_DISCOUNT;  
                $output['annual'] = $row->ANNUAL_DISCOUNT;  
                $output['tution'] = $row->TUTION_DISCOUNT;  
                $output['remarks'] = $row->REMARKS;              
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array( 
        'FEE_GRP_ID' =>   $this->input->post('fee_group_edit'), 
        'ADMISSION_DISCOUNT' =>   $this->input->post('adm_edit'), 
        'REGISTRATION_DISCOUNT' =>   $this->input->post('reg_edit'), 
        'SECURITY_DISCOUNT' =>   $this->input->post('security_edit'), 
        'ANNUAL_DISCOUNT' =>   $this->input->post('annual_edit'), 
        'TUTION_DISCOUNT' =>   $this->input->post('tution_edit'),   
        'REMARKS' =>   strtoupper($this->input->post('remarks_edit')),   
        'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
         );        
        $this->FeeDiscountPolicy_model->updateFeeDiscount($update,$this->input->post('id'));
        $data['discounts'] = $this->FeeDiscountPolicy_model->getFeeDiscounts();  
        print($this->load->view('fee_discount_policy/fee_discount_policy_table', $data));  
    }

  

}