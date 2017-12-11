<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TransportTemplate extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');
        $this->load->model('TransportTemplate_model');    
    }
    public function index(){ 
        $data['title']="Template";
        $data['stops'] = $this->TransportTemplate_model->getstops();  
        $data['templates'] =  $this->TransportTemplate_model->getTransportTemplates();  
        $this->load->view('transport_template/index', $data);    
    }
   
    public function store(){    
        $data = array(
        'TEMPLATE_ID' =>   $this->College_model->getNextId('TEMPLATE_ID','TRANSPORT_TEMPLATE','college'),
        'TEMPLATE_DATE' => format_date($this->input->post('template_date')), 
        'CMPCODE' =>  $this->session->userdata('cmpcode'), 
        'SEGCODE' =>  $this->session->userdata('campus_id'),  
        'STOP_ID' =>   $this->input->post('stop'), 
        'TRANSPORT_FEE' =>   $this->input->post('fee'), 
        'REMARKS' => $this->input->post('remarks'),  
        'UCODE' =>  $this->session->userdata('login_id'), 
       );  
     
        $this->TransportTemplate_model->insertTransportTemplate($data);
        $data['templates'] = $this->TransportTemplate_model->getTransportTemplates();  
        print($this->load->view('transport_template/transport_template_table', $data)); 
    }
    public function toggle(){    
        $template_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->TransportTemplate_model->changeTransportTemplate($template_id,$status);
        $data['templates'] = $this->TransportTemplate_model->getTransportTemplates();  
       print($this->load->view('transport_template/transport_template_table', $data));
    }
    public function edit(){    
           $template_id = $this->input->post('id'); 
           $data = $this->TransportTemplate_model->editTransportTemplate($template_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->TEMPLATE_ID;  
                $output['template_date'] = $row->TEMPLATE_DATE;  
                $output['stop'] = $row->STOP_ID;  
                $output['fee'] = $row->TRANSPORT_FEE;  
                $output['remarks'] = $row->REMARKS;              
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array( 
        'TEMPLATE_DATE' => format_date($this->input->post('template_date_edit')), 
        'STOP_ID' =>   $this->input->post('stop_edit'), 
        'TRANSPORT_FEE' =>   $this->input->post('fee_edit'), 
        'REMARKS' => $this->input->post('remarks_edit'),  
        'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
         );        
        $this->TransportTemplate_model->updateTransportTemplate($update,$this->input->post('id'));
        $data['templates'] = $this->TransportTemplate_model->getTransportTemplates();  
        print($this->load->view('transport_template/transport_template_table', $data)); 
    }

  

}