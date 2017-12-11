<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FeeTemplate extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('FeeTemplate_model');    
    }
    public function index(){ 
        $data['title']="Template";
        $data['fee_titles'] = $this->FeeTemplate_model->getFeeTitles();  
        $data['templates'] =  $this->FeeTemplate_model->getTemplates();  
        $this->load->view('fee_template/index', $data);    
    }
   
    public function store(){    
        $data = array(
        'TEMPLATE_ID' =>   $this->Savvy_model->getNextId('TEMPLATE_ID','FEE_TEMPLATE','school_db'),
        'CMPCODE' =>  $this->session->userdata('cmpcode'), 
        'SEGCODE' =>  $this->session->userdata('campus_id'),  
        'TEMPLATE_DATE' => date('d-M-Y'), 
        'FEE_TITLE_ID' =>   $this->input->post('title'), 
        'ADMISSION_FEE' =>   $this->input->post('adm_fee'), 
        'REGISTRATION_FEE' =>   $this->input->post('reg_fee'), 
        'SECURITY_FEE' =>   $this->input->post('security_fee'), 
        'ANNUAL_FEE' =>   $this->input->post('annual_fee'), 
        'TUTION_FEE' =>   $this->input->post('tution_fee'), 
        'REMARKS' => strtoupper($this->input->post('remarks')),  
        'UCODE' =>  $this->session->userdata('login_id'),  
       );  
     
        $this->FeeTemplate_model->insertTemplate($data);
        $data['templates'] = $this->FeeTemplate_model->getTemplates();  
        print($this->load->view('fee_template/template_table', $data)); 
    }
    public function toggle(){    
        $template_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->FeeTemplate_model->changeTemplate($template_id,$status);
        $data['templates'] = $this->FeeTemplate_model->getTemplates();  
       print($this->load->view('fee_template/template_table', $data));
    }
    public function edit(){    
           $template_id = $this->input->post('id'); 
           $data = $this->FeeTemplate_model->editTemplate($template_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->TEMPLATE_ID;  
                $output['title'] = $row->FEE_TITLE_ID;  
                $output['adm_fee'] = $row->ADMISSION_FEE;  
                $output['reg_fee'] = $row->REGISTRATION_FEE;  
                $output['sec_fee'] = $row->SECURITY_FEE;  
                $output['annual_fee'] = $row->ANNUAL_FEE;  
                $output['tution_fee'] = $row->TUTION_FEE;  
                $output['remarks'] = $row->REMARKS;              
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array( 
        'TEMPLATE_DATE' => format_date($this->input->post('template_date_edit')), 
        'FEE_TITLE_ID' =>   $this->input->post('title_edit'), 
        'ADMISSION_FEE' =>   $this->input->post('adm_fee_edit'), 
        'REGISTRATION_FEE' =>   $this->input->post('reg_fee_edit'), 
        'SECURITY_FEE' =>   $this->input->post('security_fee_edit'), 
        'ANNUAL_FEE' =>   $this->input->post('annual_fee_edit'), 
        'TUTION_FEE' =>   $this->input->post('tution_fee_edit'), 
        'REMARKS' => strtoupper($this->input->post('remarks_edit')),  
        'UCODE' =>  $this->session->userdata('login_id'),   
        'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
         );        
        $this->FeeTemplate_model->updateTemplate($update,$this->input->post('id'));
        $data['templates'] = $this->FeeTemplate_model->getTemplates();  
        print($this->load->view('fee_template/template_table', $data)); 
    }

  

}