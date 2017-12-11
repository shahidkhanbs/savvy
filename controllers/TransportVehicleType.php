<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TransportVehicleType extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');
        $this->load->model('TransportVehicleType_model');
    }
    public function index(){
        $data['title']="Transport Vehicle Type";
        $data['stops'] = $this->TransportVehicleType_model->getTransportVehicleType();
        $this->load->view('transport/transport_vehicle_type/index', $data);
    }
    public function store(){
        $data = array(
            'VEH_TYPE_ID'           =>   $this->Savvy_model->getNextId('VEH_TYPE_ID','TRANSPORT_VEHICLE_TYPE','school_db'),
            'VEH_TYPE_NAME'         =>   strtoupper($this->input->post('desc')),
            'VEH_TYPE_SHORT_NAME'   =>   strtoupper($this->input->post('short_desc')),
            'UCODE'                 =>   $this->session->userdata('login_id'),
        );
        $this->TransportVehicleType_model->insertTransportVehicleType($data);
        $data['stops'] = $this->TransportVehicleType_model->getTransportVehicleType();
        print($this->load->view('transport/transport_vehicle_type/transport_vehicle_type_table', $data));
    }
    public function toggle(){
        $stop_id = $this->input->post('id');
        $status =   $this->input->post('status');
        $this->TransportVehicleType_model->changeTransportVehicleType($stop_id,$status);
        $data['stops'] = $this->TransportVehicleType_model->getTransportVehicleType();
        $data['routes'] = $this->TransportVehicleType_model->getTransportVehicleType();
        print($this->load->view('transport/transport_vehicle_type/transport_vehicle_type_table', $data));
    }
    public function edit(){
        $stop_id = $this->input->post('id');
        $data = $this->TransportVehicleType_model->editTransportVehicleType($stop_id);
        foreach($data as $row)
        {
            $output['id']           = $row->VEH_TYPE_ID;
            $output['desc']         = $row->VEH_TYPE_NAME;
            $output['short_desc']   = $row->VEH_TYPE_SHORT_NAME;
        }
        echo json_encode($output);
    }
    public function update(){
        $update = array(
            'VEH_TYPE_NAME'        =>   strtoupper($this->input->post('desc_edit')),
            'VEH_TYPE_SHORT_NAME'  =>   strtoupper($this->input->post('short_desc_edit')),
            'LAST_UPDATE_BY'   =>   $this->session->userdata('login_id'),
        );
        $this->TransportVehicleType_model->updateTransportVehicleType($update,$this->input->post('id'));
        $data['stops'] = $this->TransportVehicleType_model->getTransportVehicleType();
        print($this->load->view('transport/transport_vehicle_type/transport_vehicle_type_table', $data));
    }



}