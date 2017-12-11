<?php

class Account_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('savvy', TRUE); 
        $this->db2 = $this->load->database('ums', TRUE); 

    }
    function getNextId($pk,$table) {
        $this->db->select("nvl(max(nvl($pk,0)),0)+1 as NEXTVAL");
        $this->db->from($table);
        $query = $this->db->get();
        // echo $this->db->last_query(); die;
        return  $query->row();
    }
    function getPrincipalStudentPackages($campus) {
        $this->db->select('sfp.*,forms.first_name,forms.last_name');
        $this->db->from('student_fee_package_admission sfp');
        $this->db->join('students', 'sfp.student_id = students.student_id', 'INNER');
        $this->db->join('forms', 'forms.form_id = students.form_id', 'INNER');
        $this->db->where('sfp.final_package_id IS NULL');
        $this->db->where('sfp.package_status', '1');
        $this->db->where('students.campus_id', $campus);
        $query = $this->db->get();
        // echo $this->db->last_query(); die;
        return $query->result_array();
        //echo $this->db->last_query(); die;
    }

    function getStudentPackages($student_ids) {
        $query = $this->db->query("SELECT student_final_package.*, students.program_id, program.program_code,
       program.program_id
  FROM student_final_package INNER JOIN students
       ON student_final_package.student_id = students.student_id
       INNER JOIN program ON program.program_id = students.program_id
 WHERE students.student_id IN ('$student_ids')");
        /*  $this->db->select('student_final_package.*,students.program_id,program.program_code,program.program_id');
          $this->db->from('student_final_package');
          $this->db->join('students', 'student_final_package.student_id = students.student_id', 'INNER');
          $this->db->join('program', 'program.program_id = students.program_id', 'INNER');
          $this->db->where_in('students.student_id', $student_ids);
          //  $this->db->where('student_final_package.package_status', '1');
          $query = $this->db->get(); */
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function saveStudentPackages($value, $temp_package_id) {
        $id = $this->getNextId('STUDENT_FINAL_PAKAGE_ID','STUDENT_FINAL_PACKAGE');
        $this->db->set('STUDENT_FINAL_PAKAGE_ID',$id->NEXTVAL);
        $query = $this->db->insert('student_final_package', $value);

        $id = $id->NEXTVAL;

        if ($id) {
            $log_data = array(
                'operator_id' => $this->session->userdata('login_id'),
                'reference_id' => $id,
                'refrence_type' => 'Package',
                'student_id' => $value['student_id'],
                'date_time' => date("Y-m-d H:i:s"),
                'action' => 'Add'
            );

            //$query = $this->db->insert('account_log', $log_data);

            // Update Temp Package Table For Confirm Package Id against student id
            $this->db->where('student_id', $value['student_id']);
            $query = $this->db->update('student_fee_package_admission', array('final_package_id' => $id));

            $log_data = array(
                'operator_id' => $this->session->userdata('login_id'),
                'reference_id' => $temp_package_id,
                'refrence_type' => 'Temp Package',
                'student_id' => $value['student_id'],
                'date_time' => date("Y-m-d H:i:s"),
                'action' => 'Update'
            );

            $query = $this->db->insert('account_log', $log_data);


            //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            return True;
        } else {
            return false;
        }
    }
    function getProgramStudentCounter($program,$campus) {

        $query = $this->db->query(" select count(*) as total_students from students"
            . "  where roll_no like '$program%' and campus_id = $campus");
        return $query->result_array();
    }

    function getAccountantPackagescollege($campus_id, $compaign_id) {
      /*  $query = $this->db->query("select distinct student_final_package.*,forms.first_name,forms.last_name,forms.form_no,installments.installment_id
from student_final_package 
INNER JOIN students ON students.student_id = student_final_package.student_id
INNER JOIN program ON students.program_id = program.program_id
INNER JOIN forms ON forms.form_id = students.form_id 
LEFT JOIN installments ON installments.package_id = student_final_package.student_final_pakage_id 
where students.campus_id = '$campus_id' AND students.campaign_id  = '$compaign_id'  AND students.left_status!='1'"); */
        //echo $this->db->last_query(); die;
        $query = $this->db->query("SELECT DISTINCT sfp.*, frm.first_name, frm.last_name,
                frm.form_no, check_installment
           FROM forms frm, students st, program prg, student_final_package  sfp, (select  a.STUDENT_ID check_installment, a.PACKAGE_ID from installments a) ins              
            where  frm.form_id    = st.form_id
             and   st.program_id  = prg.program_id
             and   st.student_id  = sfp.student_id
             and   sfp.student_final_pakage_id  = ins.package_id (+)
             and   st.campus_id = '$campus_id'
             AND   st.campaign_id = '$compaign_id'
             AND   st.left_status != '1'");
      //  echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function  getAccountantPackagesuniversity($campus_id, $compaign_id) {
        $query = $this->db->query("select distinct student_final_package.*,forms.first_name,forms.last_name,forms.form_no,installments.installment_id 
from student_final_package 
INNER JOIN students ON students.student_id = student_final_package.student_id
INNER JOIN program ON students.program_id = program.program_id
INNER JOIN forms ON forms.form_id = students.form_id 
LEFT JOIN installments ON installments.package_id = student_final_package.student_final_pakage_id 
where students.campus_id = $campus_id AND students.campaign_id  = $compaign_id AND accountant_status = 1  AND students.left_status!='1' AND  program.program_level='university'
group by students.student_id");
        //  echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function addInstallments($insallment, $student_id) {
        $id = $this->getNextId('INSTALLMENT_ID','INSTALLMENTS');
        $this->db->set('INSTALLMENT_ID',$id->NEXTVAL);
        $query = $this->db->insert('installments', $insallment);
        //   echo $this->db->last_query(); die;
        if ($query) {
            $log_data = array(
                'operator_id' => $this->session->userdata('login_id'),
                'reference_id' => $query,
                'refrence_type' => 'Installment',
                'student_id' => $student_id,
                'date_time' => date("Y-m-d H:i:s"),
                'action' => 'Add'
            );

            //$query = $this->db->insert('account_log', $log_data);
        }
        return $query;
    }
    function viewInstallments($student_id) {
        $query = $this->db->query(" select student_final_package.*,installments.*,students.student_id,forms.first_name,forms.last_name,students.program_id from installments"
            . " inner join student_final_package ON installments.package_id = student_final_package.student_final_pakage_id"
            . " inner join students on students.student_id = student_final_package.student_id"
            . " inner join forms on forms.form_id = students.form_id"
            . " where student_final_package.student_id  = $student_id AND students.left_status!='1' ");
//echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getInstallmentDetail($installment_id) {
        $query = $this->db->query(" select installments.* ,student_final_package.student_id from installments"
            . " inner join student_final_package ON installments.package_id = student_final_package.student_final_pakage_id"
            . " inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id"
            . " where installments.installment_id  = $installment_id AND students.left_status!='1' ");
        echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function setInstallmentDetail($installment_id, $installment) {
        $this->db->where('installment_id', $installment_id);
        return $this->db->update('installments', $installment);
        //echo $this->db->last_query(); die;
    }
    function getStudentAccountDetail($roll_no) {
        $query = $this->db->query(" select installments.*,students.part,students.roll_no,students.student_id,forms.first_name,forms.last_name ,program_name,father_name from installments"
            . " inner join student_final_package ON installments.package_id = student_final_package.student_final_pakage_id"
            . " inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id"
            . " inner join students on students.student_id = student_final_package.student_id"
            . " inner join forms on forms.form_id = students.form_id"
            . " inner join program on students.program_id = program.program_id"
            . " where students.form_no  = '$roll_no' AND students.left_status!='1' ");
//echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function postInstallment($installment, $installment_id,$student_id) {
        $this->db->where('installment_id', $installment_id);
        $responce = $this->db->update('installments', $installment);

        if ($responce) {
            $log_data = array(
                'operator_id' => $this->session->userdata('login_id'),
                'reference_id' => $installment_id,
                'refrence_type' => 'Installment',
                'student_id' => $student_id,
                'date_time' => date("d-M-Y"),
                'action' => 'Post'
            );

            $id = $this->getNextId('LOG_ID','ACCOUNT_LOG');
            $this->db->set('LOG_ID',$id->NEXTVAL);
            $query = $this->db->insert('account_log', $log_data);
        }
        //    echo $this->db->last_query(); die;
        return $query;

    }

    function postfine($installment, $installment_id, $student_id){
        $this->db->where('fine_id', $installment_id);
        $responce = $this->db->update('students_fine', $installment);

        if ($responce) {
            $log_data = array(
                'operator_id' => $this->session->userdata('login_id'),
                'reference_id' => $installment_id,
                'refrence_type' => 'fine Paid',
                'student_id' => $student_id,
                'date_time' => date("Y-m-d H:i:s"),
                'action' => 'Post'
            );

            $query = $this->db->insert('account_log', $log_data);
        }
        //    echo $this->db->last_query(); die;
        return $query;
    }
    function getVerifiedInfo($campus) {
        $query = $this->db->query("select 
    sum(decode(forms.status,'0', 1, 0)) un_verified,
    sum(decode(forms.status,'1', 1, 0)) verified
from 
forms INNER join students on students.form_id =forms.form_id
where students.campus_id='$campus' ");
//echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getTotalStudents($campus){
        $query = $this->db->query(" select count(*) as total_studets
   from students where students.campus_id='$campus' ");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getCampusProgramStudentCounter($program_code,$campaign, $campus){
        $query = $this->db->query("select   count(students.student_id) as studentcount from students
INNER JOIN forms ON forms.form_id =students.form_id
where  students.program_id='$program_code' AND students.roll_no='0' AND students.campus_id = '$campus' AND students.campaign_id='$campaign' AND forms.status=1 AND students.section='0'
 AND students.campaign_id=1 AND forms.status=1 
                
                order by student_id");
        // echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function getprogramIDS($ref_id){
        $query = $this->db->query("Select GROUP_CONCAT(program.program_id SEPARATOR ',') as program_ids from program where ref_id = $ref_id");
        // echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function getCampusProgramStudentCounterCombine($program_ids,$campaign, $campus){
        $query = $this->db->query("select   count(students.student_id) as studentcount from students
INNER JOIN forms ON forms.form_id =students.form_id
where  students.program_id IN($program_ids) AND students.roll_no='0' AND students.campus_id = '$campus' AND students.campaign_id='$campaign' AND forms.status=1 AND students.section='0'
 AND students.campaign_id=1 AND forms.status=1 
                
                order by student_id");
        // echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function  getCampusProgramStudentCombine($program_id,$campaign, $campus_id,$section,$total_count,$part){
        $query = $this->db->query("select  students.student_id,forms.form_no,forms.first_name,forms.last_name,forms.father_name,program.program_name,program.program_code,forms.previous_obtained_marks,forms.previous_total_marks,((forms.previous_obtained_marks/forms.previous_total_marks)*100) as percentage from students
INNER JOIN forms ON forms.form_id =students.form_id
INNER JOIN program ON forms.program_id = program.program_id 
where  students.program_id IN($program_id) AND students.roll_no='0'  AND students.part= '$part' AND students.campus_id = '$campus_id' AND students.campaign_id='$campaign' AND forms.status=1 AND students.section='0'
AND forms.status=1 AND forms.left_status!=1
order by percentage DESC 
LIMIT $total_count");
        // echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function assignProgramSection($section_detail){
        $query = $this->db->insert('program_sections', $section_detail);
        return $this->db->insert_id();
    }
    function  getCampusProgramStudent($program_id,$campaign, $campus_id,$section,$total_count){
        /* $query = $this->db->query("select  students.student_id,forms.form_no,forms.first_name,forms.last_name,forms.father_name,program.program_name,program.program_code,forms.previous_obtained_marks,forms.previous_total_marks,((forms.previous_obtained_marks/forms.previous_total_marks)*100) as percentage from students
 INNER JOIN forms ON forms.form_id =students.form_id
 INNER JOIN program ON forms.program_id = program.program_id
 where  students.program_id='$program_id' AND students.roll_no='0'  AND students.campus_id = '$campus_id' AND students.campaign_id='$campaign' AND forms.status=1 AND students.section='0'
 AND forms.status='1' AND forms.left_status!='1'
 order by percentage,forms.first_name DESC
 LIMIT '$total_count'"); */
        $query = $this->db->query("SELECT   students.student_id, forms.form_no, forms.first_name,
         forms.last_name, forms.father_name, program.program_name,
         program.program_code, forms.previous_obtained_marks,
         forms.previous_total_marks,
         ( (forms.previous_obtained_marks / decode(forms.previous_total_marks,0,1) ) * 100 )  percentage
    FROM students INNER JOIN forms ON forms.form_id = students.form_id
         INNER JOIN program ON forms.program_id = program.program_id
   WHERE students.program_id = '$program_id'
     AND students.roll_no = '0'
     AND students.campus_id = '$campus_id'
     AND students.campaign_id = '$campaign'
     AND forms.status = 1
     AND students.section = '0'
     AND forms.status = '1'
     AND forms.left_status != '1'
ORDER BY percentage, forms.first_name DESC");
        // echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function getCampusProgramStudentmanual($campus_id,$program){



        $query = $this->db->query("select students.student_id,forms.form_no,forms.first_name,forms.last_name,forms.father_name,program.program_name,program.program_code,forms.previous_obtained_marks,forms.previous_total_marks 
from students
INNER JOIN forms ON forms.form_id =students.form_id 
INNER JOIN program ON forms.program_id = program.program_id 
where students.program_id='$program' AND students.roll_no='0'
AND students.campus_id ='$campus_id'  AND 
forms.status='1' AND students.section='0'");
      //    echo $this->db->last_query();
        return $query->result_array();
    }
    function get_section_by_id($section){
        $query = $this->db->get_where('sections', array('section_id' => $section));
        return $query->result_array();
    }
    function get_all_sections(){
        $this->db->select('*');
        $this->db->from('sections');
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $data = $query->result_array();
            return $data;
        }
    }
    function getprogramsecttion($program_code,$campus){

        $query = $this->db->query('select students.section,program_sections.p_section_id,program_sections.section_id,program_sections.p_title from students
INNER JOIN forms ON forms.form_id =students.form_id
INNER JOIN program_sections on program_sections.p_section_id = students.section
where 
 FIND_IN_SET("'.$program_code.'", program_sections.program_ids ) AND students.roll_no = 0 AND program_sections.campus_id = "'.$campus.'" AND students.campaign_id = "'.$campaign.'" AND forms.status=1 
group by students.section');


        echo $this->db->last_query(); die;
        return $query->result_array();
    }

    function get_all_campus_sections($program,$campus_id){
        $query = $this->db->query("select sctn.*  from 
sections sctn, (select distinct a.SECTION, a.campus_id, a.PROGRAM_ID from  students a ) st 
where st.section  = sctn.section_id  
 and st.campus_id ='$campus_id' AND st.program_id ='$program' order by sctn.title");
       //  echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function get_transfer_campus_sections($compaing,$program,$campus_id){
        $query = $this->db->query("select p_section_id,p_title from program_sections where campus_id ='$campus_id' AND campaign_id ='$compaing' AND  FIND_IN_SET($program, program_sections.program_ids ) order by p_title");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function campus_wise_sections($compaing,$campus_id){
        $query = $this->db->query("select * from program_sections where campus_id ='$campus_id' AND campaign_id ='$compaing' order by p_title");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function get_p_section($p_id){
        $query = $this->db->query("select * from program_sections where p_section_id = $p_id");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getSectionlast($campus_id, $section,$program){
        /* $query = $this->db->query("select students.roll_no from students
 where students.program_id='$program' and students.campus_id ='$campus_id' and students.section='$section' order by RIGHT(students.roll_no, 3) DESC LIMIT 1");
        */
        $query = $this->db->query("
select last_roll_no, roll_no from (
SELECT max(to_number(SUBSTR(ROLL_NO, -3))) LAST_ROLL_NO, s.roll_no
    FROM students s
   WHERE s.program_id = '$program'
     AND s.campus_id = '$campus_id'
     AND s.section = '$section'
     GROUP BY roll_no) a
     where a.last_roll_no = (     
     select max(last_roll_no) from (
     SELECT max(to_number(SUBSTR(ROLL_NO, -3))) LAST_ROLL_NO
    FROM students s
   WHERE s.program_id = '$program'
     AND s.campus_id = '$campus_id'
     AND s.section = '$section'
     GROUP BY roll_no)     
     )");
        //echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function assignSection($assign_student,$Std_id){


        $this->db->where(array('student_id'=>$Std_id));
        $query = $this->db->update('students',$assign_student);
        //echo $this->db->last_query(); die;
        return $query;
        //$this->db->update_batch('mytable', $data, 'where_key');
    }
    function getassignSection($campus_id,$section,$program_code){
        /* $query = $this->db->query("select forms.form_no,forms.mobile,forms.father_number,forms.father_name,students.roll_no,forms.first_name,forms.last_name,program.program_title,sections.title
 from students
 INNER JOIN forms on forms.form_id = students.form_id
 INNER JOIN program on program.program_id = students.program_id
 INNER JOIN sections ON sections.section_id = students.section
 where students.campus_id ='$campus_id' and students.section='$section' AND program.program_id='$program_code' order by RIGHT(students.roll_no, 3) ASC ");
        */
        $query = $this->db->query("SELECT  substr(students.roll_no,3) stRoll_no, forms.form_no, forms.mobile, forms.father_number, forms.father_name,
         students.roll_no, forms.first_name, forms.last_name,
         program.program_title, sections.title
    FROM students INNER JOIN forms ON forms.form_id = students.form_id
         INNER JOIN program ON program.program_id = students.program_id
         INNER JOIN sections ON sections.section_id = students.section
   WHERE students.campus_id = '$campus_id'
     AND students.section = '$section'
     AND program.program_id = '$program_code'
ORDER BY 1 ASC");
        // echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function updateSection($roll_no,$section){
        $this->db->where(array('roll_no'=>$roll_no));
        $query = $this->db->update('students', array('section' => $section));
        return $query;
    }
    function  get_secttion_m($program,$campus){
        $query = $this->db->query("select sctn.*  from 
sections sctn, (select distinct a.SECTION, a.campus_id, a.PROGRAM_ID from  students a ) st 
where st.section  = sctn.section_id  
 and st.campus_id ='$campus' AND st.program_id ='$program' order by sctn.title");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function campusPakageReport($campus_id,$start,$end,$prgtype){
        $query = $this->db->query(" select forms.first_name,last_name,section,program_name,student_final_package.session_total_package,student_final_package.session_fee_discount,gender,dob
   from student_final_package 
   inner join students on students.student_id = student_final_package.student_id
 inner join forms on forms.form_id = students.form_id
 inner join program on program.program_id = students.program_id
inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id

where students.campus_id = $campus_id AND students.left_status!='1' AND program.program_category='$prgtype'"
            . " AND DATE_FORMAT(student_final_package.created_date, '%Y-%m-%d') BETWEEN '$start' AND '$end'"
            . "order by program.program_id ");

        //  echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function programPakageReport($program_id,$campus_id){
        $query = $this->db->query(" select forms.first_name,last_name,section,program_name,student_final_package.session_total_package,student_final_package.session_fee_discount,gender,dob
   from student_final_package 
   inner join students on students.student_id = student_final_package.student_id
   inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id
 inner join forms on forms.form_id = students.form_id
 inner join program on program.program_id = students.program_id
where students.campus_id = $campus_id  AND students.left_status!='1' AND students.program_id = $program_id order by program.program_id ");

        //  echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function studentprogramReport($program_id,$campus_id){
        $query = $this->db->query(" select forms.form_no,forms.first_name,last_name,forms.gender,forms.father_name,forms.mobile,present_address ,forms.previous_obtained_marks,forms.previous_total_marks
                                     from students
                                  inner join forms on forms.form_id = students.form_id
  inner join student_final_package on students.student_id = student_final_package.student_id                                  
where students.program_id = $program_id and students.campus_id = $campus_id and forms.status=1");

        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getSection($program, $campus_id){
        $query = $this->db->query(" select sections.*
                                  from students 
inner join sections on sections.section_id = students.section                                   
where program_id = $program and campus_id = $campus_id");

        return $query->result_array();
    }
    function studentSectionReport($program, $campus_id,$section){

        $query = $this->db->query(" select forms.first_name,last_name,forms.father_name,forms.mobile,present_address 
                                  from forms 
                                  inner join students on students.form_id = forms.form_id
                                   where forms.program_id = $program and students.campus_id = $campus_id and students.section = $section");
        //  echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function programInstallmentReport($student_id){
        $query = $this->db->query(" select students.student_id,forms.first_name,last_name,forms.father_name,installments.payable_amount,installments.paid,student_final_package.session_total_package,student_final_package.session_fee_discount,fine,installments.installment_id
                                  from forms 
                                  inner join students on students.form_id = forms.form_id
                                  inner join student_final_package on student_final_package.student_id = students.student_id
                                  inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id
                                  inner join installments on installments.package_id = student_final_package.student_final_pakage_id
                                  where students.student_id = $student_id order by students.student_id,installments.due_date");
        //  echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function sectionInstallmentReport($campus_id, $section){
        $query = $this->db->query("select distinct students.student_id,forms.form_no,forms.first_name,forms.last_name,student_final_package.session_total_package,installments.fine,program_sections.p_title,students.roll_no
FROM students 
INNER JOIN forms ON forms.form_id = students.form_id
INNER JOIN student_final_package ON students.student_id = student_final_package.student_id 
INNER JOIN installments ON installments.package_id = student_final_package.student_final_pakage_id 
INNER JOIN program_sections on program_sections.p_section_id = students.section
where students.section  = $section AND students.campus_id = $campus_id  AND students.left_status!='1'");
        //  echo $this->db->last_query(); die;
        return $query->result_array();
    }

    function postInstallmentReport($program, $campus_id, $start,$end){
        $query = $this->db->query("   select forms.first_name,last_name,forms.father_name,installments.payable_amount,installments.paid,installments.post_date
                                  from forms 
                                  inner join students on students.form_id = forms.form_id
                                  inner join student_final_package on student_final_package.student_id = students.student_id
                                  inner join installments on installments.package_id = student_final_package.student_final_pakage_id
                                   where forms.program_id = $program and students.campus_id = $campus_id  and paid=1 "
            . " AND DATE_FORMAT(installments.post_date, '%Y-%m-%d') BETWEEN '$start' AND '$end'"
            . " order by students.student_id,installments.post_date");
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function postInstallmentSectionReport( $campus_id, $start,$end,$section){
        $query = $this->db->query("select  program_sections.p_title,students.roll_no, students.form_no ,forms.first_name,last_name,forms.father_name,installments.payable_amount,installments.paid,installments.post_date
                                  from forms 
                                  INNER JOIN students on students.form_id = forms.form_id
                                  INNER JOIN student_final_package on student_final_package.student_id = students.student_id
                                  INNER JOIN installments on installments.package_id = student_final_package.student_final_pakage_id
                                  INNER JOIN program_sections on program_sections.p_section_id = students.section
                                  where  students.campus_id = $campus_id AND students.left_status!='1'  AND paid=1 and students.section = $section"
            . " AND DATE_FORMAT(installments.post_date, '%Y-%m-%d') BETWEEN '$start' AND '$end'"
            . " order by students.student_id,installments.due_date");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    /*************************** start section challen Generate print campus wise **************************/
    function view_section_students($program,$section,$campus_id){
        $query = $this->db->query("select count(students.student_id) as total_students, LISTAGG(students.student_id, ',') WITHIN GROUP(ORDER BY students.student_id) as student_idz 
from students where students.section ='$section' AND students.campus_id='$campus_id' AND students.program_id='$program'  AND students.left_status!='1'
");

        // echo $this->db->last_query(); die;
        return $query->result_array();
    }

    function generateSectionChallan($section_all_student,$duedate){
        $query = $this->db->query("select student_monthly_fee.* ,student_final_package.student_final_pakage_id
from students 
INNER JOIN student_monthly_fee on student_monthly_fee.student_id = students.student_id
INNER JOIN student_final_package on student_final_package.student_id = students.student_id
where students.student_id IN ($section_all_student)  AND student_monthly_fee.status='1' AND student_monthly_fee.program_id=students.program_id
");

        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function insert_create_installment($installment){
        $query = $this->db->insert_batch('installments', $installment);
        // return $id->NEXTVAL;
        // return $this->db->insert_id();
    }
    function getSectionChallan($section_all_student, $start, $end){

        $query = $this->db->query("select students.student_id,program.program_level,students.roll_no,forms.first_name,last_name, forms.father_name,installments.*,banks.*,program_sections.p_title,campuses.campus_name, forms.form_no,student_final_package.session_total_package,student_final_package.admission_fee,program.program_name 
from students
inner join forms on students.form_id = forms.form_id 
inner join student_final_package on student_final_package.student_id = students.student_id 
inner join installments on installments.package_id = student_final_package.student_final_pakage_id 
LEFT join program_sections on program_sections.p_section_id = students.section 
LEFT JOIN program ON program.program_id = forms.program_id 
left join banks on banks.campus_id = students.campus_id 
inner join campuses on campuses.campus_id = students.campus_id 
where 
installments.paid=0 AND students.left_status!='1' AND (installments.due_date BETWEEN '$start' AND '$end') AND
installments.student_id IN ($section_all_student)
Order by students.roll_no");
        //  echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getSingleChallan($student_id,$installment_id){


        $query = $this->db->query("select students.student_id,program.program_level,students.roll_no,forms.first_name,last_name, forms.father_name,installments.*,banks.*,campuses.campus_name, forms.form_no,student_final_package.admission_fee,program.program_name,sections.title
from students 
inner join forms on students.form_id = forms.form_id 
inner join student_final_package on student_final_package.student_id = students.student_id
inner join installments on installments.package_id = student_final_package.student_final_pakage_id 
LEFT JOIN sections on sections.section_id = students.section
LEFT JOIN program ON program.program_id = forms.program_id 
left join banks on banks.campus_id = students.campus_id 
inner join campuses on campuses.campus_id = students.campus_id 
where students.student_id ='$student_id' and installments.installment_id ='$installment_id' "
            . " order by students.student_id,installments.due_date");
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getSinglefine($student_id, $installment_id){
        $query = $this->db->query("select students_fine.*,students.student_id,program.program_level,students.roll_no,forms.first_name,last_name, forms.father_name,program_sections.p_title,campuses.campus_name, forms.form_no,program.program_name 
from  students_fine 
INNER JOIN  students on students.student_id = students_fine.student_id
inner join forms on students.form_id = forms.form_id 
LEFT join program_sections on program_sections.p_section_id = students.section 
LEFT JOIN program ON program.program_id = forms.program_id 
inner join campuses on campuses.campus_id = students.campus_id 
where students_fine.fine_id='$installment_id' AND students_fine.student_id='$student_id'");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    /***************************** End Section challen print campus wise***************************/
    function viewCampaign(){
        $this->db->select('*');
        $this->db->from('campaigns');
        $this->db->where('campaigns.campaign_status = 1');
        $query = $this->db->get();
        //echo $this->db->last_query(); die;

        if ( $query->num_rows() > 0 )
        {
            $data = $query->result_array();
            return $data;
        }
    }
    function getAllprograms(){
        $query = $this->db->query("SELECT program.* FROM program ORDER BY program.program_name ASC");
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getAllprogramsMorning(){
        $this->db->select('program.*');
        $this->db->from('program');
        $this->db->where('program_type','Morning');
        $this->db->order_by('program.program_name', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getAlldes(){

        $query = $this->db->query("Select program.*, GROUP_CONCAT(program.program_id SEPARATOR ',') as program_ids from program
               where program.program_type = 'Morning'
                group by program.ref_id
                order by program.program_name ASC ");
//echo $this->db->last_query(); die;
        return $query->result_array();


    }
    function getPrincipalStudentPackagesVarification($campus,$student_id){

        $this->db->select('sfp.*,forms.first_name,program.program_code,program.program_id');
        $this->db->from('student_fee_package_admission sfp');
        $this->db->join('students', 'sfp.student_id = students.student_id', 'INNER');
        $this->db->join('forms', 'forms.form_id = students.form_id', 'INNER');
        $this->db->join('program', 'program.program_id = students.program_id', 'INNER');
        $this->db->where('sfp.final_package_id IS NULL');
        $this->db->where('sfp.package_status', '1');
        $this->db->where('students.campus_id', $campus);
        $this->db->where('students.student_id', $student_id);
        $query = $this->db->get();
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getStudentChallanDetail($roll_no){
        $query = $this->db->query(" select installments.*,students.roll_no,students.student_id,forms.form_no,forms.first_name,forms.last_name ,program_name,father_name from installments"
            . " inner join student_final_package ON installments.package_id = student_final_package.student_final_pakage_id"
            . " inner join students on students.student_id = student_final_package.student_id"
            . " inner join forms on forms.form_id = students.form_id"
            . " inner join program on students.program_id = program.program_id"
            . " where students.student_id  = $roll_no ");
//echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getStudentFineDetail($student_id){
        $query = $this->db->query("select * from students_fine where student_id ='$student_id' ");
//echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getAllInstallmentsCampusWise($campus){


        $query = $this->db->query(" select installments.*,students.part,students.roll_no,sections.title,students.student_id,forms.first_name,forms.last_name ,program_name,father_name from installments"
            . " inner join student_final_package ON installments.package_id = student_final_package.student_final_pakage_id"
            . " inner join students on students.student_id = student_final_package.student_id"
            . " inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id"
            . " inner join forms on forms.form_id = students.form_id"
            . " inner join program on students.program_id = program.program_id"
            . " inner join sections on section_id = students.section"
            . " where students.campus_id  = $campus ");


        // echo $this->db->last_query(); die;

        return $query->result_array();
    }

    function getPrintChallans($campus_id, $program_id, $section, $start_date, $end_date){

        $query = $this->db->query("select forms.*,installments.*,students.*,program.program_title,sections.title,campuses.campus_name
from installments 
INNER JOIN students ON students.student_id = installments.student_id 
INNER JOIN program ON program.program_id = students.program_id 
INNER JOIN sections ON sections.section_id = students.section 
INNER JOIN forms ON forms.form_id = students.form_id 
INNER JOIN campuses on campuses.campus_id = students.campus_id
where students.campus_id='$campus_id' AND students.section='$section' AND students.program_id='$program_id' AND students.left_status!='1' AND installments.paid!='1' AND 
installments.due_date BETWEEN '$start_date' AND '$end_date' order by students.roll_no");


        //   echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function getAllStudents($campus){
        $query = $this->db->query(" select students.part,forms.first_name,forms.last_name ,forms.form_no,program_name,father_name from students"
            . " inner join forms on forms.form_id = students.form_id"
            . " inner join program on students.program_id = program.program_id"
            . " where students.campus_id  = $campus ");

        return $query->result_array();
    }
    function getStudentRollNo($student_ids){
        $query = $this->db->query(" select students.form_no from students"
            . " where students.student_id  = $student_ids ");

        return $query->result_array();
    }
    function getStudentInfo($search,$key,$campus){

        $query = " select students.student_id,students.part,forms.first_name,forms.last_name ,forms.form_no,program_name,father_name,forms.form_no,students.roll_no from students"
            . " inner join forms on forms.form_id = students.form_id"
            . " inner join program on students.program_id = program.program_id"
            . " where students.campus_id='$campus' AND students.left_status!='1'  AND  ";

        if($key=="roll_no")
            $query = $query ."students.roll_no  = '$search'";

        if($key=="form_no")
            $query = $query ."students.form_no  = '$search'";
        if($key=="name")
            $query = $query ."( forms.first_name like'%$search%' OR last_name like '%$search%')";

        $query = $this->db->query($query);
     //echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getStudentInfoUni($search,$key,$campus){
        $query = " select students.student_id,students.part,forms.first_name,forms.last_name ,forms.form_no,program_name,father_name,forms.form_no,students.roll_no from students"
            . " inner join forms on forms.form_id = students.form_id"
            . " inner join program on students.program_id = program.program_id"
            . " where students.campus_id='$campus' AND students.left_status!='1'  AND   ";

        if($key=="roll_no")
            $query = $query ."students.roll_no  = '$search'";

        if($key=="form_no")
            $query = $query ."students.form_no  = '$search'";
        if($key=="name")
            $query = $query ."( forms.first_name like'%$search%' OR last_name like '%$search%')";

        $query = $this->db->query($query);
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }

    function deleteUnpaidInstallments($installment_id, $part) {
        $query = $this->db->query("DELETE installments
                              FROM installments
                            where installments.installment_id='$installment_id'
                              AND installments.paid = '0'
                              AND installments.part = '$part'
            ");
        //  echo $this->db->last_query(); die;
        $query;
        if ($query) {
            $log_data = array(
                'operator_id' => $this->session->userdata('login_id'),
                'reference_id' => $query,
                'refrence_type' => 'Installment',
                'student_id' => '',
                'date_time' => date("Y-m-d H:i:s"),
                'action' => 'Delete'
            );

            $query = $this->db->insert('account_log', $log_data);
        }
        return $query;
    }
    function reviseInstallments($installment_data) {
        $query = $this->db->insert('installments', $installment_data);
        return   $installment_id = $this->db->insert_id();
    }
    function reviseInstallments_update($installment_data,$installment_id,$student_id){
        $this->db->where(array('installment_id'=>$installment_id));
        $query = $this->db->update('installments', $installment_data);
        return $query;
        $log_data = array(
            'operator_id' => $this->session->userdata('login_id'),
            'reference_id' => $installment_id,
            'refrence_type' => 'Installment',
            'student_id' => $student_id,
            'date_time' => date("Y-m-d H:i:s"),
            'action' => 'Rewise'
        );

        $query = $this->db->insert('account_log', $log_data);
    }
    function updateStudentInfo($student_id,$data){


        $query = $this->db->query("UPDATE forms 
    SET status = 1 
    where form_id in ( select f.form_id from forms f, students s where f.FORM_ID = s.FORM_ID and s.student_id = '$student_id' )");
        //echo $this->db->last_query(); die;
        return $query;

    }
    function postInstallmentCampusReport($Part,$campaign_id,$type,$campus_id, $start, $end){


        $program_type = $type == 'All' ? '' : "AND program.program_category='$type'";

        $query = $this->db->query("select students.roll_no,students.form_no, forms.first_name,last_name,forms.father_name,installments.payable_amount,installments.paid,installments.post_date,installments.fine,installments.discount
 from forms
 inner join students on students.form_id = forms.form_id 
inner join student_final_package on student_final_package.student_id = students.student_id 
inner join installments on installments.package_id = student_final_package.student_final_pakage_id 
INNER JOIN program on program.program_id = students.program_id
where students.campaign_id='$campaign_id' AND students.part='$Part'  AND students.campus_id = $campus_id  AND paid='1' $program_type  AND DATE_FORMAT(installments.post_date, '%Y-%m-%d') BETWEEN '$start' AND '$end'
 order by students.student_id,installments.due_date");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function fineCampusReport($Part,$campaign_id,$type,$campus_id, $start, $end){


        $program_type = $type == 'All' ? '' : "AND program.program_category='$type'";

        $query = $this->db->query("select students.roll_no,students.form_no, forms.first_name,last_name,forms.father_name,students_fine.*
from students_fine
inner join students on students.student_id = students_fine.student_id
INNER JOIN forms on students.form_id = forms.form_id
INNER JOIN program on program.program_id = students.program_id 
where students.campaign_id='$campaign_id' AND students.part='$Part'  AND students.campus_id = '$campus_id'  $program_type 
 order by students.student_id");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getStudentSmsInfo($student_id){
        $query = " select students.student_id,forms.first_name,forms.last_name,father_name,father_number,mobile from students"
            . " inner join forms on forms.form_id = students.form_id"
            . " where  students.student_id = $student_id";
        $query = $this->db->query($query);
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function programStudentsInstallment($program, $campus_id){

        $query = $this->db->query("select distinct students.student_id,forms.form_no,forms.first_name,forms.last_name,student_final_package.session_total_package,installments.fine,program.program_title,students.roll_no
     from students 
inner join forms on forms.form_id = students.form_id
inner join student_final_package on students.student_id = student_final_package.student_id 
inner join installments on installments.package_id = student_final_package.student_final_pakage_id
INNER JOIN program ON program.program_id = students.program_id
where students.program_id = $program AND students.campus_id = $campus_id  AND students.left_status!='1'");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function updateSessionPackage($package_id, $total){
        $query = $this->db->query("  update student_final_package set ");
        // echo $this->db->last_query(); die;
        return $query->result_array();

    }

    function getpackage($student_id,$package_id){
        $query = $this->db->query("   select student_final_package.*
                                  from student_final_package 
                                  inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id
                                  where student_id = $student_id and student_final_pakage_id=$package_id");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function deletepackage($package_id){
        $query = $this->db->query("DELETE FROM student_final_package WHERE student_final_pakage_id  = $package_id");
        //echo $this->db->last_query(); die;
        $query;
        if ($query) {
            $log_data = array(
                'operator_id' => $this->session->userdata('login_id'),
                'reference_id' => $package_id,
                'refrence_type' => 'Package',
                'student_id' => '',
                'date_time' => date("Y-m-d H:i:s"),
                'action' => 'Revise'
            );

            $query = $this->db->insert('account_log', $log_data);
        }
        return $query;
    }
    function addRevisePackage($ins_data){
        $query = $this->db->insert('revise_student_final_package', $ins_data);
        //  echo $this->db->last_query(); die;
        return $query;
    }
    function updateAdmissionPackage($package_id){
        $query = $this->db->query("update student_fee_package_admission set final_package_id=NULL WHERE final_package_id  = $package_id");
        return $query;
    }
    function getFinalPackgae($package_id){
        $this->db->select('sfp.*,forms.first_name,program.program_code,program.program_id');
        $this->db->from('student_final_package sfp');

        $this->db->join('students', 'sfp.student_id = students.student_id', 'INNER');
        $this->db->join('student_fee_package_admission', 'student_fee_package_admission.final_package_id=sfp.student_final_pakage_id', 'INNER');
        $this->db->join('forms', 'forms.form_id = students.form_id', 'INNER');
        $this->db->join('program', 'program.program_id = students.program_id', 'INNER');
        $this->db->where('sfp.student_final_pakage_id', $package_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function updateStudentAdmissionPackages($data,$sap){
        $this->db->where(array('final_package_id'=>$sap));
        $query = $this->db->update('student_fee_package_admission', $data);
        //echo $this->db->last_query(); die;
        return $query;
    }
    function unPaidInstallmentReport($program, $campus_id, $start,$end){

        $query = $this->db->query("select forms.first_name,last_name,forms.father_name,installments.payable_amount,installments.paid,installments.due_date,program.program_title from forms"
            . " INNER JOIN students on students.form_id = forms.form_id "
            . " INNER JOIN student_final_package on student_final_package.student_id = students.student_id "
            . " INNER JOIN program ON program.program_id = students.program_id "
            . " INNER JOIN installments on installments.package_id = student_final_package.student_final_pakage_id "
            . " where students.program_id = $program  AND students.left_status!='1'  and students.campus_id = $campus_id and paid=0 AND DATE_FORMAT(installments.due_date, '%Y-%m-%d') BETWEEN '$start' AND '$end'"
            . " order by students.student_id,installments.due_date");

        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function unpaidInstallmentCampusReport($campus_id,$start,$end){
        $query = $this->db->query("select students.roll_no,forms.first_name,last_name,forms.father_name,installments.payable_amount,installments.paid,installments.due_date
                                  from forms 
                                  inner join students on students.form_id = forms.form_id
                                  inner join student_final_package on student_final_package.student_id = students.student_id
                                  inner join installments on installments.package_id = student_final_package.student_final_pakage_id
                                  INNER JOIN program on program.program_id = students.program_id
                                  where students.campus_id = $campus_id  and paid=0  AND students.left_status!='1'"
            . " AND installments.due_date BETWEEN '$start' AND '$end'"
            . " order by students.student_id,installments.due_date");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getpaidInstallment($student_id){

        $query = $this->db->query(" select SUM(installments.payable_amount) as installment_paid
                                  from installments 
                                  inner join student_final_package on installments.package_id = student_final_package.student_final_pakage_id
                                
                                  where student_final_package.student_id = '$student_id' and installments.paid='1'  ");
        //echo $this->db->last_query(); die;
        return $query->result_array();

    }
    function getAllcampuses(){
        $query = $this->db->query(" select * from campuses where campus_status =1 and campus_id<>3");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function saletoday($campus_id,$start,$end){

        //$where = 'admisssion_inquiry.date BETWEEN "'.$start.'" AND "'.$end.'"';

        $this->db->select('count(admission_sale_prospectus.product_id) as counttoday,product.product_name ');
        $this->db->select('sum(product.product_price) as totalprice');
        $this->db->from('admisssion_inquiry');
        $this->db->join('admission_sale_prospectus', 'admission_sale_prospectus.inquiry_id = admisssion_inquiry.inquiry_id','INNER');
        $this->db->join('product', 'product.product_id = admission_sale_prospectus.product_id','INNER');
        $this->db->join('campaigns comp', 'admisssion_inquiry.campaign_id = comp.campaign_id','INNER');
        $this->db->where('admisssion_inquiry.date >=', $start);
        $this->db->where('admisssion_inquiry.date <=', $end);
        $this->db->where(array('admisssion_inquiry.campus_id' => $campus_id ));
        $this->db->group_by('admission_sale_prospectus.product_id');
        $this->db->order_by('admission_sale_prospectus.product_id');
        $product_today = $this->db->get();
        //  echo $this->db->last_query(); die;
        return $product_today->result_array();
    }
    function saletotal($campus_id){
        $this->db->select('count(admission_sale_prospectus.product_id) as counttotal,product.product_name ');
        $this->db->from('admisssion_inquiry');
        $this->db->join('admission_sale_prospectus', 'admission_sale_prospectus.inquiry_id = admisssion_inquiry.inquiry_id','INNER');
        $this->db->join('product', 'product.product_id = admission_sale_prospectus.product_id','INNER');
        $this->db->where(array('admisssion_inquiry.campus_id' => $campus_id));
        $this->db->group_by('admission_sale_prospectus.product_id');
        $product_total= $this->db->get();
        return $product_total->result_array();
    }
    function todayinquiry($campus_id){
        $this->db->select('count(inq.inquiry_id) as inquirycounttoday');
        $this->db->from('admisssion_inquiry inq');
        $this->db->join('program', 'inq.program_id = program.program_id','INNER');
        $this->db->where(array('inq.date >='=> date('y-m-d'),'inq.campus_id'=> $campus_id));
        $inquery_today = $this->db->get();
        return $inquery_today->result_array();


    }
    function totalInquiry($campus_id,$start,$end){
        $this->db->select('count(inq.inquiry_id) as inquirycounttotal');
        $this->db->from('admisssion_inquiry inq');
        $this->db->join('campaigns comp', 'inq.campaign_id = comp.campaign_id','INNER');
        $this->db->join('program', 'inq.program_id = program.program_id','INNER');
        $this->db->where(array('comp.campaign_status' => '1','inq.campus_id'=> $campus_id));
        $this->db->where('inq.date >=', $start);
        $this->db->where('inq.date <=', $end);
        $inquery_total = $this->db->get();
        //echo $this->db->last_query(); die;
        return $inquery_total->result_array();

    }
    function totalCompleteForm($campus_id,$start,$end){
//        $this->db->select('count(inq.inquiry_id) as inquirycounttotal');
//        $this->db->from('admisssion_inquiry inq');
//        $this->db->join('campaigns comp', 'inq.campaign_id = comp.campaign_id','INNER');
//        $this->db->where(array('comp.campaign_status' => '1','inq.campus_id'=> $campus_id));
//        $this->db->where('inq.date >=', $start);
//         $this->db->where('inq.date <=', $end);
//         $this->db->where('inq.status', '1');
//        $inquery_total = $this->db->get();
//       // echo $this->db->last_query(); die;
//        return $inquery_total->result_array();

        $this->db->select('count(forms.form_id) as inquirycounttotal');
        $this->db->from('forms');
        $this->db->join('program', 'program.program_id = forms.program_id','left');
        $this->db->where(array('students.campus_id' => $campus_id));
        $this->db->where('forms.form_submit_date >=', $start);
        $this->db->where('forms.form_submit_date <=', $end);
        $query = $this->db->get();
        // echo $this->db->last_query(); die;
        return $query->result_array();


    }
    function campusTotalPackage($campus_id,$start,$end){

        $query = $this->db->query("SELECT count(distinct student_final_package.student_final_pakage_id) as total_package_counter,sum(student_final_package.session_total_package) as total_package_amount
                                  from forms 
                                  inner join students on students.form_id = forms.form_id
                                  inner join student_final_package on student_final_package.student_id = students.student_id
                                  inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id

                                  where students.campus_id = $campus_id  "
            . " AND DATE_FORMAT(student_final_package.created_date, '%Y-%m-%d') BETWEEN '$start' AND '$end'"
            . " order by students.student_id");
        //   echo $this->db->last_query(); die;
        return $query->result_array();

    }
    function campuspaidPackage($campus_id,$start,$end){


        $query = $this->db->query(" SELECT sum(installments.payable_amount) as total_package_amount
                                  from forms 
                                  inner join students on students.form_id = forms.form_id
                                  inner join student_final_package on student_final_package.student_id = students.student_id
                                  inner join installments on installments.package_id = student_final_package.student_final_pakage_id
                                  inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id
                                  where students.campus_id = $campus_id  and paid=1"
            . " AND DATE_FORMAT(installments.post_date, '%Y-%m-%d') BETWEEN '$start' AND '$end'"
            . " order by students.student_id,installments.due_date");

        // echo $this->db->last_query(); die;
        return $query->result_array();

    }
    function campusUnpaidPackage($campus_id,$start,$end){

        $query = $this->db->query("SELECT sum(installments.payable_amount) as total_package_amount
                                  from forms 
                                  inner join students on students.form_id = forms.form_id
                                  inner join student_final_package on student_final_package.student_id = students.student_id
                                  inner join installments on installments.package_id = student_final_package.student_final_pakage_id
                                  where students.campus_id = $campus_id  and paid=0"
            . " AND DATE_FORMAT(student_final_package.created_date, '%Y-%m-%d') BETWEEN '$start' AND '$end'"
            . " order by students.student_id,installments.due_date");
        // echo $this->db->last_query(); die;
        return $query->result_array();

    }
    function campusStudentsInstallment($program='', $campus_id,$start,$end){
        $query = "  select distinct students.student_id ,forms.form_no,forms.first_name,forms.last_name,student_final_package.session_total_package from student_final_package
inner join students on students.student_id = student_final_package.student_id 
inner join forms on forms.form_id = students.form_id
inner join student_fee_package_admission on student_fee_package_admission.final_package_id=student_final_package.student_final_pakage_id
                                  where students.campus_id = $campus_id "
            . " AND DATE_FORMAT(student_final_package.created_date, '%Y-%m-%d') BETWEEN '$start' AND '$end'";
        if($program!='')
            $query = $query .' and forms.program_id = '.$program;

        $query = $query .' order by students.student_id ';

        $query = $this->db->query($query);
        //  echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function studentpaidInstallments($student_id){


        $query = $this->db->query(" SELECT sum(installments.payable_amount) as total_package_amount
                                  from student_final_package 
                                  inner join students on student_final_package.student_id = students.student_id
                                  inner join installments on installments.package_id = student_final_package.student_final_pakage_id
                                  where students.student_id=$student_id  and paid=1"
        );

        //echo $this->db->last_query(); die;
        return $query->result_array();

    }
    function getStudentChallan($student_id){

        $query = $this->db->query(" SELECT *
                                  from student_final_package 
                                  where student_id=$student_id"
        );

        //echo $this->db->last_query(); die;
        return $query->result_array();

    }
    function studentcampusReport($campus_id){
        $query = $this->db->query(" select students.roll_no,forms.form_no,forms.first_name,last_name,forms.gender,forms.father_name,forms.mobile,forms.present_address ,forms.previous_obtained_marks,forms.previous_total_marks
                                from students
                                  inner join forms on forms.form_id = students.form_id
  inner join student_final_package on students.student_id = student_final_package.student_id                                   
where  students.campus_id = $campus_id and forms.status=1 and students.roll_no!='0'");

        //echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function getStudentInstallment($student_id){

        $query = $this->db->query(" SELECT student_id
                                  from student_final_package 
                                   inner join installments on installments.package_id = student_final_package.student_final_pakage_id
                                  where student_final_package.student_id=$student_id"
        );

        //echo $this->db->last_query(); die;
        return $query->result_array();

    }
    function get_section_student_transfer($campus_id,$section_id){
        $query = $this->db->query("select forms.form_no,forms.mobile,forms.father_number,students.roll_no,forms.first_name,forms.last_name,program_sections.p_title from students 
inner join forms on forms.form_id = students.form_id 

inner join program on program.program_id = students.program_id 
INNER JOIN program_sections on program_sections.p_section_id = students.section
INNER JOIN sections ON sections.section_id = program_sections.section_id
where  students.campus_id = '$campus_id' and students.section='$section_id' order by RIGHT(students.roll_no, 3) ASC ");
        //echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function get_paid_amount_student($student_id){
        $query = $this->db->query("select sum(payable_amount) as total_paid from installments where student_id =$student_id AND paid=1");
        // echo $this->db->last_query(); die;

        return $query->result_array();
    }
    function get_all_student_campus($campus_id){
        $query = $this->db->query("select students.student_id,students.roll_no,forms.form_no,forms.first_name,last_name,forms.gender,forms.father_name,forms.mobile,program.program_title,students.left_status,students.struckoff_status
from students 
INNER JOIN forms on forms.form_id = students.form_id 
LEFT JOIN program ON program.program_id = students.program_id                                 
where  students.campus_id = '$campus_id'  AND forms.status='1'");

        //echo $this->db->last_query(); die;
        if ( $query->num_rows() > 0 )
        {
            $data = $query->result_array();
            return $data;
        }else{
            return '0';
        }
    }
    function left_student_add($student_id){
        $this->db->where('student_id',$student_id);
        $query = $this->db->update('students', array('left_status' => '1'));
        //echo $this->db->last_query(); die;
        return $query;
    }
    function struckoff_student_add($student_id){
        $this->db->where('student_id',$student_id);
        $query = $this->db->update('students', array('struckoff_status' => '1'));
        //echo $this->db->last_query(); die;
        return $query;
    }
    function fine_struckoff_student($data_fine){
        $query = $this->db->insert('students_fine', $data_fine);
        return $this->db->insert_id();
    }
    function reactive_struckoff_student($student_id){
        $this->db->where('student_id',$student_id);
        $query = $this->db->update('students', array('struckoff_status' => '0'));
        return $query;
    }
    function unpaidInstallmentsectionReport($section,$campus_id, $start, $end){
        $query = $this->db->query("select students.roll_no,forms.first_name,last_name,forms.father_name,installments.payable_amount,installments.paid,installments.due_date,program_sections.p_title
 from forms 
inner join students on students.form_id = forms.form_id 
INNER JOIN program_sections on program_sections.p_section_id = students.section
inner join student_final_package on student_final_package.student_id = students.student_id
inner join installments on installments.package_id = student_final_package.student_final_pakage_id 
                                  where students.campus_id = $campus_id AND students.left_status!='1'  AND paid=0 AND students.section='$section'"
            . " AND installments.due_date BETWEEN '$start' AND '$end'"
            . " order by students.student_id,installments.due_date");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }

    function print_login_q(){
        $query = $this->db->query("select user_logins.*,campuses.campus_name from user_logins
INNER JOIN campuses on campuses.campus_id = user_logins.Campus_id");
        return $query->result_array();
    }
   
    function get_sidebar(){
        $app_code = $this->session->userdata('app_code');
        $ucode = $this->session->userdata('login_id');
        $business_id = $this->session->userdata('business_id');
        $query = $this->db2->query("select -1, level, mnu_desc, mnu_place, mnu_parent, mnu_id , MNU_FILE_PHP from menu M
        where  app_code = '$app_code' and EXISTS 
        (select ROLE_ID  from v_rights where app_code = '$app_code' and business_id = '$business_id' AND mnu_id= M.MNU_ID and role_id in 
        (select distinct rcode from USERS_ROLES where ucode = '$ucode' and active = 1))      
        connect by prior mnu_place = mnu_parent 
        start with mnu_parent is null order siblings by mnu_order");
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function get_childone_sidebar($MNU_PLACE){
        $app_code = $this->session->userdata('app_code');
        $ucode = $this->session->userdata('login_id');
        $business_id = $this->session->userdata('business_id');
        $query = $this->db2->query("select MNU_ID, MNU_DESC,MNU_PARENT, MNU_PLACE, MNU_FILE_PHP, MNU_ICON_PHP from menu
   where mnu_parent ='$MNU_PLACE' and app_code = '$app_code' and mnu_id in (select distinct mnu_id from v_rights where app_code = '$app_code' and business_id = '$business_id' and role_id in (select distinct rcode from USERS_ROLES where ucode = '$ucode' and active = 1)) order by MNU_ID");
        // echo $this->db->last_query(); die;
        return $query->result_array();
    }
}
