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
            <div class="portlet light bordered">
               <div class="portlet-title">
                  <div class="caption font-dark">
                     <i class="icon-list font-dark"></i>
                     <span class="caption-subject bold uppercase"> Edit INQUIRY</span>
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
                     <form action="<?= base_url() ?>savvy1/Inquiry/updateInquiry"  class="horizontal-form" method="post">
                        <input type="hidden" name="TRNNO" value="<?= $inquiry['0']['TRNNO'] ?>" >
                        <h3 class="form-section"><b>Personal Info</b></h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>First Name</b><span class="required">*</span></label>
                              <input type="text" class="form-control" name="FIRST_NAME" id="FIRST_NAME" value="<?= $inquiry['0']['FIRST_NAME'] ?>"  placeholder="Enter First Name"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Last Name</label>
                              <input type="text" class="form-control" name="LAST_NAME" id="LAST_NAME" value="<?= $inquiry['0']['LAST_NAME'] ?>"  placeholder="Enter Last Name">
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Gender<span class="required">*</span></label>
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
                              <label class="control-label"><b>Date of Birth<span class="required">*</span></label>
                              <input type="text" class="form-control date date-picker" id="DOB" name="DOB" value="<?= $inquiry['0']['DOB'] ?>" readonly   placeholder="dd-mm-yyyy" required>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Reference</label>
                              <select class="form-control" id="REFERENCE_ID" name="REFERENCE_ID" required>
                                 <option value="">Select Reference</option>
                                 <?php if($references)
                                    foreach ($references as $reference) {                                               
                                    ?>
                                 <option <?= ($inquiry['0']['REFERENCE_ID'] == $reference['REFERENCE_ID'])? 'selected': '' ?> value="<?= $reference['REFERENCE_ID'] ?>"><?= $reference['REFERENCE_SOURCE'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>                          
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Inquiry Type<span class="required">*</span></label>
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
                        <h3 class="form-section"><b>Father / Guardian Info</b></h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Father Name</b></label>
                              <input type="text" class="form-control" name="FATHER_NAME" id="FATHER_NAME" value="<?= $inquiry['0']['FATHER_NAME'] ?>"  placeholder="Enter Father Name"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Father CNIC</b></label>
                              <input type="text" class="form-control" name="FATHER_CNIC" id="FATHER_CNIC" value="<?= $inquiry['0']['FATHER_CNIC'] ?>"  placeholder="Enter Father CNIC"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Father Mobile Number</b></label>
                              <input type="text" class="form-control" name="FATHER_MOBILE_NO" id="FATHER_MOBILE_NO" value="<?= $inquiry['0']['FATHER_MOBILE_NO'] ?>"  placeholder="Enter Father Mobile"  required>
                           </div>
                        </div>
                        <h3 class="form-section"><b>Class Info</b></h3>
                        <div class="row">                         
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Class</b></label>
                              <select class="form-control" id="PROGRAM_ID" name="PROGRAM_ID" required>
                                 <option value="">Select class</option>
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
                                 <option <?= ($inquiry['0']['PRODUCT_ID'] == $product['PRODUCT_ID'])? 'selected': '' ?>  value="<?= $product['PRODUCT_ID'].','.$product['PRODUCT_PRICE'] ?>"><?= $product['PRODUCT_NAME'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Product Price</b><span class="required">*</span></label>
                              <input type="hidden" readonly="readonly" class="form-control" value="<?= $inquiry['0']['PRODUCT_ID'] ?>"  name="PRODUCT_ID" id="PRODUCT_ID" required>
                              <input type="text" readonly="readonly" class="form-control" value="<?= $inquiry['0']['PRODUCT_PRICE'] ?>"  name="PRODUCT_PRICE" id="PRODUCT_PRICE" >
                           </div>
                        </div>
                        <br>
                        <div class="row">                          
                           <div class="col-md-4 mb-3">
                              <label class="control-label"><b>Remarks</b></label>
                              <textarea class="form-control" name="REMARKS" id="REMARKS" required><?= $inquiry['0']['REMARKS'] ?></textarea>
                           </div>
                        </div>
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
