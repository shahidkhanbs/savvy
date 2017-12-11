<?= $this->load->view('commons/header') ?>
<?= $this->load->view('commons/headHtml') ?>
<style type="text/css">
   .help-block-error{
   color: red;
   }
</style>
<div class="page-content-wrapper">
<div class="page-content">
   <div class="page-bar">
      <ul class="page-breadcrumb">
         <li>
            <a href="<?= base_url() ?>savvy1/Dashboard">Home</a>
            <i class="fa fa-circle"></i>
         </li>
         <li>
            <a href="<?= base_url() ?>savvy1/Inquiry">INQUIRY</a>
         </li>
      </ul>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="portlet box light">
            <div class="portlet-title">
               <div class="caption font-dark">
                  <i class="icon-list font-dark"></i>
                  <span class="caption-subject bold uppercase"> Edit INQUIRY to Admission Form</span>
               </div>
            </div>
            <?php if($this->session->flashdata('msg')){ ?>
            <div class="alert alert-danger">
               <button class="close" data-dismiss="alert"></button>
               <strong> Alert </strong> <?php echo $this->session->flashdata('msg');  ?>
            </div>
            <?php } ?>
            <?php if($this->session->flashdata('msg_success')){ ?>
            <div class="alert alert-success">
               <button class="close" data-dismiss="alert"></button>
               <strong> Success! </strong> <?php echo $this->session->flashdata('msg_success');  ?>
            </div>
            <?php } ?>
            <div class="portlet-body">
               <div class="portlet-body form">
                  <form action="<?= base_url() ?>savvy1/Inquiry/InsertAdmissionForm"  class="horizontal-form" method="post">
                     <input type="hidden" name="TRNNO" value="<?= $inquiry['0']['TRNNO'] ?>" >
                     <div class="alert alert-danger display-hide"></div>
                        <h3 class="form-section"><b>Personal Info</b></h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>First Name</b><span class="required">*</span></label>
                              <input type="text" class="form-control" name="FIRST_NAME" id="FIRST_NAME" value="<?= $inquiry['0']['FIRST_NAME'] ?>"  placeholder="Enter First Name"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Last Name</b></label>
                              <input type="text" class="form-control" name="LAST_NAME" id="LAST_NAME" value="<?= $inquiry['0']['LAST_NAME'] ?>"  placeholder="Enter Last Name">
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Gender</b><span class="required">*</span></label>
                              <div class="form-group">
                                 <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                    <input type="radio" name="GENDER" id="GENDER" value="M" <?= ($inquiry['0']['GENDER'] == 'M')? 'checked': '' ?> > Male
                                    <span></span>
                                    </label>
                                    <label class="mt-radio">
                                    <input type="radio" name="GENDER" id="GENDER" value="F" <?= ($inquiry['0']['GENDER'] == 'F')? 'checked': '' ?>> Female
                                    <span></span>
                                    </label>                              
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Date of Birth</b><span class="required">*</span></label>
                              <input type="text" class="form-control date date-picker" id="DOB" name="DOB" value="<?= $inquiry['0']['DOB'] ?>" readonly   placeholder="dd-mm-yyyy" required>
                           </div>
                        </div>
                        <div class="row">
                           
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Inquiry Type</b><span class="required">*</span></label>
                              <div class="form-group">
                                 <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                    <input type="radio" name="INQ_TYPE" id="INQ_TYPE" value="1"  <?= ($inquiry['0']['INQ_TYPE'] == '1')? 'checked': '' ?> > Physical
                                    <span></span>
                                    </label>
                                    <label class="mt-radio">
                                    <input type="radio" name="INQ_TYPE" id="INQ_TYPE" value="2" <?= ($inquiry['0']['INQ_TYPE'] =='2')?'checked':''?>> Telephonic
                                    <span></span>
                                    </label>                                                             
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Religion</b><span class="required">*</span></label>
                              <select class="form-control" id="RELIGION_ID" name="RELIGION_ID" required>
                                 <option value="">Select Religion</option>
                                 <?php if($religions)
                                    foreach ($religions as $religion) {                                               
                                    ?>
                                 <option <?= ($inquiry['0']['RELIGION_ID'] == $religion['RELIGION_ID'])? 'selected': '' ?>  value="<?= $religion['RELIGION_ID'] ?>"><?= $religion['RELIGION_DESC'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Reference</b></label>
                              <select class="form-control" id="REFERENCE_ID" name="REFERENCE_ID">
                                 <option value="">Select Reference</option>
                                 <?php if($references)
                                    foreach ($references as $reference) {                                               
                                    ?>
                                 <option <?= ($inquiry['0']['REFERENCE_ID'] == $reference['REFERENCE_ID'])? 'selected': '' ?> value="<?= $reference['REFERENCE_ID'] ?>"><?= $reference['REFERENCE_SOURCE'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Reference</b></label>
                              <input type="text" class="form-control" id="CMP_REFERENCE" value="<?= $inquiry['0']['CMP_REFERENCE'] ?>"  name="CMP_REFERENCE">
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Reference Detail</b></label>
                              <textarea class="form-control" name="CMP_REFERENCE_DETAIL" id="CMP_REFERENCE_DETAIL"><?= $inquiry['0']['CMP_REFERENCE_DETAIL'] ?></textarea>
                           </div>
                        </div>
                        <h3 class="form-section"><b>Location/Address Info</b></h3>
                        <div class="row">                           
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Location</b></label>
                              <select class="form-control select2" data-placeholder="Select Location" id="LOCATION_ID" name="LOCATION_ID">
                                 <option value="">Select Location</option>
                                 <?php if($locations)
                                    foreach ($locations as $location) {                                               
                                    ?>
                                 <option  value="<?= $location['LOCATION_ID'] ?>"><?= $location['LOCATION_DESC'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                            <div class="col-md-4 mb-3">
                              <label class="control-label"><b>Present Address</b></label>
                              <textarea class="form-control" name="PRESENT_ADDRESS" id="PRESENT_ADDRESS"><?= $inquiry['0']['PRESENT_ADDRESS'] ?></textarea>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label class="control-label"><b>Permanent Address</b></label>
                              <textarea class="form-control" name="PERMANENT_ADDRESS" id="PERMANENT_ADDRESS"><?= $inquiry['0']['PERMANENT_ADDRESS'] ?></textarea>
                           </div>
                        </div>
                        <br>                       
                        <h3 class="form-section"><b>Father / Guardian Info</b></h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Father Name</b></label>
                              <input type="text" class="form-control" name="FATHER_NAME" id="FATHER_NAME" value="<?= $inquiry['0']['FATHER_NAME'] ?>"  placeholder="Enter Father Name">
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Father CNIC</b></label>
                              <input type="text" class="form-control" name="FATHER_CNIC" id="FATHER_CNIC" value="<?= $inquiry['0']['FATHER_CNIC'] ?>"  placeholder="Enter Father CNIC"  >
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Father Mobile Number</b></label>
                              <input type="text" class="form-control" name="FATHER_MOBILE_NO" id="FATHER_MOBILE_NO" value="<?= $inquiry['0']['FATHER_MOBILE_NO'] ?>"  placeholder="Enter Father Mobile">
                           </div>
                        </div>
                        <h3 class="form-section"><b>Mother Info</b></h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Mother Name</b><span class="required">*</span></label>
                              <input type="text" class="form-control" name="MOTHER_NAME" id="MOTHER_NAME" value="<?= $inquiry['0']['MOTHER_NAME'] ?>"  placeholder="Enter Mother Name"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Mother CNIC</b><span class="required">*</span></label>
                              <input type="text" class="form-control" name="MOTHER_CNIC" id="MOTHER_CNIC" value="<?= $inquiry['0']['MOTHER_CNIC'] ?>"  placeholder="Enter Mother CNIC"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Mother Mobile Number</b><span class="required">*</span></label>
                              <input type="text" class="form-control" name="MOTHER_MOBILE_NO" id="MOTHER_MOBILE_NO" value="<?= $inquiry['0']['MOTHER_MOBILE_NO'] ?>"  placeholder="Enter Mother Mobile"  required>
                           </div>
                        </div>
                        <h3 class="form-section"><b>Academic Info</b></h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Qualification</b></label>
                              <input type="text" class="form-control" name="QUALIFICATION" id="QUALIFICATION"  placeholder="Enter Qualification">
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Previous Institute</b></label>
                              <select class="form-control" name="INSTITUTE_ID" id="INSTITUTE_ID">
                                 <option value="">Select Institute</option>
                                 <?php if($institutes)
                                    foreach ($institutes as $institute) {                                               
                                    ?>
                                 <option value="<?= $institute['INSTITUTE_ID'] ?>"><?= $institute['INSTITUTE_DESC'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Year</b></label>
                              <?php                             
                                 $Startyear=date('Y');
                                 $endYear=$Startyear-40;
                                 $yearArray = range($Startyear,$endYear);
                                 ?>
                              <select class="form-control" name="DEGREE_YEAR" id="DEGREE_YEAR"  placeholder="Enter Year">
                                 <option value="">Select Year</option>
                                 <?php
                                    foreach ($yearArray as $year) {
                                        $selected = ($year == $Startyear) ? '' : '';
                                        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                    }
                                    ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Subjects</b></label>
                              <input type="text" class="form-control" name="SUBJECTS" id="SUBJECTS"  placeholder="Enter Subjects">
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Obtain Marks</b><span class="required">*</span></label>
                              <input type="text" class="form-control" name="OBTAINED_MARKS" id="OBTAINED_MARKS" onblur="findPercentage();"   placeholder="Enter Obtain Marks">
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Total Marks</b></label>
                              <input type="text" class="form-control" name="TOTAL_MARKS" id="TOTAL_MARKS" onblur="findPercentage();"  placeholder="Enter Total Marks"  >
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Grade</b></label>
                              <input type="text" class="form-control" name="GRADE" id="GRADE"  placeholder="Enter GRADE"  readonly>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Marks Percentage</b></label>
                              <input type="text" class="form-control" value="0" name="MARKS_PERCENTAGE" id="MARKS_PERCENTAGE"  placeholder="Enter Percentage" readonly>
                           </div>
                        </div>
                        <h3 class="form-section"><b>Class Info</b></h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Class</b></label>
                              <select class="form-control" id="PROGRAM_ID" name="PROGRAM_ID" required>
                                 <option value="">Select Class</option>
                                 <?php if($programs)
                                    foreach ($programs as $program) {                                               
                                    ?>
                                 <option <?= ($inquiry['0']['PROGRAM_LINE_ID'] == $program['PROGRAM_LINE_ID'])? 'selected': '' ?> value="<?= $program['PROGRAM_LINE_ID'] ?>"><?= $program['PROGRAM_LINE_NAME'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Product</b></label>
                              <select class="form-control"  onchange="getPrice(this.value);" required>
                                 <option value="">Select Product</option>
                                 <?php if($products)
                                    foreach ($products as $product) {                                               
                                    ?>
                                 <option <?= ($product['PRODUCT_ID']==$inquiry['0']['PRODUCT_ID'])?'selected':'' ?> value="<?= $product['PRODUCT_ID'].','.$product['PRODUCT_PRICE'] ?>"><?= $product['PRODUCT_NAME'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Product Price</b><span class="required">*</span></label>
                              <input type="hidden" readonly="readonly" class="form-control" name="PRODUCT_ID" id="PRODUCT_ID">
                              <input type="text" readonly="readonly" class="form-control" value="<?= $inquiry['0']['PRODUCT_PRICE'] ?>" name="PRODUCT_PRICE" id="PRODUCT_PRICE" >
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Remarks</b></label>
                              <textarea class="form-control" name="REMARKS" id="REMARKS"></textarea>
                           </div>
                        </div>
                        <br>
                      
                        <input type="hidden" id="FEE_ID" name="FEE_ID">
                        <h3 class="form-section"><b>Package Info </b><a onclick="getPackage()" class="btn green">Get Package Amount</a></h3>
                        <div class="row">
                           <div class="col-md-2 mb-3">
                              <label class="control-label"><b>Admission Fee</b><span class="required">*</span></label>
                              <input type="text" class="form-control"  name="ADMISSION_FEE" id="ADMISSION_FEE" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"><b>Registration Fee</b><span class="required">*</span></label>
                              <input type="text" class="form-control"  name="REGISTRATION_FEE" id="REGISTRATION_FEE" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"><b>Security Fee</b><span class="required">*</span></label>
                              <input type="text" class="form-control"  id="SECURITY_FEE" name="SECURITY_FEE"  readonly >
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"><b>Annual Fee</b><span class="required">*</span></label>
                              <input type="text" class="form-control" id="ANNUAL_FEE" name="ANNUAL_FEE"  readonly >
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"><b>Tuition Fee</b><span class="required">*</span></label>
                              <input type="text" class="form-control"  id="TUTION_FEE" name="TUTION_FEE"  readonly >
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"><b>Total Package</b><span class="required">*</span></label>
                              <input type="text" class="form-control"  id="TOTAL_FEE" name="TOTAL_FEE"  readonly >
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2">                              
                                 <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control"  id="adm_disc_limit" name="adm_disc_limit" readonly>
                                 </div>
                                 <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" onblur="admissionDiscount(this.value)" name="ADMISSION_DISCOUNT" id="ADMISSION_DISCOUNT">
                                 </div>                             
                           </div>
                          <div class="col-md-2">
                                <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control"  id="reg_disc_limit" id="reg_disc_limit" readonly>
                                 </div>
                                 <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" onblur="registDiscount(this.value)" name="REGISTRATION_DISCOUNT" id="REGISTRATION_DISCOUNT">
                                 </div>                              
                          </div>
                           <div class="col-md-2">
                                <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control"  id="sec_disc_limit" name="sec_disc_limit" readonly>
                                 </div>
                                 <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" onblur="securityDiscount(this.value)" name="SECURITY_DISCOUNT" id="SECURITY_DISCOUNT">
                                 </div>                              
                          </div>
                           <div class="col-md-2">
                                <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control"  id="annual_disc_limit" name="annual_disc_limit"  readonly>
                                 </div>
                                 <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" onblur="annualDiscount(this.value)" name="ANNUAL_DISCOUNT" id="ANNUAL_DISCOUNT">
                                 </div>                              
                          </div>
                           <div class="col-md-2">
                                <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control"  id="tuition_disc_limit" name="tuition_disc_limit" readonly>
                                 </div>
                                 <div class="col-md-6">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" onblur="tuitionDiscount(this.value)" name="TUTION_DISCOUNT" id="TUTION_DISCOUNT">
                                 </div>                              
                          </div>                       
                        </div>
                        <div class="row">
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" name="admission_fee_percent" id="admission_fee_percent"  placeholder="Discount in persentage" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" name="registration_fee_percent" id="registration_fee_percent" placeholder="Discount in persentage" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" id="security_fee_percent" name="security_fee_percent"  placeholder="Discount in persentage" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" id="annual_fee_percent" name="annual_fee_percent"  placeholder="Discount in persentage" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" id="tuition_fee_percent" name="tuition_fee_percent"  placeholder="Discount in persentage" readonly>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" name="admission_fee_payable" id="admission_fee_payable"  placeholder="Payable" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" name="registration_fee_payable" id="registration_fee_payable" placeholder="Payable" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" id="security_fee_payable" name="security_fee_payable"  placeholder="Payable" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" id="annual_fee_payable" name="annual_fee_payable"  placeholder="Payable" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" id="tuition_fee_payable" name="tuition_fee_payable"  placeholder="Payable" readonly>
                           </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label"></label>
                              <input type="text" class="form-control" id="total_payable" name="total_Payable"  placeholder="Total Payable" readonly>
                           </div>
                        </div>
                        <br>
                        <h3 class="form-section">
                           <b>Fee Installment Option</b>
                           <div class="mt-radio-inline">
                              <label class="mt-radio">
                              <input type="radio" name="fee_intallment" id="fee_intallment" value="1" checked><b>Don't Consider Fee Installments</b>
                              <span></span>
                              </label>               
                              <label class="mt-radio">
                              <input type="radio" name="fee_intallment" id="fee_intallment" value="2"><b>  Consider Fee Installments</b>
                              <span></span>
                              </label>
                           </div>
                        </h3>
                        <div class="row" id="installment_div">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Installment Type</b></label>
                              <select class="form-control" name="ins_type" id="ins_type" >                        
                                 <option value="2">Month Wise</option>
                                 <option value="4">Bi-Month Wise</option>
                                 <option value="6">Quarterly</option>
                                 <option value="8">Full Installment</option>                              
                              </select>
                           </div> 
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Start Date</b></label>
                              <input type="text" class="form-control date date-picker" id="first_date" name="first_date" readonly placeholder="dd-mm-yyyy" >
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Due Date</b></label>
                              <input type="text" class="form-control date date-picker" id="due_date" name="due_date" readonly placeholder="dd-mm-yyyy" >
                           </div>                                                  
                        </div>
                        <h3 class="form-section">
                           Transport Option
                           <div class="mt-radio-inline">
                              <label class="mt-radio">
                              <input type="radio" name="is_transport" id="is_transport" value="1" checked><b>Transport Is Not Required</b>
                              <span></span>
                              </label>               
                              <label class="mt-radio">
                              <input type="radio" name="is_transport" id="is_transport" value="2"> <b>Transport Is Required</b>
                              <span></span>
                              </label>
                           </div>
                        </h3>
                         <div class="row" id="tran_div">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Stop</label>
                              <select class="form-control" name="stop_select" id="stop_select" onchange="getTransportFee(this.value)">
                                 <option value="">Select Stops</option>
                                 <?php if($stops)
                                    foreach ($stops as $stop):
                                    ?>
                                 <option value="<?= $stop['STOP_ID'];?>"><?= $stop['STOP_NAME'] ?></option>
                                 <?php endforeach; ?>
                              </select>
                           </div>
                            <div class="col-md-3 mb-3">
                                <label class="control-label">Vehicle</label>
                                <select class="form-control" name="vehicle_id"  id="vehicle_id" placeholder="Select Vehicle">
                                    <option value="">Select Vehicle</option>
                                </select>
                            </div>
                           <div class="col-md-2 mb-3">
                              <label class="control-label">Transport Fee</label>
                              <input type="text" class="form-control" name="Tranport_fee" value="" id="Tranport_fee" placeholder="Transport Fee" readonly>
                           </div>                          
                        </div>
                        <br>
                        <div class="modal-footer">
                           <a href="<?= base_url() ?>savvy1/Inquiry">
                           <button type="button" class="btn dark btn-outline pull-left" data-dismiss="modal">Inquiry List</button>
                           </a>
                           <button type="submit" id="" class="btn green">Update Inquiry</button>
                        </div>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->load->view('commons/footHtml') ?>      
<?= $this->load->view('commons/footer') ?>      
<?= $this->load->view('inquiry/appJS') ?>  
<?= $this->load->view('inquiry/modals') ?>    
