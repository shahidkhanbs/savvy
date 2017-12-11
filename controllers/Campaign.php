<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Campaign extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('Campaign_model');           
    }
    public function index(){  
        $data['title'] = "Campaign";  
        $data['academic_years']= $this->Campaign_model->getAcademicYears();  
        $data['campaigns'] = $this->Campaign_model->getCampaigns();  
        $this->load->view('campaign/index', $data);    
    }
    public function store(){    
        $data = array(
        'CAMPAIGN_ID' =>  $this->Savvy_model->getNextId('CAMPAIGN_ID','CAMPAIGN','school_db'), 
        'AYID' => $this->input->post('academic_year'), 
        'CAMPAIGN_NAME' => strtoupper($this->input->post('name')), 
        'CAMPAIGN_SHORT_NAME' =>   strtoupper($this->input->post('short_name')), 
        'CAMPAIGN_START_DATE' => format_date($this->input->post('start_date')), 
        'CAMPAIGN_END_DATE' => format_date($this->input->post('end_date')), 
        'UCODE' =>  $this->session->userdata('login_id'), 
       );        
       $this->Campaign_model->insertCampaign($data);
       $data['campaigns'] = $this->Campaign_model->getCampaigns();  
       print($this->load->view('campaign/campaign_table', $data)); 
    }
    public function toggle(){    
        $campaign_id = $this->input->post('id');       
        $status =   $this->input->post('status');        
        $this->Campaign_model->changeCampaign($campaign_id,$status);
        $data['campaigns'] = $this->Campaign_model->getCampaigns();  
       print($this->load->view('campaign/campaign_table', $data));
    }
    public function edit(){    
           $campaign_id = $this->input->post('id'); 
           $data = $this->Campaign_model->editCampaign($campaign_id); 
           foreach($data as $row)  
           {  
                $output['id'] = $row->CAMPAIGN_ID;  
                $output['name'] = $row->CAMPAIGN_NAME;  
                $output['academic_year'] = $row->AYID;  
                $output['short_name'] = $row->CAMPAIGN_SHORT_NAME;  
                $output['start_date'] = $row->CAMPAIGN_START_DATE;  
                $output['end_date'] = $row->CAMPAIGN_END_DATE;  
              
           }  
           echo json_encode($output); 
    }
    public function update(){    
        $update = array( 
        'CAMPAIGN_NAME' => strtoupper($this->input->post('name_edit')), 
        'CAMPAIGN_SHORT_NAME' =>   strtoupper($this->input->post('short_name_edit')), 
        'AYID' => $this->input->post('academic_year_edit'), 
        'CAMPAIGN_START_DATE' => format_date($this->input->post('start_date_edit')), 
        'CAMPAIGN_END_DATE' => format_date($this->input->post('end_date_edit')),  
        'LAST_UPDATE_BY' => $this->session->userdata('login_id')
         );        
        $this->Campaign_model->updateCampaign($update,$this->input->post('id'));
        $data['campaigns'] = $this->Campaign_model->getCampaigns();  
        print($this->load->view('campaign/campaign_table', $data));
    }

  

}