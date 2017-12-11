<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FineTemplate extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('FineTemplate_model');    
    }
    public function index(){ 
        $data['title']="Fine Template";
        $data['fine_types'] = $this->FineTemplate_model->getFineTypes();  
        $data['templates'] =  $this->FineTemplate_model->getFineTemplates();  
        $this->load->view('fine_template/index', $data);    
    }
   
    public function store(){    
        $data = array(
        'TEMPLATE_ID' =>   $this->Savvy_model->getNextId('TEMPLATE_ID','FINE_TEMPLATE','school_db'),
        'CMPCODE' =>  $this->session->userdata('cmpcode'), 
        'SEGCODE' =>  $this->session->userdata('campus_id'),  
        'TEMPLATE_DATE' => date('d-M-Y'), 
        'FINE_TYPE_ID' =>   $this->input->post('type'), 
        'FINE_FEE' =>   $this->input->post('fine_fee'), 
        'REMARKS' => strtoupper($this->input->post('remarks')),  
        'UCODE' =>  $this->session->userdata('login_id'),  
       );  
     
        $this->FineTemplate_model->insertFineTemplate($data);
        $data['templates'] = $this->FineTemplate_model->getFineTemplates();  
        print($this->load->view('fine_template/fine_template_table', $data)); 
    }
    public function toggle(){    
        $template_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->FineTemplate_model->changeFineTemplate($template_id,$status);
        $data['templates'] = $this->FineTemplate_model->getFineTemplates();  
       print($this->load->view('fine_template/fine_template_table', $data));
    }
    public function edit(){    
           $template_id = $this->input->post('id'); 
           $data = $this->FineTemplate_model->editFineTemplate($template_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->TEMPLATE_ID;  
                $output['type'] = $row->FINE_TYPE_ID;  
                $output['fee'] = $row->FINE_FEE;    
                $output['remarks'] = $row->REMARKS;              
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array( 
        'TEMPLATE_DATE' => format_date($this->input->post('template_date_edit')), 
        'FINE_TYPE_ID' =>   $this->input->post('type_edit'), 
        'FINE_FEE' =>   $this->input->post('fine_fee_edit'), 
        'REMARKS' => strtoupper($this->input->post('remarks_edit')),  
        'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
         );        
        $this->FineTemplate_model->updateFineTemplate($update,$this->input->post('id'));
        $data['templates'] = $this->FineTemplate_model->getFineTemplates();  
        print($this->load->view('fine_template/fine_template_table', $data)); 
    }

  

}