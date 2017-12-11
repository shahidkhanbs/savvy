<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FeeGroup extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('FeeGroup_model');    
    }
    public function index(){ 
        $data['title']="Fee Group";
        $data['fee_groups'] = $this->FeeGroup_model->getFeeCodings();  
        $this->load->view('fee_group/index', $data);    
    }
   
    public function store(){    
        $data = array(
        'FEE_GRP_ID' =>   $this->Savvy_model->getNextId('FEE_GRP_ID','FEE_GROUP','school_db'),  
        'FEE_GRP_DESC' =>   strtoupper($this->input->post('desc')),   
        'FEE_GRP_SHORT_DESC' =>   strtoupper($this->input->post('short_desc')),   
        'MIN_PERCENT' =>   $this->input->post('min'),   
        'MAX_PERCENT' =>   $this->input->post('max'),   
        'UCODE' =>  $this->session->userdata('login_id'), 
       );  
     
       $this->FeeGroup_model->insertFeeCoding($data);
        $data['fee_groups'] = $this->FeeGroup_model->getFeeCodings();  
       print($this->load->view('fee_group/fee_group_table', $data)); 
    }
    public function toggle(){    
        $fee_group_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->FeeGroup_model->changeFeeCoding($fee_group_id,$status);
        $data['fee_groups'] = $this->FeeGroup_model->getFeeCodings();  
       print($this->load->view('fee_group/fee_group_table', $data));
    }
    public function edit(){    
           $fee_group_id = $this->input->post('id'); 
           $data = $this->FeeGroup_model->editFeeCoding($fee_group_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->FEE_GRP_ID;  
                $output['desc'] = $row->FEE_GRP_DESC;  
                $output['short_desc'] = $row->FEE_GRP_SHORT_DESC;    
                $output['min'] = $row->MIN_PERCENT;              
                $output['max'] = $row->MAX_PERCENT;              
           }  
           echo json_encode($output); 
    }
    public function update(){    
         $update = array(
        'FEE_GRP_DESC' =>   strtoupper($this->input->post('desc_edit')), 
        'FEE_GRP_SHORT_DESC' =>   strtoupper($this->input->post('short_desc_edit')), 
        'MIN_PERCENT' => $this->input->post('min_edit'),  
        'MAX_PERCENT' =>  $this->input->post('max_edit'),  
       );        
        $this->FeeGroup_model->updateFeeCoding($update,$this->input->post('id'));
        $data['fee_groups'] = $this->FeeGroup_model->getFeeCodings();  
        print($this->load->view('fee_group/fee_group_table', $data)); 
    }

  

}