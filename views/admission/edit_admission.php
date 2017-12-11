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
               <a href="<?= base_url() ?>savvy1/Admission">Admissions</a>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet light bordered">
               <div class="portlet-title">
                  <div class="caption font-dark">
                     <i class="icon-list font-dark"></i>
                     <span class="caption-subject bold uppercase"> Edit Admission</span>
                  </div>
               </div>
               <?php if($this->session->flashdata('msg')){ ?>
               <div class="alert alert-danger">
                <button class="close" data-dismiss="alert"></button>
                <strong> Alert </strong> <?php echo $this->session->flashdata('msg');  ?>
                </div>
               <?php } ?>
             
               <div class="portlet-body">
                  <div class="portlet-body form">
                     <form action="<?= base_url() ?>savvy1/Admission/updateAdmission"  class="horizontal-form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="TRNNO" value="<?= $admission['0']['TRNNO'] ?>" >
                        <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some empty Fields. Please check below. </div>
                        <h3 class="form-section">Personal Info</h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <?php if($admission['0']['PIC_PATH']==''){ ?>
                               <img id="display_pic" class="img-rounded" width="100" height="100" src="<?= base_url() ?>uploads/default_pic.png" alt="Display Pic" />
                              <?php } else { ?>
                              <img id="display_pic" class="img-rounded" width="100" height="100" src="<?= base_url() ?>uploads/students/<?= $admission['0']['PIC_PATH'] ?>" alt="Display Pic" />
                              <?php }  ?>
                               <input type='file' name="pic" class="form-control" onchange="readURL(this);" />
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">First Name<span class="required">*</span></label>
                              <input type="text" class="form-control" name="FIRST_NAME" id="FIRST_NAME" value="<?= $admission['0']['FIRST_NAME'] ?>"  placeholder="Enter First Name"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Last Name<span class="required">*</span></label>
                              <input type="text" class="form-control" name="LAST_NAME" id="LAST_NAME" value="<?= $admission['0']['LAST_NAME'] ?>"  placeholder="Enter Last Name"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Gender<span class="required">*</span></label>
                              <div class="form-group">
                                 <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                    <input type="radio" name="GENDER" id="GENDER" value="M" <?= ($admission['0']['GENDER'] == 'M')? 'checked': '' ?> > Male
                                    <span></span>
                                    </label>
                                    <label class="mt-radio">
                                    <input type="radio" name="GENDER" id="GENDER" value="F" <?= ($admission['0']['GENDER'] == 'F')? 'checked': '' ?>> Female
                                    <span></span>
                                    </label>                              
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Date of Birth<span class="required">*</span></label>
                              <input type="text" class="form-control date date-picker" id="DOB" name="DOB" value="<?= $admission['0']['DOB'] ?>"   placeholder="dd-mm-yyyy" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Personal Email<span class="required">*</span></label>
                              <input type="Email" class="form-control" name="EMAIL_ADDRESS" id="EMAIL_ADDRESS" value="<?= $admission['0']['EMAIL_ADDRESS'] ?>"  placeholder="Enter Email Address"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Personal Mobile<span class="required">*</span></label>
                              <input type="text" class="form-control" name="MOBILE_NO" id="MOBILE_NO" value="<?= $admission['0']['MOBILE_NO'] ?>"   placeholder="Enter Personal Mobile"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Land Line</label>
                              <input type="text" class="form-control" name="LANDLINE_NO" id="LANDLINE_NO" value="<?= $admission['0']['LANDLINE_NO'] ?>"  placeholder="Enter Land Line"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Inquiry Type<span class="required">*</span></label>
                              <div class="form-group">
                                 <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                    <input type="radio" name="INQ_TYPE" id="INQ_TYPE" value="1"  <?= ($admission['0']['INQ_TYPE'] == '1')? 'checked': '' ?> > Physical
                                    <span></span>
                                    </label>
                                    <label class="mt-radio">
                                    <input type="radio" name="INQ_TYPE" id="INQ_TYPE" value="2" <?= ($admission['0']['INQ_TYPE'] =='2')?'checked':''?>> Telephonic
                                    <span></span>
                                    </label>                                                             
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Religion</label>
                              <select class="form-control" id="RELIGION_ID" name="RELIGION_ID" required>
                                 <option value="">Select Religion</option>
                                 <?php if($religions)
                                    foreach ($religions as $religion) {                                               
                                    ?>
                                 <option <?= ($admission['0']['RELIGION_ID'] == $religion['RELIGION_ID'])? 'selected': '' ?>  value="<?= $religion['RELIGION_ID'] ?>"><?= $religion['RELIGION_DESC'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Reference</label>
                              <select class="form-control" id="REFERENCE_ID" name="REFERENCE_ID" required>
                                 <option value="">Select Reference</option>
                                 <?php if($references)
                                    foreach ($references as $reference) {                                               
                                    ?>
                                 <option <?= ($admission['0']['REFERENCE_ID'] == $reference['REFERENCE_ID'])? 'selected': '' ?> value="<?= $reference['REFERENCE_ID'] ?>"><?= $reference['REFERENCE_SOURCE'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Reference</label>
                              <input type="text" class="form-control" id="CMP_REFERENCE" value="<?= $admission['0']['CMP_REFERENCE'] ?>"  name="CMP_REFERENCE">
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Reference Detail</label>
                              <textarea class="form-control" name="CMP_REFERENCE_DETAIL" id="CMP_REFERENCE_DETAIL"><?= $admission['0']['CMP_REFERENCE_DETAIL'] ?></textarea>
                           </div>
                        </div>
                        <h3 class="form-section">Location/Address Info</h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Country</label>
                              <select class="form-control" name="COUNTRY_ID" id="COUNTRY_ID" data-placeholder="Select Country">
                                 <option value="1">Pakistan</option>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Province</label>
                              <select class="form-control" name="PROVINCE_ID" id="PROVINCE_ID" onchange="getCities(this.value)">
                                 <option value="">Select Province</option>
                                  <?php if($provinces)
                                    foreach ($provinces as $province) {                                               
                                    ?>
                                 <option <?= ($admission['0']['PROVINCE_ID'] == $province['PROVINCE_ID'])? 'selected': '' ?> value="<?= $province['PROVINCE_ID'] ?>"><?= $province['PROVINCE_DESC'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">City</label>
                              <select class="form-control" name="CITY_ID" id="CITY_ID" onchange="getLocations(this.value)">
                                 <option value="">Select City</option>
                                  <?php if($cities)
                                    foreach ($cities as $city) {                                               
                                    ?>
                                 <option <?= ($admission['0']['CITY_ID'] == $city['CITY_ID'])? 'selected': '' ?> value="<?= $city['CITY_ID'] ?>"><?= $city['CITY_DESC'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Location</label>
                              <select class="form-control select2" id="LOCATION_ID" name="LOCATION_ID">
                                 <option value="">Select Location</option>
                                 <?php if($locations)
                                    foreach ($locations as $location) {                                               
                                    ?>
                                 <option <?= ($admission['0']['LOCATION_ID'] == $location['LOCATION_ID'])? 'selected': '' ?> value="<?= $location['LOCATION_ID'] ?>"><?= $location['LOCATION_DESC'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-3">
                              <label class="control-label">Present Address</label>
                              <textarea class="form-control" name="PRESENT_ADDRESS" id="PRESENT_ADDRESS"><?= $admission['0']['PRESENT_ADDRESS'] ?></textarea>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label class="control-label">Permanent Address</label>
                              <textarea class="form-control" name="PERMANENT_ADDRESS" id="PERMANENT_ADDRESS"><?= $admission['0']['PERMANENT_ADDRESS'] ?></textarea>
                           </div>
                        </div>
                        <h3 class="form-section">Father / Guardian Info</h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Father Name<span class="required">*</span></label>
                              <input type="text" class="form-control" name="FATHER_NAME" id="FATHER_NAME" value="<?= $admission['0']['FATHER_NAME'] ?>"  placeholder="Enter Father Name"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Father CNIC<span class="required">*</span></label>
                              <input type="text" class="form-control" name="FATHER_CNIC" id="FATHER_CNIC" value="<?= $admission['0']['FATHER_CNIC'] ?>"  placeholder="Enter Father CNIC"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Father Mobile Number<span class="required">*</span></label>
                              <input type="text" class="form-control" name="FATHER_MOBILE_NO" id="FATHER_MOBILE_NO" value="<?= $admission['0']['FATHER_MOBILE_NO'] ?>"  placeholder="Enter Father Mobile"  required>
                           </div>
                        </div>
                        <h3 class="form-section">Mother Info</h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Mother Name<span class="required">*</span></label>
                              <input type="text" class="form-control" name="MOTHER_NAME" id="MOTHER_NAME" value="<?= $admission['0']['MOTHER_NAME'] ?>"  placeholder="Enter Mother Name"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Mother CNIC<span class="required">*</span></label>
                              <input type="text" class="form-control" name="MOTHER_CNIC" id="MOTHER_CNIC" value="<?= $admission['0']['MOTHER_CNIC'] ?>"  placeholder="Enter Mother CNIC"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label">Mother Mobile Number<span class="required">*</span></label>
                              <input type="text" class="form-control" name="MOTHER_MOBILE_NO" id="MOTHER_MOBILE_NO" value="<?= $admission['0']['MOTHER_MOBILE_NO'] ?>"  placeholder="Enter Mother Mobile"  required>
                           </div>
                        </div>
                        
                        <div class="modal-footer">
                           <a href="<?= base_url() ?>savvy1/Admission">
                            <button type="button" class="btn dark btn-outline pull-left" data-dismiss="modal">Admission List</button>
                           </a>
                           <button type="submit" id="" class="btn green">Update Admission</button>
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
<?= $this->load->view('admission/appJS') ?>      
<?= $this->load->view('admission/modals') ?>      
