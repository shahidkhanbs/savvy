<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TransportVehicle extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');
        $this->load->model('TransportVehicle_model');
        $this->load->model('TransportVehicleType_model');
        $this->load->model('TransportRoute_model');
    }
    public function index(){
        $data['title']="Transport Route";
        $data['stops'] = $this->TransportVehicle_model->getTransportVehicle();
        $data['vehicles_type'] = $this->TransportVehicleType_model->getTransportActiveVehicletype();
        $data['routes'] = $this->TransportRoute_model->getTransportActiveRoutes();
        $this->load->view('transport/transport_vehicle/index', $data);
    }
    public function store(){
        $data = array(
            'VEHICLE_ID'        =>   $this->Savvy_model->getNextId('VEHICLE_ID','TRANSPORT_VEHICLE','school_db'),
            'VEH_TYPE_ID'       =>   $this->input->post('veh_type'),
            'VEHICLE_NAME'      =>   strtoupper($this->input->post('veh_name')),
            'VEHICLE_HPOWER'    =>   strtoupper($this->input->post('veh_power')),
            'VEHICLE_NO'        =>   strtoupper($this->input->post('veh_no')),
            'SEAT_CAPACITY'     =>   strtoupper($this->input->post('veh_capacity')),
            'DRIVER_NAME'       =>   strtoupper($this->input->post('veh_driver')),
            'DRIVER_CELL_NO'    =>   strtoupper($this->input->post('veh_mobile')),
            'ROUTE_ID'          =>   $this->input->post('route_id'),
            'CMPCODE'           =>   $this->session->userdata('cmpcode'),
            'SEGCODE'           =>   $this->session->userdata('campus_id'),
            'UCODE'             =>   $this->session->userdata('login_id'),
        );
        $this->TransportVehicle_model->insertTransportVehicle($data);
        $data['stops'] = $this->TransportVehicle_model->getTransportVehicle();
        print($this->load->view('transport/transport_vehicle/transport_vehicle_table', $data));
    }
    public function toggle(){
        $route_id = $this->input->post('id');
        $status =   $this->input->post('status');
        $this->TransportVehicle_model->changeTransportVehicle($route_id,$status);
        $data['stops'] = $this->TransportVehicle_model->getTransportVehicle();
        print($this->load->view('transport/transport_vehicle/transport_vehicle_table', $data));
    }
    public function edit(){
        $stop_id = $this->input->post('id');
        $data = $this->TransportVehicle_model->editTransportVehicle($stop_id);
        foreach($data as $row)
        {
            $output['id']       = $row->VEHICLE_ID;
            $output['type_id']  = $row->VEH_TYPE_ID;
            $output['route_id'] = $row->ROUTE_ID;
            $output['veh_name'] = $row->VEHICLE_NAME;
            $output['veh_no']   = $row->VEHICLE_NO;
            $output['veh_driver'] = $row->DRIVER_NAME;
            $output['driver_phone'] = $row->DRIVER_CELL_NO;
            $output['veh_power'] = $row->VEHICLE_HPOWER;
            $output['veh_capacity'] = $row->SEAT_CAPACITY;
        }
        echo json_encode($output);
    }
    public function update(){
        $update = array(
            'VEH_TYPE_ID'       =>   $this->input->post('veh_type_edit'),
            'ROUTE_ID'          =>   $this->input->post('route_id_edit'),
            'VEHICLE_NAME'      =>   strtoupper($this->input->post('veh_name_edit')),
            'VEHICLE_HPOWER'    =>   strtoupper($this->input->post('veh_power_edit')),
            'VEHICLE_NO'        =>   strtoupper($this->input->post('veh_no_edit')),
            'SEAT_CAPACITY'     =>   strtoupper($this->input->post('veh_capacity_edit')),
            'DRIVER_NAME'       =>   strtoupper($this->input->post('veh_driver_edit')),
            'DRIVER_CELL_NO'    =>   $this->input->post('veh_mobile_edit'),
            'LAST_UPDATE_BY'    =>   $this->session->userdata('login_id'),
        );
        //print_r($update); die;
        $this->TransportVehicle_model->updateTransportVehicle($update,$this->input->post('id'));
        $data['stops'] = $this->TransportVehicle_model->getTransportVehicle();
        print($this->load->view('transport/transport_vehicle/transport_vehicle_table', $data));
    }



}