<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Section extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('Section_model');    
    }
    public function index(){ 
        $data['title']="Section";
        $data['sections'] = $this->Section_model->getSections();  
        $this->load->view('section/index', $data);    
    }
   
    public function store(){    
        $data = array(
        'SECTION_ID' =>   $this->Savvy_model->getNextId('SECTION_ID','SECTIONS','school_db'), 
        'SECTION_DESC' =>         strtoupper($this->input->post('desc')), 
        'SECTION_SHORT_DESC' =>   strtoupper($this->input->post('short_desc')), 
        'UCODE' =>  $this->session->userdata('login_id'), 
       );       
       $this->Section_model->insertSection($data);
        $data['sections'] = $this->Section_model->getSections();  
       print($this->load->view('section/section_table', $data)); 
    }
    public function toggle(){    
        $section_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->Section_model->changeSection($section_id,$status);
        $data['sections'] = $this->Section_model->getSections();  
       print($this->load->view('section/section_table', $data));
    }
    public function edit(){    
           $section_id = $this->input->post('id'); 
           $data = $this->Section_model->editSection($section_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->SECTION_ID;  
                $output['desc'] = $row->SECTION_DESC;  
                $output['short_desc'] = $row->SECTION_SHORT_DESC;                 
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array( 
        'SECTION_DESC' => strtoupper($this->input->post('desc_edit')), 
        'SECTION_SHORT_DESC' =>   strtoupper($this->input->post('short_desc_edit')), 
        'LAST_UPDATE_BY' => $this->session->userdata('login_id'),  
         );        
        $this->Section_model->updateSection($update,$this->input->post('id'));
        $data['sections'] = $this->Section_model->getSections();  
        print($this->load->view('section/section_table', $data)); 
    }

  

}