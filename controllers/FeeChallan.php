<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class FeeChallan extends MX_Controller
{
    public function __construct() {
        parent::__construct();   
        $this->load->model('Challan_model');    
        $this->load->model('Savvy_model');
        $this->school_db = $this->load->database('school', TRUE);    
    }
    public function index(){ 
        $data['title']="Fee Challan";
        $data['fee_challans'] =$this->Challan_model->getUnpaidChallans();
        $this->load->view('fee_challans/unpaid_fee_challans', $data);    
    } 
    public function createIndividualChallan()
    {
        $data['title']="Create Fine Challan"; 
        $data['students'] =$this->Challan_model->getStudents();
        $this->load->view('fee_challans/create_individual_challan', $data); 
    }
    public function getAmounts()
    {
        $program = $this->input->post('program');
        $data          = $this->Challan_model->getAmountByProgram($program);
        foreach ($data as $row) {
            $output['FEE_ID']           = $row->FEE_ID;
            $output['TUTION_FEE']       = $row->TUTION_FEE;
            $output['TOTAL_FEE']        = $row->TOTAL_FEE;
        }
        echo json_encode($output);
    } 

    public function storeIndividualChallan()
    {
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
        $student = $this->input->post('STUDENT_ID');
        $TRNNO   = $this->Challan_model->getChallanMSTTRNNO($student); 
        $installment_data = array(
            'TRNNO'   => $TRNNO,
            'TRNDATE' => date('d-M-Y'),
            'INS_TYPE' => $this->input->post('ins_type'),
            'CAMPAIGN_ID' => $this->input->post('CAMPAIGN_ID'),
            'CMPCODE' => $this->session->userdata('cmpcode'),
            'SEGCODE' => $this->session->userdata('campus_id'),
            'STUDENT_ID' => $student,
            'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_LINE_ID'),
            'PAYMENT_MODE' => '1',
            'PAID_BY' => $this->session->userdata('login_id'),
            'REMARKS' => strtoupper($this->input->post('remarks')),
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
                    $amount = $this->input->post('amount'); 
                  }else{
                    $amount = $this->input->post('tuition_amount'); 
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
                    'REMARKS'           => strtoupper($this->input->post('remarks')),
                    'UCODE'             => $this->session->userdata('login_id'),
                    'ACTIVE_FLAG'       => 1,
                );
                $this->school_db->insert('FEE_INSTALLMENT_DTL', $install);          
            }  
        $this->session->set_flashdata('msg', 'Package Successfully Created.');
        redirect(base_url() . 'savvy1/FeeChallan');
    }
    /*setting table start here*/
     public function createGroupChallan(){ 
        $data['title']="Create Group Challan";
        $data['programs']      = $this->Challan_model->getProgramLines();
        $this->load->view('fee_challans/create_group_challan', $data);    
    }  
    public function programStudents(){
        $program = $this->input->post('id');
        $current_date = $this->input->post('first_month');               
        $from_date  = date('01-M-Y', strtotime($current_date)); 
        $date = date('d-M-Y');
        $data['students']   = $this->Challan_model->getStudentsByProgram($program,$from_date);
        print($this->load->view('fee_challans/group_list', $data));

    } 
    public function storeGroupChallan()
    {
        $data          = $this->Challan_model->getAmountByProgram($this->input->post('PROGRAM_LINE_ID'));
        foreach ($data as $row) {
            $FEE_ID           = $row->FEE_ID;
            $TUTION_FEE       = $row->TUTION_FEE;
            $TOTAL_FEE        = $row->TOTAL_FEE;
        }
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
        $due_date = $this->input->post('due_date');
        $student_ids = array_values(array_filter($this->input->post('student_id')));  
       foreach ($student_ids as $student)
            {
             $current_date = $this->input->post('start_date');               
             $from_date  = date('01-M-Y', strtotime('1 month', strtotime($current_date)));   
             $to_date = date('01-M-Y', strtotime(($count).'month', strtotime($current_date)));  
             $TRNNO   = $this->Challan_model->getChallanMSTTRNNO($student);  
             $installment_data = array(
                'TRNNO'   => $TRNNO,
                'TRNDATE' => date('d-M-Y'),
                'INS_TYPE' => $this->input->post('ins_type'),
                'CAMPAIGN_ID' => 1,
                'CMPCODE' => $this->session->userdata('cmpcode'),
                'SEGCODE' => $this->session->userdata('campus_id'),
                'STUDENT_ID' => $student,
                'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_LINE_ID'),
                'PAYMENT_MODE' => '1',
                'PAID_FLAG' => '1',
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
                        $amount = $TOTAL_FEE;
                      }
                      else{
                        $amount = $TUTION_FEE;
                      }
                      $date = $this->input->post('start_date');               
                      $date = date('01-M-Y', strtotime(($i-1).'month', strtotime($date)));        
                      $install = array(
                        'TRNNO'             => $TRNNO,
                        'LINE_NO'           => $this->Challan_model->getNextLineNo($TRNNO),
                        'FEE_MONTH'         => $date,
                        'FEE_ID'            => $FEE_ID,
                        'AMOUNT'            => $amount,
                        'ENT_DATE'          => date('d-M-Y'),
                        'REMARKS'           => '',
                        'UCODE'             => $this->session->userdata('login_id'),
                        'ACTIVE_FLAG'       => 1,
                    );
                    $this->school_db->insert('FEE_INSTALLMENT_DTL', $install);          
                }                 
            }     
        $this->session->set_flashdata('msg', 'Package Successfully Created.');
        redirect(base_url() . 'savvy1/FeeChallan');
    }  
  

}