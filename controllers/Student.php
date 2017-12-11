<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends MX_Controller {

    public function __construct() {
        parent::__construct();   
        $this->load->model('Student_model');    
    }
    public function index(){ 
        $data['title']="Student List";  
        $data['students'] = $this->Student_model->getStudents();  
        $this->load->view('student/index', $data);    
    }    

    
}

