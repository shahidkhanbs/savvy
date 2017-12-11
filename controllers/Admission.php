<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admission extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');    
        $this->load->model('Admission_model');    
        $this->school_db = $this->load->database('school', TRUE);
    }
    public function index(){ 
        $data['title']="Admission";  
        $data['admissions'] = $this->Admission_model->getAdmissions();  
        $this->load->view('admission/index', $data);    
    }  
    public function editAdmission($id){ 
        $data['title']="Edit Admission";
        $data['references'] = $this->Savvy_model->getReferences();  
        $data['provinces']     = $this->Savvy_model->getProvinceByCountry(); 
        $data['cities']     = $this->Savvy_model->getCities();  
        $data['locations']  = $this->Savvy_model->getLocations();  
        $data['religions']  = $this->Savvy_model->getReligions();  
        $data['admission']  = $this->Admission_model->editAdmission($id);   
        $this->load->view('admission/edit_admission', $data);    
    }   
    public function updateAdmission(){          

         $inquiryData = array(          
            'FIRST_NAME' => strtoupper($this->input->post('FIRST_NAME')),
            'LAST_NAME' => strtoupper($this->input->post('LAST_NAME')),
            'GENDER' => $this->input->post('GENDER'),
            'DOB' => format_date($this->input->post('DOB')),
            'EMAIL_ADDRESS' => strtoupper($this->input->post('EMAIL_ADDRESS')),
            'MOBILE_NO' => $this->input->post('MOBILE_NO'),
            'LANDLINE_NO' => $this->input->post('LANDLINE_NO'),
            'INQ_TYPE' => $this->input->post('INQ_TYPE'),
            'RELIGION_ID' => $this->input->post('RELIGION_ID'),
            'REFERENCE_ID' => $this->input->post('REFERENCE_ID'),
            'CMP_REFERENCE' => $this->input->post('CMP_REFERENCE'),
            'CMP_REFERENCE_DETAIL' => $this->input->post('CMP_REFERENCE_DETAIL'),
            'COUNTRY_ID' => $this->input->post('COUNTRY_ID'),
            'PROVINCE_ID' => $this->input->post('PROVINCE_ID'),
            'CITY_ID' => $this->input->post('CITY_ID'),
            'LOCATION_ID' => $this->input->post('LOCATION_ID'),
            'PRESENT_ADDRESS' => $this->input->post('PRESENT_ADDRESS'),
            'PERMANENT_ADDRESS' => $this->input->post('PERMANENT_ADDRESS'),
            'FATHER_NAME' => strtoupper($this->input->post('FATHER_NAME')),
            'FATHER_CNIC' => $this->input->post('FATHER_CNIC'),
            'FATHER_MOBILE_NO' => $this->input->post('FATHER_MOBILE_NO'),
            'MOTHER_NAME' => strtoupper($this->input->post('MOTHER_NAME')),
            'MOTHER_CNIC' => $this->input->post('MOTHER_CNIC'),
            'MOTHER_MOBILE_NO' => $this->input->post('MOTHER_MOBILE_NO')
        );                             
        $this->school_db->trans_start();
        $this->school_db->where('TRNNO', $this->input->post('TRNNO'));
        $this->school_db->update('INQUIRY', $inquiryData); 
        $this->school_db->trans_complete();
          if ($this->school_db->trans_status() === FALSE)
            {
              $this->session->set_flashdata('msg', 'Admission Updation Failed.');
              redirect(base_url().'savvy1/Admission/editAdmission/'.$this->input->post('TRNNO'));
            } 
            if (!empty($_FILES['pic']['name'])) {
            $dir = "uploads/students";
            if (!is_dir($dir)) {
                mkdir($dir, 0777, TRUE);
            }
            $data['baseurl'] = $this->config->item('base_url');
            $this->image_path = realpath(APPPATH . $dir);
            $this->image_path_url = $data['baseurl'] . $dir;
            $config = array(
                'upload_path' => $dir,
                'allowed_types' => '*',
                'max_size' => '20000',
                'max_width' => '30000',
                'max_height' => '500000',
                'encrypt_name' => false,
                'overwrite' => TRUE,
                'file_name' => $this->input->post('TRNNO'),
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('pic');
            $upload_data = $this->upload->data();
            if ( ! $this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
            }       
            $data = array('PIC_PATH' =>$upload_data['file_name']);    
            $this->school_db->where('TRNNO', $this->input->post('TRNNO'));
            $this->school_db->update('INQUIRY', $data);
        }
        $this->session->set_flashdata('msg', 'Admission Successfully Updated.');
        redirect(base_url().'savvy1/Admission/index');
    }
     public function insertNewLocation() {
        $id =  $this->Savvy_model->getNextId('LOCATION_ID','SU_LOCATION','school_db');
        $data = array(
            'LOCATION_ID' => $id,
            'LOCATION_DESC' => strtoupper($this->input->post('locationVal')),
            'LOCATION_SHORT_DESC' => strtoupper($this->input->post('location_short_Val')),
            'COUNTRY_ID' => 1,
            'PROVINCE_ID' => $this->input->post('PROVINCE_ID'),
            'CITY_ID' => $this->input->post('CITY_ID'),
            'UCODE' => $this->session->userdata('login_id'),
            'ACTIVE_FLAG' => 1,
        );
        $result = $this->Inquiry_model->insertLocation($data);
            if($result =="1"){
                echo $id;

            }
            else{
                echo 0;

            }
        
    }   

    
}

