<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProgramSection extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('ProgramSection_model');    
    }
    public function index(){  

        $data['title'] = 'Program Section'; 
        $data['programs']  = $this->ProgramSection_model->getProgramLines(); 
        $data['sections']  = $this->ProgramSection_model->getSections(); 
        $data['program_sections']    = $this->ProgramSection_model->getProgramSections();  
        $this->load->view('program_section/index', $data);    
    }   
    public function store(){    
        $data = array(
        'TRNNO' =>  $this->Savvy_model->getNextId('TRNNO','PROGRAM_SECTION','school_db'),  
        'CMPCODE' =>  $this->session->userdata('cmpcode'), 
        'SEGCODE' =>  $this->session->userdata('campus_id'),  
        'PROGRAM_LINE_ID' => $this->input->post('program'),     
        'SECTION_ID' => $this->input->post('section'),     
        'REMARKS' => strtoupper($this->input->post('remarks')) ,     
        'UCODE' =>  $this->session->userdata('login_id'), 
         );        
        $this->ProgramSection_model->insertProgramSection($data);
        $data['program_sections'] = $this->ProgramSection_model->getProgramSections();  
        print($this->load->view('program_section/program_section_table', $data)); 
    }
    public function toggle(){    
        $id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->ProgramSection_model->changeProgramSection($id,$status);
        $data['program_sections'] = $this->ProgramSection_model->getProgramSections();  
        print($this->load->view('program_section/program_section_table', $data));
    }
    public function edit(){    
           $id = $this->input->post('id'); 
           $data = $this->ProgramSection_model->editProgramSection($id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->TRNNO;  
                $output['program'] = $row->PROGRAM_LINE_ID;  
                $output['section'] = $row->SECTION_ID;  
                $output['remarks'] = $row->REMARKS;         
           }  
           echo json_encode($output); 
    }
    public function update(){    
         $update = array(
            'SECTION_ID' => $this->input->post('section_edit'), 
            'PROGRAM_LINE_ID' => $this->input->post('program_edit'),        
            'REMARKS' => strtoupper($this->input->post('remarks_edit')),        
            'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
           );           
         $this->ProgramSection_model->updateProgramSection($update,$this->input->post('id'));
         $data['program_sections'] = $this->ProgramSection_model->getProgramSections();  
         print($this->load->view('program_section/program_section_table', $data));
    }  

}

