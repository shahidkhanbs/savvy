<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TransportStop extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');
        $this->load->model('TransportStop_model');
        $this->load->model('TransportRoute_model');
    }
    public function index(){
        $data['title']="TransportStop";
        $data['stops'] = $this->TransportStop_model->getTransportStops();
        $data['routes'] = $this->TransportRoute_model->getTransportActiveRoutes();
        $this->load->view('transport/transport_stop/index', $data);
    }
    public function store(){
        $data = array(
            'STOP_ID'           =>   $this->Savvy_model->getNextId('STOP_ID','TRANSPORT_STOP','school_db'),
            'STOP_NAME'         =>   strtoupper($this->input->post('desc')),
            'STOP_SHORT_NAME'   =>   strtoupper($this->input->post('short_desc')),
            'KM_FROM_CAMPUS'    =>   $this->input->post('km'),
            'ROUTE_ID'          =>   $this->input->post('route'),
            'CMPCODE'           =>   $this->session->userdata('cmpcode'),
            'SEGCODE'           =>   $this->session->userdata('campus_id'),
            'UCODE'             =>   $this->session->userdata('login_id'),
       );
       $this->TransportStop_model->insertTransportStop($data);
        $data['stops'] = $this->TransportStop_model->getTransportStops();
       print($this->load->view('transport/transport_stop/transport_stop_table', $data));
    }
    public function toggle(){
        $stop_id = $this->input->post('id');
        $status =   $this->input->post('status');
        $this->TransportStop_model->changeTransportStop($stop_id,$status);
        $data['stops'] = $this->TransportStop_model->getTransportStops();
        $data['routes'] = $this->TransportRoute_model->getTransportActiveRoutes();
       print($this->load->view('transport/transport_stop/transport_stop_table', $data));
    }
    public function edit(){
           $stop_id = $this->input->post('id');
           $data = $this->TransportStop_model->editTransportStop($stop_id);
           foreach($data as $row)
           {
                $output['id']           = $row->STOP_ID;
                $output['desc']         = $row->STOP_NAME;
                $output['short_desc']   = $row->STOP_SHORT_NAME;
                $output['km']           = $row->KM_FROM_CAMPUS;
                $output['route_id']     = $row->ROUTE_ID;
           }
           echo json_encode($output);
    }
    public function update(){
        $update = array(
                 'STOP_NAME'        =>   strtoupper($this->input->post('desc_edit')),
                 'STOP_SHORT_NAME'  =>   strtoupper($this->input->post('short_desc_edit')),
                 'KM_FROM_CAMPUS'   =>   $this->input->post('km_edit'),
                 'ROUTE_ID'         =>   $this->input->post('route_edit'),
                 'LAST_UPDATE_BY'   =>   $this->session->userdata('login_id'),
         );
        $this->TransportStop_model->updateTransportStop($update,$this->input->post('id'));
        $data['stops'] = $this->TransportStop_model->getTransportStops();
        print($this->load->view('transport/transport_stop/transport_stop_table', $data));
    }



}