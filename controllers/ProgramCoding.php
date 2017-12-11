<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProgramCoding extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('ProgramCoding_model');    
    }
    public function index(){  

        $data['title'] = 'Program Coding';
        $data['program_mediums']  = $this->ProgramCoding_model->getProgramMediums(); 
        $data['program_shifts']  = $this->ProgramCoding_model->getProgramShifts(); 
        $data['program_genders']  = $this->ProgramCoding_model->getProgramGenders(); 
        $data['programs']  = $this->ProgramCoding_model->getPrograms(); 
        $data['program_codes']    = $this->ProgramCoding_model->getProgramCodings();  
        $this->load->view('program_coding/index', $data);    
    }   
    public function store(){    
        $data = array(
        'PROGRAM_LINE_ID' =>  $this->Savvy_model->getNextId('PROGRAM_LINE_ID','PROGRAM_CODING','school_db'),  
        'GENDER_ID' => $this->input->post('gender'), 
        'SHIFT_ID' => $this->input->post('shift'), 
        'MEDIUM_ID' => $this->input->post('medium'), 
        'PROGRAM_ID' => $this->input->post('program'), 
        'CMPCODE' => $this->session->userdata('cmpcode'), 
        'SEGCODE' => $this->session->userdata('campus_id'),      
        'UCODE' =>  $this->session->userdata('login_id'), 
       );        
       $this->ProgramCoding_model->insertProgramCoding($data);
        $data['program_codes'] = $this->ProgramCoding_model->getProgramCodings();  
        print($this->load->view('program_coding/program_coding_table', $data)); 
    }
    public function toggle(){    
        $id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->ProgramCoding_model->changeProgramCoding($id,$status);
        $data['program_codes'] = $this->ProgramCoding_model->getProgramCodings();  
        print($this->load->view('program_coding/program_coding_table', $data));
    }
    public function edit(){    
           $id = $this->input->post('id'); 
           $data = $this->ProgramCoding_model->editProgramCoding($id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->PROGRAM_LINE_ID;  
                $output['program'] = $row->PROGRAM_ID;  
                $output['gender'] = $row->GENDER_ID;  
                $output['shift'] = $row->SHIFT_ID;  
                $output['medium'] = $row->MEDIUM_ID;  
 
              
           }  
           echo json_encode($output); 
    }
    public function update(){    
         $update = array(
            'GENDER_ID' => $this->input->post('gender_edit'), 
            'SHIFT_ID' => $this->input->post('shift_edit'), 
            'MEDIUM_ID' => $this->input->post('medium_edit'), 
            'PROGRAM_ID' => $this->input->post('program_edit'),        
            'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
           );           
         $this->ProgramCoding_model->updateProgramCoding($update,$this->input->post('id'));
         $data['program_codes'] = $this->ProgramCoding_model->getProgramCodings();  
         print($this->load->view('program_coding/program_coding_table', $data));
    }

  

}
