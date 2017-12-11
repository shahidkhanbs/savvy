<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Inquiry extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Savvy_model');
        $this->load->model('Inquiry_model');
        $this->load->model('Challan_model');
        $this->school_db = $this->load->database('school', TRUE);
    }
    public function index()
    {
        $data['title']     = "Inquiry";
        $data['inquiries'] = $this->Inquiry_model->getInquiries();
        $this->load->view('inquiry/index', $data);
    }
    public function createInquiry()
    {
        $data['title']         = "Create Inquiry";
        $data['references']    = $this->Savvy_model->getReferences();
        $data['programs']      = $this->Savvy_model->getProgramLines();
        $data['products']      = $this->Savvy_model->getProducts();
        $this->load->view('inquiry/create_inquiry', $data);
    }
    
    public function createAdmissionForm()
    {
        $data['title']         = "Inquiry";
        $data['references']    = $this->Savvy_model->getReferences();
        $data['religions']     = $this->Savvy_model->getReligions();
        $data['locations']     = $this->Savvy_model->getLocations();
        $data['programs']      = $this->Savvy_model->getProgramLines();
        $data['products']      = $this->Savvy_model->getProducts();
        $data['stops']         = $this->Savvy_model->getStops();
        $data['institutes']    = $this->Savvy_model->getInstitutes();
        $this->load->view('inquiry/create_complete_form', $data);
    }
    
    public function InsertInquiry()
    {
        $campus_id = $this->session->userdata('campus_id');
        $cmp_code  = $this->session->userdata('cmpcode');
        $FY_ID     = $this->Savvy_model->getFyidForTrnno();
        $MAX_ID    = $this->Savvy_model->getNextTrnId();
        $TRNNO     = $FY_ID . $cmp_code . $campus_id . $MAX_ID;        
        $data = array(
            'TRNNO' => $TRN_ID = str_replace(' ', '', $TRNNO),
            'TRNDATE' => date('d-M-Y'),
            'CMPCODE' => $this->session->userdata('cmpcode'),
            'FYID' => $this->session->userdata('fyid'),
            'SEGCODE' => $this->session->userdata('campus_id'),
            'UCODE' => $this->session->userdata('login_id'),
            'FIRST_NAME' => strtoupper($this->input->post('FIRST_NAME')),
            'LAST_NAME' => strtoupper($this->input->post('LAST_NAME')),
            'GENDER' => $this->input->post('GENDER'),
            'DOB' => format_date($this->input->post('DOB')),
            'AYID' => $this->Savvy_model->getAcedmicYear(),
            'CAMPAIGN_ID' => $this->Savvy_model->getCampaign(),
            'ADMISSION_TYPE' => 1,
            'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_ID'),
            'PRODUCT_ID' => $this->input->post('PRODUCT_ID'),
            'PRODUCT_PRICE' => $this->input->post('PRODUCT_PRICE'),
            'REMARKS' => strtoupper($this->input->post('REMARKS')),
            'INQ_TYPE' => $this->input->post('INQ_TYPE'),
            'REFERENCE_ID' => $this->input->post('REFERENCE_ID'),
            'FATHER_NAME' => strtoupper($this->input->post('FATHER_NAME')),
            'FATHER_CNIC' => strtoupper($this->input->post('FATHER_CNIC')),
            'FATHER_MOBILE_NO' => $this->input->post('FATHER_MOBILE_NO')
            
        );
        $query        =  $this->Inquiry_model->insertInquiry($data);
        if ($query == 1) {
            $this->session->set_flashdata('msg_success', 'Inquiry Successfully Inserted Do You Want To Update?.');
            redirect(base_url() . 'savvy1/Inquiry/editInquiry/' . $TRN_ID);
        }
        $this->session->set_flashdata('msg', 'Inquiry Insertion Failed.');
        redirect(base_url() . 'savvy1/Inquiry/createInquiry');
    }
    public function editInquiry($id)
    {
        $data['title']      = "Edit Inquiry";
        $data['references'] = $this->Savvy_model->getReferences();    
        $data['religions']  = $this->Savvy_model->getReligions();
        $data['programs']   = $this->Savvy_model->getProgramLines();
        $data['products']   = $this->Savvy_model->getProducts();
        $data['inquiry']    = $this->Inquiry_model->editInquiry($id);
        $this->load->view('inquiry/edit_inquiry', $data);
    }
    public function matureInquiry($id)
    {
        $data['title']      = "Edit Inquiry";
        $data['references'] = $this->Savvy_model->getReferences();
        $data['religions']  = $this->Savvy_model->getReligions();
        $data['institutes'] = $this->Savvy_model->getInstitutes();
        $data['programs']   = $this->Savvy_model->getProgramLines();
        $data['locations']     = $this->Savvy_model->getLocations();
        $data['products']   = $this->Savvy_model->getProducts();
        $data['stops']      = $this->Savvy_model->getStops();
        $data['inquiry']    = $this->Inquiry_model->editInquiry($id);
        $this->load->view('inquiry/edit_inquiry_to_admission', $data);
    }
    
    public function updateInquiry()
    {
        $inquiryData = array(         
            'FIRST_NAME' => strtoupper($this->input->post('FIRST_NAME')),
            'LAST_NAME' => strtoupper($this->input->post('LAST_NAME')),
            'GENDER' => $this->input->post('GENDER'),
            'DOB' => format_date($this->input->post('DOB')),
            'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_ID'),
            'PRODUCT_ID' => $this->input->post('PRODUCT_ID'),
            'PRODUCT_PRICE' => $this->input->post('PRODUCT_PRICE'),
            'REMARKS' => strtoupper($this->input->post('REMARKS')),
            'INQ_TYPE' => $this->input->post('INQ_TYPE'),
            'REFERENCE_ID' => $this->input->post('REFERENCE_ID'),
            'FATHER_NAME' => strtoupper($this->input->post('FATHER_NAME')),
            'FATHER_CNIC' => strtoupper($this->input->post('FATHER_CNIC')),
            'FATHER_MOBILE_NO' => $this->input->post('FATHER_MOBILE_NO'),            
        );
        $this->school_db->trans_start();
        $this->school_db->where('TRNNO', $this->input->post('TRNNO'));
        $this->school_db->set('LAST_UPDATE_DATE',"SYSDATE",false);
        $this->school_db->update('INQUIRY', $inquiryData);
        $this->school_db->trans_complete();
        if ($this->school_db->trans_status() === FALSE) {
            $this->session->set_flashdata('msg', 'Inquiry Updation Failed.');
            redirect(base_url() . 'savvy1/Inquiry/editInquiry/' . $this->input->post('TRNNO'));
        }
        
        $this->session->set_flashdata('msg', 'Inquiry Successfully Updated.');
        redirect(base_url() . 'savvy1/Inquiry');
        
    }
    public function InsertAdmissionForm()
    {
        if ($this->input->post('is_transport') == '2') {
            $TRANSPORT_STOP_ID = $this->input->post('TRANSPORT_FEE_ID');
            $Tranport_fee = $this->input->post('Tranport_fee');
        } else {
            $TRANSPORT_STOP_ID = '';
        }
        $allAddress  = $this->Savvy_model->getAddress();
        $PROVINCE_ID = $allAddress[0]['PROVINCE_ID'];
        $CITY_ID =     $allAddress[0]['CITY_ID'];
        $academics_data = array(
            'TRNNO' => $this->input->post('TRNNO'),
            'LINE_NO' => 1,
            'QUALIFICATION' => strtoupper($this->input->post('QUALIFICATION')),
            'INSTITUTE_ID' => $this->input->post('INSTITUTE_ID'),
            'SUBJECTS' => $this->input->post('SUBJECTS'),
            'TOTAL_MARKS' => $this->input->post('TOTAL_MARKS'),
            'OBTAINED_MARKS' => $this->input->post('OBTAINED_MARKS'),
            'DEGREE_YEAR' => $this->input->post('DEGREE_YEAR'),
            'GRADE' => $this->input->post('GRADE'),
            'MARKS_PERCENTAGE' => $this->input->post('MARKS_PERCENTAGE'),
            'UCODE' => $this->session->userdata('login_id')
        );
        
        $student_data = array(
            'STUDENT_ID' => $this->input->post('TRNNO'),
            'INQUIRY_ID' => $this->input->post('TRNNO'),
            'AYID' => $this->Savvy_model->getAcedmicYear(),
            'CAMPAIGN_ID' => $this->Savvy_model->getCampaign(),
            'CMPCODE' => $this->session->userdata('cmpcode'),
            'SEGCODE' => $this->session->userdata('campus_id'),
            'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_ID'),
            'ADMISSION_FEE_ID' => $this->input->post('FEE_ID'),
            'PART' => 1,
            'UCODE' => $this->session->userdata('login_id'),
            'ADMISSION_DISCOUNT' => $this->input->post('ADMISSION_DISCOUNT'),
            'REGISTRATION_DISCOUNT' => $this->input->post('REGISTRATION_DISCOUNT'),
            'SECURITY_DISCOUNT' => $this->input->post('SECURITY_DISCOUNT'),
            'ANNUAL_DISCOUNT' => $this->input->post('ANNUAL_DISCOUNT'),
            'TUTION_DISCOUNT' => $this->input->post('TUTION_DISCOUNT'),
            'TRANSPORT_VEHICLE_ID' => $this->input->post('vehicle_id'),
            'TRANSPORT_STOP_ID' => $this->input->post('stop_select'),
        );        
        $update_inquiry = array(
            'FIRST_NAME' => strtoupper($this->input->post('FIRST_NAME')),
            'LAST_NAME' => strtoupper($this->input->post('LAST_NAME')),
            'GENDER' => $this->input->post('GENDER'),
            'DOB' => format_date($this->input->post('DOB')),
            'LANDLINE_NO' => strtoupper($this->input->post('LANDLINE_NO')),
            'INQ_TYPE' => $this->input->post('INQ_TYPE'),
            'RELIGION_ID' => $this->input->post('RELIGION_ID'),
            'REFERENCE_ID' => $this->input->post('REFERENCE_ID'),
            'CMP_REFERENCE' => strtoupper($this->input->post('CMP_REFERENCE')),
            'CMP_REFERENCE_DETAIL' => strtoupper($this->input->post('CMP_REFERENCE_DETAIL')),
            'COUNTRY_ID' => 1,
            'PROVINCE_ID' => $PROVINCE_ID,
            'CITY_ID' => $CITY_ID,
            'LOCATION_ID' => $this->input->post('LOCATION_ID'),
            'PRESENT_ADDRESS' => strtoupper($this->input->post('PRESENT_ADDRESS')),
            'PERMANENT_ADDRESS' => strtoupper($this->input->post('PERMANENT_ADDRESS')),
            'FATHER_NAME' => strtoupper($this->input->post('FATHER_NAME')),
            'FATHER_CNIC' => strtoupper($this->input->post('FATHER_CNIC')),
            'FATHER_MOBILE_NO' => $this->input->post('FATHER_MOBILE_NO'),
            'MOTHER_NAME' => $this->input->post('MOTHER_NAME'),
            'MATURE_FLAG' => 1,
            'MOTHER_MOBILE_NO' => $this->input->post('MOTHER_MOBILE_NO')
        );

        
        $this->school_db->trans_start();
        $this->school_db->insert('INQUIRY_ACADEMICS', $academics_data);
        $this->school_db->insert('STUDENTS', $student_data);
        $this->school_db->where('TRNNO', $this->input->post('TRNNO'));
        $this->school_db->update('INQUIRY', $update_inquiry);
        $this->school_db->trans_complete();
        if ($this->school_db->trans_status() === FALSE) {
            $this->session->set_flashdata('msg', 'Admission Form Submition Failed.');
            redirect(base_url() . 'savvy1/Inquiry/matureInquiry/' . $this->input->post('TRNNO'));
        }
         /*challan start*/
        if($this->input->post('ins_type') == '2')
        {
            $count =1;
        }
        if($this->input->post('ins_type') == '4')
        {
            $count =2;
        }
        if($this->input->post('ins_type') == '6')
        {
            $count =3;
        }
        if($this->input->post('ins_type') == '8')
        {
            $count =12;
        }
        $current_date = $this->input->post('first_date');                
        $from_date    = date('01-M-Y', strtotime('1 month', strtotime($current_date)));   
        $to_date = date('01-M-Y', strtotime(($count).'month', strtotime($current_date))); 
        $TRNNO   = $this->Challan_model->getChallanMSTTRNNO($this->input->post('TRNNO')); 
        $installment_data = array(
            'TRNNO'   => $TRNNO,
            'TRNDATE' => date('d-M-Y'),
            'INS_TYPE' => $this->input->post('ins_type'),
            'CAMPAIGN_ID' => $this->Savvy_model->getCampaign(),
            'CMPCODE' => $this->session->userdata('cmpcode'),
            'SEGCODE' => $this->session->userdata('campus_id'),
            'STUDENT_ID' => $student,
            'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_LINE_ID'),
            'PAYMENT_MODE' => '1',
            'PAID_BY' => $this->session->userdata('login_id'),
            'PAID_DATE' => date('d-M-Y'),
            'DUE_DATE' => format_date($this->input->post('due_date')),
            'FROM_MONTH' => $from_date,
            'TO_MONTH' => $to_date,
            'UCODE' => $this->session->userdata('login_id'),
        ); 
        $this->school_db->insert('FEE_INSTALLMENT_MST', $installment_data);                        
            for ($i = 1; $i <= $count; $i++) { 
                  if($this->Challan_model->getNextLineNo($TRNNO)=='1')
                  {
                    $amount = $this->input->post('TOTAL_FEE'); 
                  }else{
                    $amount = $this->input->post('TUTION_FEE'); 
                  }

                $date = date('d-M-Y');               
                $date = date('01-M-Y', strtotime(($i-1).'month', strtotime($date)));        
                $install = array(
                    'TRNNO'             => $TRNNO,
                    'LINE_NO'           => $this->Challan_model->getNextLineNo($TRNNO),
                    'FEE_MONTH'         => $date,
                    'FEE_ID'            => $this->input->post('FEE_ID'),
                    'AMOUNT'            => $amount,
                    'ENT_DATE'          => date('d-M-Y'),
                    'UCODE'             => $this->session->userdata('login_id'),
                    'ACTIVE_FLAG'       => 1,
                );
                $this->school_db->insert('FEE_INSTALLMENT_DTL', $install);          
            }
        /*challan end*/ 
        $this->session->set_flashdata('msg', 'Admission Form Successfully Submited.');
        redirect(base_url() . 'savvy1/Inquiry/index');
    }
    /*INSERT ADMINSION FORM*/
    public function InsertCompleteAdmissionForm()
    {
        
        $allAddress  = $this->Savvy_model->getAddress();
        $PROVINCE_ID = $allAddress[0]['PROVINCE_ID'];
        $CITY_ID =     $allAddress[0]['CITY_ID'];
        $campus_id    = $this->session->userdata('campus_id');
        $cmp_code     = $this->session->userdata('cmpcode');
        $FY_ID        = $this->Savvy_model->getFyidForTrnno();
        $MAX_ID       = $this->Savvy_model->getNextTrnId();
        $TRNNO        = $FY_ID . $cmp_code . $campus_id . $MAX_ID;
        $inquiry_data = array(
            'TRNNO' => $TRN_ID = str_replace(' ', '', $TRNNO),
            'TRNDATE' => date('d-M-Y'),
            'CMPCODE' => $this->session->userdata('cmpcode'),
            'FYID' => $this->session->userdata('fyid'),
            'SEGCODE' => $this->session->userdata('campus_id'),
            'UCODE' => $this->session->userdata('login_id'),
            'AYID' => $this->Savvy_model->getAcedmicYear(),
            'CAMPAIGN_ID' => $this->Savvy_model->getCampaign(),
            'ADMISSION_TYPE' => 1,
            'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_ID'),
            'PRODUCT_ID' => $this->input->post('PRODUCT_ID'),
            'PRODUCT_PRICE' => $this->input->post('PRODUCT_PRICE'),
            'REMARKS' => strtoupper($this->input->post('REMARKS')),
            'FIRST_NAME' => strtoupper($this->input->post('FIRST_NAME')),
            'LAST_NAME' => strtoupper($this->input->post('LAST_NAME')),
            'GENDER' => $this->input->post('GENDER'),
            'DOB' => format_date($this->input->post('DOB')),
            'LANDLINE_NO' => $this->input->post('LANDLINE_NO'),
            'INQ_TYPE' => $this->input->post('INQ_TYPE'),
            'RELIGION_ID' => $this->input->post('RELIGION_ID'),
            'REFERENCE_ID' => $this->input->post('REFERENCE_ID'),
            'CMP_REFERENCE' => $this->input->post('CMP_REFERENCE'),
            'CMP_REFERENCE_DETAIL' => $this->input->post('CMP_REFERENCE_DETAIL'),
            'COUNTRY_ID' => 1,
            'PROVINCE_ID' => $PROVINCE_ID,
            'CITY_ID' => $CITY_ID,
            'LOCATION_ID' => $this->input->post('LOCATION_ID'),
            'PRESENT_ADDRESS' => $this->input->post('PRESENT_ADDRESS'),
            'PERMANENT_ADDRESS' => $this->input->post('PERMANENT_ADDRESS'),
            'FATHER_NAME' => strtoupper($this->input->post('FATHER_NAME')),
            'FATHER_CNIC' => $this->input->post('FATHER_CNIC'),
            'FATHER_MOBILE_NO' => $this->input->post('FATHER_MOBILE_NO'),
            'MOTHER_NAME' => strtoupper($this->input->post('MOTHER_NAME')),
            'MOTHER_CNIC' => $this->input->post('MOTHER_CNIC'),
            'MATURE_FLAG' => 1,
            'MOTHER_MOBILE_NO' => $this->input->post('MOTHER_MOBILE_NO'),            
        );
        $academics_data = array(
            'TRNNO' => $TRN_ID,
            'LINE_NO' => 1,
            'QUALIFICATION' => $this->input->post('QUALIFICATION'),
            'INSTITUTE_ID' => $this->input->post('INSTITUTE_ID'),
            'SUBJECTS' => $this->input->post('SUBJECTS'),
            'TOTAL_MARKS' => $this->input->post('TOTAL_MARKS'),
            'OBTAINED_MARKS' => $this->input->post('OBTAINED_MARKS'),
            'DEGREE_YEAR' => $this->input->post('DEGREE_YEAR'),
            'GRADE' => $this->input->post('GRADE'),
            'MARKS_PERCENTAGE' => $this->input->post('MARKS_PERCENTAGE'),
            'UCODE' => $this->session->userdata('login_id')
        );
        $student_data = array(
            'STUDENT_ID' => $TRN_ID,
            'INQUIRY_ID' => $TRN_ID,
            'AYID' => $this->Savvy_model->getAcedmicYear(),
            'CAMPAIGN_ID' => $this->Savvy_model->getCampaign(),
            'CMPCODE' => $this->session->userdata('cmpcode'),
            'SEGCODE' => $this->session->userdata('campus_id'),
            'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_ID'),
            'ADMISSION_FEE_ID' => $this->input->post('FEE_ID'),
            'PART' => 1,
            'UCODE' => $this->session->userdata('login_id'),
            'ADMISSION_DISCOUNT' => $this->input->post('ADMISSION_DISCOUNT'),
            'REGISTRATION_DISCOUNT' => $this->input->post('REGISTRATION_DISCOUNT'),
            'SECURITY_DISCOUNT' => $this->input->post('SECURITY_DISCOUNT'),
            'ANNUAL_DISCOUNT' => $this->input->post('ANNUAL_DISCOUNT'),
            'TUTION_DISCOUNT' => $this->input->post('TUTION_DISCOUNT'),
            'TRANSPORT_VEHICLE_ID' => $this->input->post('vehicle_id'),
            'TRANSPORT_STOP_ID' => $this->input->post('stop_select'),
        );
        $this->school_db->trans_start();
        $this->school_db->insert('INQUIRY', $inquiry_data);
        $this->school_db->insert('INQUIRY_ACADEMICS', $academics_data);
        $this->school_db->insert('STUDENTS', $student_data);
        $this->school_db->trans_complete();
        if ($this->school_db->trans_status() === FALSE) {
            $this->session->set_flashdata('msg', 'Admission Form Submission Failed.');
            redirect(base_url() . 'savvy1/Inquiry/createAdmissionForm/');
        } 
        /*challan start*/
        if($this->input->post('ins_type') == '2')
        {
            $count =1;
        }
        if($this->input->post('ins_type') == '4')
        {
            $count =2;
        }
        if($this->input->post('ins_type') == '6')
        {
            $count =3;
        }
        if($this->input->post('ins_type') == '8')
        {
            $count =12;
        }
        $current_date = $this->input->post('first_date');                
        $from_date    = date('01-M-Y', strtotime('1 month', strtotime($current_date)));   
        $to_date = date('01-M-Y', strtotime(($count).'month', strtotime($current_date))); 
        $TRNNO   = $this->Challan_model->getChallanMSTTRNNO($TRN_ID); 
        $installment_data = array(
            'TRNNO'   => $TRNNO,
            'TRNDATE' => date('d-M-Y'),
            'INS_TYPE' => $this->input->post('ins_type'),
            'CAMPAIGN_ID' => $this->Savvy_model->getCampaign(),
            'CMPCODE' => $this->session->userdata('cmpcode'),
            'SEGCODE' => $this->session->userdata('campus_id'),
            'STUDENT_ID' => $student,
            'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_LINE_ID'),
            'PAYMENT_MODE' => '1',
            'PAID_BY' => $this->session->userdata('login_id'),
            'PAID_DATE' => date('d-M-Y'),
            'DUE_DATE' => format_date($this->input->post('due_date')),
            'FROM_MONTH' => $from_date,
            'TO_MONTH' => $to_date,
            'UCODE' => $this->session->userdata('login_id'),
        ); 
        $this->school_db->insert('FEE_INSTALLMENT_MST', $installment_data);                        
            for ($i = 1; $i <= $count; $i++) { 
                  if($this->Challan_model->getNextLineNo($TRNNO)=='1')
                  {
                    $amount = $this->input->post('TOTAL_FEE'); 
                  }else{
                    $amount = $this->input->post('TUTION_FEE'); 
                  }

                $date = date('d-M-Y');               
                $date = date('01-M-Y', strtotime(($i-1).'month', strtotime($date)));        
                $install = array(
                    'TRNNO'             => $TRNNO,
                    'LINE_NO'           => $this->Challan_model->getNextLineNo($TRNNO),
                    'FEE_MONTH'         => $date,
                    'FEE_ID'            => $this->input->post('FEE_ID'),
                    'AMOUNT'            => $amount,
                    'ENT_DATE'          => date('d-M-Y'),
                    'UCODE'             => $this->session->userdata('login_id'),
                    'ACTIVE_FLAG'       => 1,
                );
                $this->school_db->insert('FEE_INSTALLMENT_DTL', $install);          
            }
        /*challan end*/  
        $dir = "uploads/students";
        if (!is_dir($dir)) {
            mkdir($dir, 0777, TRUE);
        }
        $data['baseurl']      = $this->config->item('base_url');
        $this->image_path     = realpath(APPPATH . $dir);
        $this->image_path_url = $data['baseurl'] . $dir;
        $config               = array(
            'upload_path' => $dir,
            'allowed_types' => '*',
            'max_size' => '20000',
            'max_width' => '30000',
            'max_height' => '500000',
            'encrypt_name' => false,
            'overwrite' => TRUE,
            'file_name' => $TRN_ID            
        );
        $this->load->library('upload', $config);
        $this->upload->do_upload('pic');
        $upload_data = $this->upload->data();
        if (!$this->upload->do_upload()) {
            $error = array(
                'error' => $this->upload->display_errors()
            );            
        }
        $data = array(
            'PIC_PATH' => $upload_data['file_name']
        );
        $this->school_db->where('TRNNO', $TRN_ID);
        $this->school_db->update('INQUIRY', $data);
        $this->session->set_flashdata('msg', 'Admission Form Successfully Submited.');
        redirect(base_url() . 'savvy1/Inquiry/index');
    }
    /*setting table start here*/  
    
    public function getDiscountAmounts()
    {
        $percentage    = $this->input->post('percentage');
        $program_id    = $this->input->post('id');
        $fee_id        = $this->Inquiry_model->getFeeGroupID($percentage);
        $discount_data = $this->Inquiry_model->getDiscountPolicy($fee_id);
        $data          = $this->Inquiry_model->getDiscountByProgram($program_id);
        foreach ($discount_data as $discount_row) {
            $output['ADMISSION_DISCOUNT']    = $discount_row->ADMISSION_DISCOUNT;
            $output['REGISTRATION_DISCOUNT'] = $discount_row->REGISTRATION_DISCOUNT;
            $output['SECURITY_DISCOUNT']     = $discount_row->SECURITY_DISCOUNT;
            $output['ANNUAL_DISCOUNT']       = $discount_row->ANNUAL_DISCOUNT;
            $output['TUTION_DISCOUNT']       = $discount_row->TUTION_DISCOUNT;
            
        }
        foreach ($data as $row) {
            $output['FEE_ID']           = $row->FEE_ID;
            $output['ADMISSION_FEE']    = $row->ADMISSION_FEE;
            $output['REGISTRATION_FEE'] = $row->REGISTRATION_FEE;
            $output['SECURITY_FEE']     = $row->SECURITY_FEE;
            $output['ANNUAL_FEE']       = $row->ANNUAL_FEE;
            $output['TUTION_FEE']       = $row->TUTION_FEE;
            $output['TOTAL_FEE']        = $row->TOTAL_FEE;
        }
        echo json_encode($output);
    }
    
    public function insertNewLocation() {
        $id =  $this->Savvy_model->getNextId('LOCATION_ID','SU_LOCATION','school_db');
        $data = array(
            'LOCATION_ID' => $id,
            'LOCATION_DESC' => strtoupper($this->input->post('locationVal')),
            'LOCATION_SHORT_DESC' => strtoupper($this->input->post('location_short_Val')),
            'CITY_ID' => $this->Savvy_model->getCity(),
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
    public function getTransportFee(){
            $stop_id = $this->input->post('stop_id');
            $result['fee'] = $this->Savvy_model->getTransportFee($stop_id);
            $result['veh'] = $this->Savvy_model->getTransportVehicle($stop_id);
            echo json_encode($result);
        }
    /*public function test(){
        $allAddress  = $this->Savvy_model->getAddress();
        echo $PROVINCE_ID = $allAddress[0]['PROVINCE_ID'];
        echo $CITY_ID =     $allAddress[0]['CITY_ID'];

    }*/    
    
}