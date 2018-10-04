<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class AcademicYear extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('AcademicYear_model');   
    }
    public function index(){ 
        $data['title']="Academic Year";
        $data['academic_year'] = $this->AcademicYear_model->getAcademicYears();  
        $this->load->view('academic_year/index', $data);    
    }   
    public function store(){    
        $data = array(
        'AYID' =>  $this->Savvy_model->getNextId('AYID','ACADEMIC_YEAR','school_db'), 
        'AY_FROM' => format_date($this->input->post('from')), 
        'AY_TO' =>   format_date($this->input->post('to')), 
        'AY_DESC' => strtoupper($this->input->post('description')), 
        'UCODE' =>  $this->session->userdata('login_id'), 
       );        
       $this->AcademicYear_model->insertAcademicYear($data);
       $data['academic_year'] = $this->AcademicYear_model->getAcademicYears();  
       print($this->load->view('academic_year/academic_year_table', $data)); 
    }
    public function toggle(){    
        $id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->AcademicYear_model->changeAcademicYear($id,$status);
        $data['academic_year'] = $this->AcademicYear_model->getAcademicYears();  
       print($this->load->view('academic_year/academic_year_table', $data));
    }
    public function edit(){    
           $id = $this->input->post('id'); 
           $data = $this->AcademicYear_model->editAcademicYear($id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->AYID;  
                $output['from'] = $row->AY_FROM;  
                $output['to'] = $row->AY_TO;  
                $output['desc'] = $row->AY_DESC;  
              
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array( 
        'AY_FROM' => format_date($this->input->post('from_edit')), 
        'AY_TO' =>   format_date($this->input->post('to_edit')), 
        'AY_DESC' => strtoupper($this->input->post('description_edit')), 
        'LAST_UPDATE_BY' => $this->session->userdata('login_id')
         );        
        $this->AcademicYear_model->updateAcademicYear($update,$this->input->post('id'));
        $data['academic_year'] = $this->AcademicYear_model->getAcademicYears();  
        print($this->load->view('academic_year/academic_year_table', $data)); 
    }  

}