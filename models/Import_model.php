<?php
class Import_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }
       
   
    
}
