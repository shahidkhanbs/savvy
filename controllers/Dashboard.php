<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct() {

        parent::__construct();
        $this->load->model('Account_model');
    }
    function index(){   
        $data['title'] = "Dashboard";
        $this->load->view('dashboard/dashboard',$data);     
    }
    

}