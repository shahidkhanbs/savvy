<?php
class TransportStudentPackage_model extends CI_Model {

    var $table = 'V_STUDENTS';
    var $column_order = array(null, 'STUDENT_ID','FULL_NAME','FATHER_NAME','DOB','EMAIL_ADDRESS','CAMPAIGN_SHORT_NAME','PROGRAM_LINE_SHORT_NAME','MOBILE_NO','TRANSPORT_STOP_ID'); //set column field database for datatable orderable
    var $column_search = array('STUDENT_ID','FULL_NAME','FATHER_NAME','DOB','EMAIL_ADDRESS','CAMPAIGN_SHORT_NAME','PROGRAM_LINE_SHORT_NAME','MOBILE_NO','TRANSPORT_STOP_ID'); //set column field database for datatable searchable
    var $order = array('STUDENT_ID' => 'ASC'); // default order

    function __construct()
    {
        parent::__construct();
        $this->school_db = $this->load->database('school', TRUE);
    }

    function get_students()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->school_db->limit($_POST['length'], $_POST['start']);
        $query = $this->school_db->get();
        //echo $this->school_db->last_query();
        return $query->result();
    }
    private function _get_datatables_query()
    {

        $this->school_db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if(strtoupper($_POST['search']['value'])) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                   // $this->school_db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->school_db->like($item, strtoupper($_POST['search']['value']));
                }
                else
                {
                    $this->school_db->or_like($item, strtoupper($_POST['search']['value']));
                }

                //if(count($this->column_search) - 1 == $i) //last loop
                   // $this->school_db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->school_db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->school_db->order_by(key($order), $order[key($order)]);
        }
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->school_db->get();
        return $query->num_rows('5');
    }

    public function count_all()
    {
        $this->school_db->from($this->table);
        return $this->school_db->count_all_results();
    }

    function getSingleStudent($studnet_id){
        $this->school_db->select("*");
        $this->school_db->from('V_STUDENTS');
        $this->school_db->where("STUDENT_ID",$studnet_id);
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function getstops(){
        $this->school_db->select("*");
        $this->school_db->from('V_TRANSPORT_STOP');
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }

    function getUnverfied(){
        $this->school_db->select("*");
        $this->school_db->from('V_STUDENTS');
        $this->school_db->where("PRINCIPAL_FLAG",'0');
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function getStudentTransport($studnet_id){
        $this->school_db->select("*");
        $this->school_db->from('V_STUDENTS');
        $this->school_db->where("STUDENT_ID",$studnet_id);
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }
    function verifyStudent($data){
        $this->school_db->set('OF_ADMISSION_DISCOUNT', $data['of_admission_discount']);
        $this->school_db->set('OF_MISC_DISCOUNT',$data['of_session_discount']);
        $this->school_db->set('OF_SESSION_DISCOUNT',$data['of_misc_discount']);
        $this->school_db->set('PR_ADMISSION_DISCOUNT',$data['pr_admission_discount']);
        $this->school_db->set('PR_MISC_DISCOUNT',$data['pr_misc_discount']);
        $this->school_db->set('PR_SESSION_DISCOUNT',$data['pr_session_discount']);
        $this->school_db->set('PRINCIPAL_FLAG',1);
        $this->school_db->where('STUDENT_ID', $data['student_id']);
        $this->school_db->update('STUDENTS');
        //echo $this->school_db->last_query(); exit;
        return ($this->school_db->affected_rows() != 1) ? false : true;
    }
    function verifiedStudent(){
        $this->school_db->select("*");
        $this->school_db->from('V_STUDENTS');
        $this->school_db->where("PRINCIPAL_FLAG",'1');
        $result = $this->school_db->get();
        if($result){
            return $result->result_array();
        }
    }

}

