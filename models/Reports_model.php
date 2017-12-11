<?php

class Reports_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->savvy = $this->load->database('savvy', TRUE); //This is the new group I have created
        $this->ums = $this->load->database('ums', TRUE); //This is the new group For UMS Login I have created

    }
    function getsegments(){
        $ucode =  $this->session->userdata('login_id');
        $query = $this->savvy->query("SELECT DISTINCT A.SEGCODE,C.SEGNAME FROM V_RIGHTS A , CMPDTL C WHERE A.SEGCODE=C.SEGCODE AND A.UCODE='$ucode' AND C.CMPCODE= '8' UNION ALL SELECT 0,'ALL' FROM DUAL ORDER BY SEGCODE ASC");
        return $query->result_array();
    }
    function getprogram(){
        $query = $this->savvy->query("SELECT DISTINCT A.PROGRAM_ID,  A.PROGRAM_NAME FROM PROGRAM A UNION ALL SELECT 0,'ALL' FROM DUAL ORDER BY PROGRAM_ID ASC");
        return $query->result_array();
    }
    function get_campus_strength($campuses,$programs,$gender)

    {
 
     $where = array();
        if($campuses!=0){$where[] = "st.CAMPUS_ID ='". $campuses."'";}
        if($programs!=0){$where[] = "st.PROGRAM_ID ='". $programs."'";}
        if($gender!=''){$where[] = "st.GENDER ='". $gender."'";}
        if ( sizeof($where) > 0 ) {
            $sql = implode(' AND ', $where);
          $query = $this->savvy->query("SELECT  st.CAMPUS_ID, st.CAMPUS_NAME, st.PROGRAM_ID, st.PROGRAM_NAME, st.GENDER, count(st.STUDENT_ID) TOTAL_STUDENTS from v_students st
                                    where st.LEFT_STATUS <> 1
                                    and $sql
                                    group by st.CAMPUS_ID, st.CAMPUS_NAME, st.PROGRAM_ID, st.PROGRAM_NAME, st.GENDER
                                    ORDER BY st.CAMPUS_ID");

      }
      else{
        $query = $this->savvy->query("SELECT  st.CAMPUS_ID, st.CAMPUS_NAME, st.PROGRAM_ID, st.PROGRAM_NAME, st.GENDER, count(st.STUDENT_ID) TOTAL_STUDENTS from v_students st
                                    where st.LEFT_STATUS <> 1
                                    group by st.CAMPUS_ID, st.CAMPUS_NAME, st.PROGRAM_ID, st.PROGRAM_NAME, st.GENDER
                                    ORDER BY st.CAMPUS_ID");
      }
      return $query->result_array();
      
    }


}
