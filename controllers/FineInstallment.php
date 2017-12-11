<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FineInstallment extends MX_Controller
{
    public function __construct() {
        parent::__construct();   
        $this->load->model('FineInstallment_model');    
        $this->load->model('Savvy_model');    
    }
    public function unPaidIns(){ 
        $data['title']="Fine Installments";
        $data['fine_installments'] =$this->FineInstallment_model->getUnpaidInstallments();
        $this->load->view('fine_installments/unpaid_fine_installments', $data);    
    }
    public function paidIns(){ 
        $data['title']="Fine Installments";
        $data['fine_installments'] =$this->FineInstallment_model->getPaidInstallments();
        $this->load->view('fine_installments/paid_fine_installments', $data);    
    }
    public function totalIns(){ 
        $data['title']="Fine Installments";
        $data['fine_installments'] =$this->FineInstallment_model->getAllInstallments();
        $this->load->view('fine_installments/total_fine_installments', $data);    
    }
    public function createFineInstallment()
    {
        $data['title']="Create Fine Installment"; 
        $data['students'] =$this->FineInstallment_model->getStudents();
        $data['fines'] =$this->FineInstallment_model->getFines();
        $this->load->view('fine_installments/create_fine_installment', $data); 
    }
    public function storeFineInstallment()
    {
       $data = array(
        'TRNNO' => $this->Savvy_model->getNextId('TRNNO','FINE_INSTALLMENT','school_db'), 
        'STUDENT_ID' => $this->input->post('STUDENT_ID'), 
        'PROGRAM_LINE_ID' => $this->input->post('PROGRAM_LINE_ID'), 
        'FINE_ID' => $this->input->post('FINE_ID'), 
        'DUE_DATE' => format_date($this->input->post('DUE_DATE')), 
        'TRNDATE' => date('d-M-Y'), 
        'AMOUNT' => $this->input->post('FINE_FEE'), 
        'DISCOUNT' => 0,  
        'REMARKS' => strtoupper($this->input->post('remarks')),        
        );  
        $result  =$this->FineInstallment_model->insertfineInstallment($data);
        if ($result ==1)
        {            
            $this->session->set_flashdata('msg', 'Fine Installment Successfully Inserted.');
            redirect(base_url() . 'savvy1/FineInstallment/unPaidIns');
        }
            $this->session->set_flashdata('msg', 'Fine Installment Insertion Failed.');
            redirect(base_url() . 'savvy1/FineInstallment/createFineInstallment/');       
    }
    public function payFineInstallment()
    {
        $update = array(
        'PAID_FLAG' => 1, 
        'PAID_DATE' => format_date($this->input->post('PAID_DATE')),        
        );
        $this->FineInstallment_model->updateInstallment($update,$this->input->post('id'));
        $this->session->set_flashdata('msg', 'Fine Installment Paid Successfully.');
        redirect(base_url() . 'savvy1/FineInstallment');      
    }
   
  

}