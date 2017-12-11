<?= $this->load->view('commons/header') ?>
<?= $this->load->view('commons/headHtml') ?>

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
                     <span class="caption-subject bold uppercase">  INQUIRY FORM</span>
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
                     <form action="<?= base_url() ?>savvy1/Inquiry/InsertInquiry"  class="horizontal-form" method="post">
                        <h3 class="form-section"><b>Personal Info</b></h3>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>First Name</b><span class="required">*</span></label>
                              <input type="text" class="form-control"  name="FIRST_NAME" id="FIRST_NAME"  placeholder="Enter First Name"  required>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Last Name</b></label>
                              <input type="text" class="form-control" name="LAST_NAME" id="LAST_NAME" placeholder="Enter Last Name">
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Gender</b><span class="required">*</span></label>
                              <div class="form-group">
                                 <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                    <input type="radio" name="GENDER" id="GENDER" value="M" checked=""> Male
                                    <span></span>
                                    </label>
                                    <label class="mt-radio">
                                    <input type="radio" name="GENDER" id="GENDER" value="F"> Female
                                    <span></span>
                                    </label>                              
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Date of Birth</b><span class="required">*</span></label>
                              <input type="text" class="form-control date date-picker" id="DOB" name="DOB" readonly  placeholder="dd-mm-yyyy" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Reference</b><span class="required">*</span></label>
                              <select class="form-control" id="REFERENCE_ID" name="REFERENCE_ID" required>
                                 <option value="">Select Reference</option>
                                 <?php if($references)
                                    foreach ($references as $reference) {                                               
                                    ?>
                                 <option value="<?= $reference['REFERENCE_ID'] ?>"><?= $reference['REFERENCE_SOURCE'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Inquiry Type</b><span class="required">*</span></label>
                              <div class="form-group">
                                 <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                    <input type="radio" name="INQ_TYPE" id="INQ_TYPE" value="1" checked=""> Physical
                                    <span></span>
                                    </label>
                                    <label class="mt-radio">
                                    <input type="radio" name="INQ_TYPE" id="INQ_TYPE" value="2"> Telephonic
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
                              <input type="text" class="form-control" name="FATHER_NAME" id="FATHER_NAME" placeholder="Enter Father Name"  >
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Father CNIC</b></label>
                              <input type="text" class="form-control" name="FATHER_CNIC" id="FATHER_CNIC" placeholder="Enter Father CNIC"  >
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Father Mobile Number</b></label>
                              <input type="text" class="form-control" name="FATHER_MOBILE_NO" id="FATHER_MOBILE_NO" placeholder="Enter Father Mobile">
                           </div>
                        </div>
                        
                        <h3 class="form-section"><b>Class Info</b></h3>
                        <div class="row">                           
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Class</b><span class="required">*</span></label>
                              <select class="form-control" name="PROGRAM_ID" id="PROGRAM_ID"  required>
                                 <option value="">Select Class</option>
                                 <?php if($programs)
                                    foreach ($programs as $program) {                                               
                                    ?>
                                 <option value="<?= $program['PROGRAM_LINE_ID'] ?>"><?= $program['PROGRAM_LINE_NAME'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>                          
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Product</b><span class="required">*</span></label>
                              <select class="form-control"  onchange="getPrice(this.value);" required>
                                 <option value="">Select Product</option>
                                 <?php if($products)
                                    foreach ($products as $product) {                                               
                                    ?>
                                 <option value="<?= $product['PRODUCT_ID'].','.$product['PRODUCT_PRICE'] ?>"><?= $product['PRODUCT_NAME'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label class="control-label"><b>Product Price</b><span class="required">*</span></label>
                              <input type="hidden" readonly="readonly" class="form-control" name="PRODUCT_ID" id="PRODUCT_ID">
                              <input type="text" readonly="readonly" class="form-control" name="PRODUCT_PRICE" id="PRODUCT_PRICE" >
                           </div>                           
                        </div>
                        <br>
                        <div class="row">
                           
                           <div class="col-md-6 mb-3">
                              <label class="control-label"><b>Remarks</b></label>
                              <textarea class="form-control" name="REMARKS" id="REMARKS" required></textarea>
                           </div>
                        </div>
                        <br/>
                        <div class="modal-footer">                  
                           <button type="submit" id="" class="btn green">Save Inquiry</button>
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
