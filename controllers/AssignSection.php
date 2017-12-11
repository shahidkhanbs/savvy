<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AssignSection extends MX_Controller
{
    public function __construct() {
        parent::__construct();   
        $this->load->model('AssignSection_model'); 
        $this->load->helper('array_group_by_helper'); 
        $this->school_db = $this->load->database('school', TRUE);   
    }
    /* Assign Section Start here */
    public function index(){ 
        $data['title']="Section Assigning"; 
        $data['programs']      = $this->AssignSection_model->getProgramLines();
        $data['students']      = '';
        $this->load->view('assign_section/create_section_index', $data);    
    }
    public function MissingSections()
    {
        $id = $this->input->post('id');
        $data    = $this->AssignSection_model->getSectionByProgram($id);
        echo '<option value="">Select Section</option>';
        foreach ($data as $value) {
            echo '<option value="'.$value->TRNNO.'">' . $value->SECTION_DESC . '</option>';
        }
    }
    public function createSectionList(){
        $data['title']="Section Assigning"; 
        $program = $this->input->post('program');
        $section = $this->input->post('section');
        $data['limit'] = $this->input->post('limit');
        $data['students'] =  $this->AssignSection_model->getStudents($program, $section);
        print($this->load->view('assign_section/create_student_list', $data));
    }
    public function assignSections(){          
        $student_ids = array_values(array_filter($this->input->post('student_id')));
        $roll_nos    = array_values(array_filter($this->input->post('roll_number')));  
       foreach ($student_ids as $key => $value)
            {
                if (!empty($value) && !empty($roll_nos[$key])) {
                 $update = array( 
                    'Roll_NO' => $roll_nos[$key], 
                    'SECTION_ID' => $this->input->post('seleted_section'),        
                  );
                  $this->school_db->where('STUDENT_ID', $value);
                  $this->school_db->update('STUDENTS', $update);                             
                }
            }
        $this->session->set_flashdata('msg', 'Section And Roll Number Assigned.');    
        redirect(base_url() . 'savvy1/AssignSection');        
    }
    /* Assign Section End here */
    /* Remove Section Start here */
    public function removeSection(){ 
        $data['title']="Remove Section"; 
        $data['programs']      = $this->AssignSection_model->getProgramLines();
        $data['students']      = '';
        $this->load->view('assign_section/remove_section_index', $data);    
    }
    public function RemoveSectionList(){
        $data['title']="Remove Section"; 
        $program = $this->input->post('program');
        $section = $this->input->post('section');
        $data['students'] =  $this->AssignSection_model->getremoveStudents($program, $section);
        print($this->load->view('assign_section/remove_student_list', $data));
    }
    public function updateSectionList(){
        $data['title']="Remove Section"; 
        $program = $this->input->post('program');
        $section = $this->input->post('section');
        $data['students'] =  $this->AssignSection_model->getremoveStudents($program, $section);
        print($this->load->view('assign_section/updation_student_list', $data));
    }
    public function programSections()
    {
        $id = $this->input->post('id');
        $data    = $this->AssignSection_model->allSectionByProgram($id);
        echo '<option value="">Select Section</option>';
        foreach ($data as $value) {
            echo '<option value="'.$value->TRNNO.'">' . $value->SECTION_DESC . '</option>';
        }
    }
    public function deleteSection()
    {
        $id = $this->input->post('id');
        $update = array( 
            'Roll_NO' => '', 
            'SECTION_ID' =>'',        
        );
      $this->school_db->where('STUDENT_ID', $id);
      $this->school_db->update('STUDENTS', $update);
      $program = $this->input->post('program');
      $section = $this->input->post('section');
      $data['students'] =  $this->AssignSection_model->getremoveStudents($program, $section);
      print($this->load->view('assign_section/remove_student_list', $data));
    }
    public function deleteBatchSections(){          
        $student_ids = array_values(array_filter($this->input->post('student_id')));  
       foreach ($student_ids as $key => $value)
            {
                 $update = array( 
                    'Roll_NO' => '', 
                    'SECTION_ID' => '',        
                  );
                  $this->school_db->where('STUDENT_ID', $value);
                  $this->school_db->update('STUDENTS', $update);                               
              
            }
        $this->session->set_flashdata('msg', 'Section And Roll Number Deleted Successfully.');    
        redirect(base_url() . 'savvy1/AssignSection/removeSection');        
    }
    /* Remove Section End here */
    /* Shift Section Start here */
     public function shiftSection(){ 
        $data['title']="Remove Section"; 
        $data['programs']      = $this->AssignSection_model->getProgramLines();
        $data['students']      =   $this->AssignSection_model->getStudentss();
        $this->load->view('assign_section/shift_section_index', $data);    
    }
    public function programSectionStudents(){
        $program = $this->input->post('id');
        $data['students']   = $this->AssignSection_model->getStudentsByProgram($program);
        print($this->load->view('assign_section/shift_list', $data));

    }
     public function addToList(){
        $itemId = $this->input->post('itemId');
        $section = $this->input->post('toList');
        $program = $this->input->post('program');
        $rollnumber  = $this->AssignSection_model->getRollNumber($program,$section);
       
        $update = array( 
            'Roll_NO' => $rollnumber , 
            'SECTION_ID' => $section,        
        );
        $this->school_db->where('STUDENT_ID', $itemId);
        $this->school_db->update('STUDENTS', $update);
        $res =  ($this->school_db->affected_rows() != 1) ? false : true; 
        if($res=='1'){
            echo 1;
        } else{
            echo 0;
        }       
    }
    /* Shift Section end here */

    /* Update Section Start here */
    public function updateSection()
    {
        $data['title']="Remove Section"; 
        $data['programs']      = $this->AssignSection_model->getProgramLines();
        $data['students']      = '';
        $this->load->view('assign_section/upation_section_index', $data);    

    }
    public function updateBatchSections(){          
        $student_ids = array_values(array_filter($this->input->post('student_id')));
        $roll_nos    = array_values(array_filter($this->input->post('roll_number')));  
       foreach ($student_ids as $key => $value)
            {
                if (!empty($value) && !empty($roll_nos[$key])) {
                 $update = array( 
                    'Roll_NO' => $roll_nos[$key], 
                    'SECTION_ID' => $this->input->post('seleted_section'),        
                  );
                  $this->school_db->where('STUDENT_ID', $value);
                  $this->school_db->update('STUDENTS', $update);                             
                }
            }
        $this->session->set_flashdata('msg', 'Section And Roll Number Updated.');    
        redirect(base_url() . 'savvy1/AssignSection/updateSection');        
    }

    /* Update Section end here */

   
  

}