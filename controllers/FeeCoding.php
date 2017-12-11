<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FeeCoding extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('FeeCoding_model');    
    }
    public function index(){ 
        $data['title']="FeeCoding";
        $data['programs'] = $this->FeeCoding_model->getPrograms();  
        $data['program_lines'] = $this->FeeCoding_model->getProgramLines();  
        $data['templates'] = $this->FeeCoding_model->getTemplates();  
        $data['fee_groups'] = $this->FeeCoding_model->getFeeGroups();  
        $data['fee_coding'] = $this->FeeCoding_model->getFeeCodings();  
        $this->load->view('fee_coding/index', $data);    
    }
   
    public function store(){ 
       if($this->input->post('program')=='')
       {
         $program = $this->input->post('program_line');
       }
       elseif ($this->input->post('program_line')=='') {
        $program = $this->input->post('program');       
       }

        $data = array(
        'FEE_ID' =>   $this->Savvy_model->getNextId('FEE_ID','FEE_CODING','school_db'), 
        'FEE_DATE' =>  date('d-M-Y'), 
        'CMPCODE' =>   $this->session->userdata('cmpcode'), 
        'SEGCODE' =>   $this->session->userdata('campus_id'), 
        'FEE_TYPE' =>  $this->input->post('fee_type'), 
        'PROGRAM_ID' =>   $program, 
        'TEMPLATE_ID' =>   $this->input->post('template'), 
        'FEE_GRP_ID' =>   $this->input->post('fee_group'), 
        'REMARKS' => strtoupper($this->input->post('remarks')),  
        'UCODE' =>  $this->session->userdata('login_id'),  
       ); 
       $this->FeeCoding_model->insertFeeCoding($data);
        $data['fee_coding'] = $this->FeeCoding_model->getFeeCodings();  
       print($this->load->view('fee_coding/fee_coding_table', $data)); 
    }
    public function toggle(){    
        $fee_coding_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->FeeCoding_model->changeFeeCoding($fee_coding_id,$status);
        $data['fee_coding'] = $this->FeeCoding_model->getFeeCodings();  
       print($this->load->view('fee_coding/fee_coding_table', $data));
    }
    public function edit(){    
           $fee_coding_id = $this->input->post('id'); 
           $data = $this->FeeCoding_model->editFeeCoding($fee_coding_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->FEE_ID;  
                $output['program'] = $row->PROGRAM_ID;  
                $output['template'] = $row->TEMPLATE_ID;    
                $output['fee_type'] = $row->FEE_TYPE;    
                $output['fee_group'] = $row->FEE_GRP_ID;    
                $output['template'] = $row->TEMPLATE_ID;    
                $output['remarks'] = $row->REMARKS;              
           }  
           echo json_encode($output); 
    }
    public function update(){ 
         if($this->input->post('program_edit')=='')
         {
           $program = $this->input->post('program_line_edit');
         }
         if ($this->input->post('program_line_edit')=='') {
          $program = $this->input->post('program_edit');       
         }   
         $update = array(
        'PROGRAM_ID' =>   $program, 
        'TEMPLATE_ID' =>   $this->input->post('template_edit'), 
        'FEE_TYPE' =>   $this->input->post('fee_type_edit'), 
        'REMARKS' => strtoupper($this->input->post('remarks_edit')),  
        'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
         );        
        $this->FeeCoding_model->updateFeeCoding($update,$this->input->post('id'));
        $data['fee_coding'] = $this->FeeCoding_model->getFeeCodings();  
        print($this->load->view('fee_coding/fee_coding_table', $data)); 
    }   
  

}