<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Program extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('Program_model');        
    }
    public function index(){  
        $data['title'] = "Program";  
        $data['program_group']= $this->Program_model->getGroups();  
        $data['programs'] = $this->Program_model->getPrograms();  
        $this->load->view('program/index', $data);    
    }
    
    public function store(){    
        $data = array(
        'PROGRAM_ID' =>  $this->Savvy_model->getNextId('PROGRAM_ID','PROGRAMS','school_db'), 
        'GRP_ID' => $this->input->post('group'), 
        'PROGRAM_NAME' => strtoupper($this->input->post('name')), 
        'PROGRAM_SHORT_NAME' =>   strtoupper($this->input->post('short_name')),      
        'UCODE' =>  $this->session->userdata('login_id'), 
       );        
       $this->Program_model->insertProgram($data);
       $data['programs'] = $this->Program_model->getPrograms();  
       print($this->load->view('program/program_table', $data)); 
    }
    public function toggle(){    
        $program_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->Program_model->changeProgram($program_id,$status);
        $data['programs'] = $this->Program_model->getPrograms();  
       print($this->load->view('program/program_table', $data));
    }
    public function edit(){    
           $program_id = $this->input->post('id'); 
           $data = $this->Program_model->editProgram($program_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->PROGRAM_ID;  
                $output['name'] = $row->PROGRAM_NAME;  
                $output['group'] = $row->GRP_ID;  
                $output['short_name'] = $row->PROGRAM_SHORT_NAME;              
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array( 
        'PROGRAM_NAME' => strtoupper($this->input->post('name_edit')), 
        'PROGRAM_SHORT_NAME' =>   strtoupper($this->input->post('short_name_edit')), 
        'GRP_ID' => $this->input->post('group_edit'), 
        'LAST_UPDATE_BY' => $this->session->userdata('login_id')
         );        
        $this->Program_model->updateProgram($update,$this->input->post('id'));
        $data['programs'] = $this->Program_model->getPrograms();  
        print($this->load->view('program/program_table', $data));
    }

  

}