<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TransportStudentPackage extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Savvy_model');
        $this->load->model('TransportPackage_model');
        $this->load->model('TransportStudentPackage_model');
    }
    public function index(){
        $data['title']      = "Transport Package";
        $this->load->view('transport/transport_student_package/index', $data);
    }
    public function ajax_student_list()
    {
        $list = $this->TransportStudentPackage_model->get_students();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $students) {
            if($students->TRANSPORT_STOP_ID){ $status = 'Assigned';} else{ $status = 'Not Assigned';}
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $students->STUDENT_ID;
            $row[] = $students->FULL_NAME;
            $row[] = $students->FATHER_NAME;
            $row[] = $students->MOBILE_NO;
            $row[] = $students->DOB;
            $row[] = $students->EMAIL_ADDRESS;
            $row[] = $students->CAMPAIGN_SHORT_NAME;
            $row[] = $students->PROGRAM_LINE_SHORT_NAME;
            $row[] = $status;
            $row[] = '<a class="btn btn-sm green" href="javascript:void(0)" title="view Student" onclick="view_student('."'".$students->STUDENT_ID."'".')"><i class="fa fa-eye"></i> View</a>
                  <a class="btn btn-sm green" href="javascript:void(0)" title="Assign Vehicle to Student" onclick="assign_vehicle('."'".$students->STUDENT_ID."'".')"><i class="fa fa-plus"></i> Assign</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->TransportStudentPackage_model->count_all(),
            "recordsFiltered" => $this->TransportStudentPackage_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function getSingleStudent(){
        $studnet_id = $this->input->post('id');
        $data['title']     = "Student Package";
        $data['student'] = $this->TransportStudentPackage_model->getSingleStudent($studnet_id);
        $data['stops'] = $this->TransportStudentPackage_model->getstops($studnet_id);
        $this->load->view('transport/transport_student_package/student_info', $data);
    }

    public function store(){
        $data = array(
            'TRNNO'             =>   $this->College_model->getNextId('TRNNO','TRANSPORT_PACKAGE','school'),
            'STOP_ID'           =>   $this->input->post('stop_id'),
            'AMOUNT'            =>   $this->input->post('package_amount'),
            'CMPCODE'           =>   $this->session->userdata('cmpcode'),
            'SEGCODE'           =>   $this->session->userdata('campus_id'),
            'UCODE'             =>   $this->session->userdata('login_id'),
        );
        $this->TransportPackage_model->insertTransportPackage($data);
        $data['packages'] = $this->TransportPackage_model->getTransportPackage();
        print($this->load->view('transport/transport_student_package/transport_student_package_table', $data));
    }
    public function toggle(){
        $route_id = $this->input->post('id');
        $status =   $this->input->post('status');
        $this->TransportPackage_model->changeTransportPackage($route_id,$status);
        $data['packages'] = $this->TransportPackage_model->getTransportPackage();
        print($this->load->view('transport/transport_student_package/transport_student_package_table', $data));
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
        print($this->load->view('transport/transport_student_package/transport_student_package_table', $data));
    }



}