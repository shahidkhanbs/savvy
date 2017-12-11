<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TransportRoute extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');
        $this->load->model('TransportRoute_model');
    }
    public function index(){
        $data['title']="Transport Route";
        $data['stops'] = $this->TransportRoute_model->getTransportRoute();
        $this->load->view('transport/transport_route/index', $data);
    }
    public function store(){
        $data = array(
            'ROUTE_ID' =>   $this->Savvy_model->getNextId('ROUTE_ID','TRANSPORT_ROUTE','school_db'),
            'ROUTE_NAME' => strtoupper($this->input->post('desc')),
            'ROUTE_SHORT_NAME' =>   strtoupper($this->input->post('short_desc')),
            'KM_FROM_CAMPUS' =>   $this->input->post('km'),
            'CMPCODE' =>  $this->session->userdata('cmpcode'),
            'SEGCODE' =>  $this->session->userdata('campus_id'),
            'UCODE' =>  $this->session->userdata('login_id'),
        );
        $this->TransportRoute_model->insertTransportRoute($data);
        $data['stops'] = $this->TransportRoute_model->getTransportRoute();
        print($this->load->view('transport/transport_route/transport_route_table', $data));
    }
    public function toggle(){
        $route_id = $this->input->post('id');
        $status =   $this->input->post('status');
        $this->TransportRoute_model->changeTransportRoute($route_id,$status);
        $data['stops'] = $this->TransportRoute_model->getTransportRoute();
        print($this->load->view('transport/transport_route/transport_route_table', $data));
    }
    public function edit(){
        $stop_id = $this->input->post('id');
        $data = $this->TransportRoute_model->editTransportRoute($stop_id);
        foreach($data as $row)
        {
            $output['id'] = $row->ROUTE_ID;
            $output['desc'] = $row->ROUTE_NAME;
            $output['short_desc'] = $row->ROUTE_SHORT_NAME;
            $output['km'] = $row->KM_FROM_CAMPUS;
        }
        echo json_encode($output);
    }
    public function update(){
        $update = array(
            'ROUTE_NAME'        => $this->input->post('desc_edit'),
            'ROUTE_SHORT_NAME'  =>   $this->input->post('short_desc_edit'),
            'KM_FROM_CAMPUS'    =>   $this->input->post('km_edit'),
            'LAST_UPDATE_BY'    => $this->session->userdata('login_id'),
        );
        $this->TransportRoute_model->updateTransportRoute($update,$this->input->post('id'));
        $data['stops'] = $this->TransportRoute_model->getTransportRoute();
        print($this->load->view('transport/transport_route/transport_route_table', $data));
    }



}