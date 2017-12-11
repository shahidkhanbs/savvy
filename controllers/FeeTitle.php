<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FeeTitle extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('FeeTitle_model');    
    }
    public function index(){ 
        $data['title']="Fee Title";
        $data['fee_titles'] = $this->FeeTitle_model->getFeeTitles();  
        $this->load->view('fee_title/index', $data);    
    }
   
    public function store(){    
        $data = array(
        'FEE_TITLE_ID' =>   $this->Savvy_model->getNextId('FEE_TITLE_ID','FEE_TITLE','school_db'), 
        'CMPCODE' =>  $this->session->userdata('cmpcode'), 
        'SEGCODE' =>  $this->session->userdata('campus_id'), 
        'FEE_TITLE_DESC' =>   strtoupper($this->input->post('description')), 
        'FEE_TITLE_SHORT_DESC' =>   strtoupper($this->input->post('short_desc')), 
        'UCODE' =>  $this->session->userdata('login_id'),  
       );     
       $this->FeeTitle_model->insertFeeTitle($data);
       $data['fee_titles'] = $this->FeeTitle_model->getFeeTitles();  
       print($this->load->view('fee_title/fee_title_table', $data)); 
    }
    public function toggle(){    
        $fee_title_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->FeeTitle_model->changeFeeTitle($fee_title_id,$status);
        $data['fee_titles'] = $this->FeeTitle_model->getFeeTitles();  
       print($this->load->view('fee_title/fee_title_table', $data));
    }
    public function edit(){    
           $fee_title_id = $this->input->post('id'); 
           $data = $this->FeeTitle_model->editFeeTitle($fee_title_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->FEE_TITLE_ID;  
                $output['desc'] = $row->FEE_TITLE_DESC;  
                $output['short_desc'] = $row->FEE_TITLE_SHORT_DESC;
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array(  
        'FEE_TITLE_DESC' =>   strtoupper($this->input->post('description_edit')), 
        'FEE_TITLE_SHORT_DESC' =>   strtoupper($this->input->post('short_desc_edit')),   
        'LAST_UPDATE_BY' => $this->session->userdata('login_id'), 
         );        
        $this->FeeTitle_model->updateFeeTitle($update,$this->input->post('id'));
        $data['fee_titles'] = $this->FeeTitle_model->getFeeTitles();  
        print($this->load->view('fee_title/fee_title_table', $data)); 
    }

  

}