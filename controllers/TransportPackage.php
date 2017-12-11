<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TransportPackage extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');
        $this->load->model('TransportPackage_model');
        $this->load->model('TransportStop_model');
    }
    public function index(){
        $data['title']      = "Transport Package";
        $data['packages']   = $this->TransportPackage_model->getTransportPackage();
        $data['stops']      = $this->TransportStop_model->getTransportActiveStop();
        $this->load->view('transport/transport_package/index', $data);
    }
    public function store(){
        $data = array(
            'TRNNO'             =>   $this->Savvy_model->getNextId('TRNNO','TRANSPORT_PACKAGE','school_db'),
            'STOP_ID'           =>   $this->input->post('stop_id'),
            'AMOUNT'            =>   $this->input->post('package_amount'),
            'CMPCODE'           =>   $this->session->userdata('cmpcode'),
            'SEGCODE'           =>   $this->session->userdata('campus_id'),
            'UCODE'             =>   $this->session->userdata('login_id'),
        );
        $this->TransportPackage_model->insertTransportPackage($data);
        $data['packages'] = $this->TransportPackage_model->getTransportPackage();
        print($this->load->view('transport/transport_package/transport_package_table', $data));
    }
    public function toggle(){
        $route_id = $this->input->post('id');
        $status =   $this->input->post('status');
        $this->TransportPackage_model->changeTransportPackage($route_id,$status);
        $data['packages'] = $this->TransportPackage_model->getTransportPackage();
        print($this->load->view('transport/transport_package/transport_package_table', $data));
    }
    public function edit(){
        $stop_id = $this->input->post('id');
        $data = $this->TransportPackage_model->editTransportPackage($stop_id);
        foreach($data as $row)
        {
            $output['id']               = $row->TRNNO;
            $output['stop_id']          = $row->STOP_ID;
            $output['package_amount']   = $row->AMOUNT;
        }
        echo json_encode($output);
    }
    public function update(){
        $update = array(
            'STOP_ID'           =>   $this->input->post('stop_id_edit'),
            'AMOUNT'            =>   $this->input->post('package_amount_edit'),
            'LAST_UPDATE_BY'    =>   $this->session->userdata('login_id'),
        );
        $this->TransportPackage_model->updateTransportPackage($update,$this->input->post('id'));
        $data['packages'] = $this->TransportPackage_model->getTransportPackage();
        print($this->load->view('transport/transport_package/transport_package_table', $data));
    }



}