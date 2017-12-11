<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FineType extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('FineType_model');    
    }
    public function index(){ 
        $data['title']="Fine Type";
        $data['fine_types'] = $this->FineType_model->getFineTypes();  
        $this->load->view('fine_type/index', $data);    
    }
   
    public function store(){    
        $data = array(
        'FINE_TYPE_ID' =>   $this->Savvy_model->getNextId('FINE_TYPE_ID','FINE_TYPE','school_db'), 
        'FINE_TYPE_DESC' =>   strtoupper($this->input->post('description')), 
        'FINE_TYPE_SHORT_DESC' =>   strtoupper($this->input->post('short_desc')), 
        'UCODE' =>  $this->session->userdata('login_id'),  
       );     
       $this->FineType_model->insertFineType($data);
       $data['fine_types'] = $this->FineType_model->getFineTypes();  
       print($this->load->view('fine_type/fine_type_table', $data)); 
    }
    public function toggle(){    
        $fine_type_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->FineType_model->changeFineType($fine_type_id,$status);
        $data['fine_types'] = $this->FineType_model->getFineTypes();  
       print($this->load->view('fine_type/fine_type_table', $data));
    }
    public function edit(){    
           $fine_type_id = $this->input->post('id'); 
           $data = $this->FineType_model->editFineType($fine_type_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->FINE_TYPE_ID;  
                $output['desc'] = $row->FINE_TYPE_DESC;  
                $output['short_desc'] = $row->FINE_TYPE_SHORT_DESC;
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array(  
        'FINE_TYPE_DESC' =>   strtoupper($this->input->post('description_edit')), 
        'FINE_TYPE_SHORT_DESC' =>   strtoupper($this->input->post('short_desc_edit')),    
        'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
         );        
        $this->FineType_model->updateFineType($update,$this->input->post('id'));
        $data['fine_types'] = $this->FineType_model->getFineTypes();  
        print($this->load->view('fine_type/fine_type_table', $data)); 
    }

  

}
