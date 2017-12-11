<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Import extends MX_Controller
{
    public function __construct() {
        parent::__construct();   
        $this->load->model('Import_model');    
    }
    public function index(){ 
        $data['title']="Import Data"; 
        $this->load->view('importing/index', $data);    
    }
    public function ImportInquiryData()
    {
        
    }
   
  

}