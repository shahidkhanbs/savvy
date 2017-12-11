<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProgramGroup extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('ProgramGroup_model');    
    }
    public function index(){  

        $data['title'] = 'Program Group';  
        $data['program_group'] = $this->ProgramGroup_model->getProgramGroups();  
        $this->load->view('program_group/index', $data);    
    }   
    public function store(){    
        $data = array(
        'GRP_ID' =>  $this->Savvy_model->getNextId('GRP_ID','PROGRAM_GROUP','school_db'), 
        'GRP_NAME' => strtoupper($this->input->post('name')), 
        'GRP_SHORT_NAME' => strtoupper($this->input->post('short_name')), 
        'UCODE' =>  $this->session->userdata('login_id'), 
       );        
       $this->ProgramGroup_model->insertProgramGroup($data);
        $data['program_group'] = $this->ProgramGroup_model->getProgramGroups();  
        print($this->load->view('program_group/program_group_table', $data)); 
    }
    public function toggle(){    
        $pg_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->ProgramGroup_model->changeProgramGroup($pg_id,$status);
        $data['program_group'] = $this->ProgramGroup_model->getProgramGroups();  
        print($this->load->view('program_group/program_group_table', $data));
    }
    public function edit(){    
           $pg_id = $this->input->post('id'); 
           $data = $this->ProgramGroup_model->editProgramGroup($pg_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->GRP_ID;  
                $output['name'] = $row->GRP_NAME;  
                $output['short_name'] = $row->GRP_SHORT_NAME;  
              
           }  
           echo json_encode($output); 
    }
    public function update(){    
         $update = array(
            'GRP_NAME' => strtoupper($this->input->post('name_edit')), 
            'GRP_SHORT_NAME' => strtoupper($this->input->post('short_name_edit')),        
            'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
           );           
         $this->ProgramGroup_model->updateProgramGroup($update,$this->input->post('id'));
         $data['program_group'] = $this->ProgramGroup_model->getProgramGroups();  
         print($this->load->view('program_group/program_group_table', $data));
    }

  

}