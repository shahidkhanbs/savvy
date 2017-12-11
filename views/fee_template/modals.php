<!-- add session modal -->
<div id="add_template_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Template</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="template_form">
         
               <div class="form-group">
                  <label class="col-md-4 control-label">Fee Title</label>
                  <div class="col-md-8">
                     <select name="title" id="title"  class="form-control">
                        <option value="">Select Fee Title</option>
                        <?php if($fee_titles)
                             foreach ($fee_titles as $fee_title) {                                               
                         ?>
                        <option value="<?= $fee_title['FEE_TITLE_ID'] ?>"><?= $fee_title['FEE_TITLE_DESC'] ?></option>
                        <?php } ?>
                     </select> 
                  </div>
               </div>
   
               <div class="form-group">
                  <label class="col-md-4 control-label">Admission Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="adm_fee" id="adm_fee" class="form-control" placeholder="Enter Admission Fee "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Registration Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="reg_fee" id="reg_fee" class="form-control" placeholder="Enter Registration Fee "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Security Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="security_fee" id="security_fee" class="form-control" placeholder="Enter Security Fee "> 
                  </div>
               </div>         
               <div class="form-group">
                  <label class="col-md-4 control-label">Annual Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="annual_fee" id="annual_fee" class="form-control" placeholder="Enter Annual Fee "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Tution Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="tution_fee" id="tution_fee" class="form-control" placeholder="Enter Tution Fee "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Remarks</label>
                  <div class="col-md-8">                                                    
                     <textarea class="form-control" name="remarks" id="remarks" placeholder="Remarks"></textarea>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
            <button class="btn green"  id="save_template">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<!-- add session modal -->
<div id="edit_template_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Template</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_template_form">
               <input type="hidden" id="id" name="id">
               
               <div class="form-group">
                  <label class="col-md-4 control-label">Fee Title</label>
                  <div class="col-md-8">
                     <select name="title_edit" id="title_edit"  class="form-control">
                        <option value="">Select Fee Title</option>
                        <?php if($fee_titles)
                             foreach ($fee_titles as $fee_title) {                                               
                         ?>
                        <option value="<?= $fee_title['FEE_TITLE_ID'] ?>"><?= $fee_title['FEE_TITLE_DESC'] ?></option>
                        <?php } ?>
                     </select> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Admission Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="adm_fee_edit" id="adm_fee_edit" class="form-control" placeholder="Enter Admission Fee "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Registration Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="reg_fee_edit" id="reg_fee_edit" class="form-control" placeholder="Enter Registration Fee "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Security Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="security_fee_edit" id="security_fee_edit" class="form-control" placeholder="Enter Security Fee "> 
                  </div>
               </div>         
               <div class="form-group">
                  <label class="col-md-4 control-label">Annual Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="annual_fee_edit" id="annual_fee_edit" class="form-control" placeholder="Enter Annual Fee "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Tution Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="tution_fee_edit" id="tution_fee_edit" class="form-control" placeholder="Enter Tution Fee "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Remarks</label>
                  <div class="col-md-8">                                                    
                     <textarea class="form-control" name="remarks_edit" id="remarks_edit" placeholder="Remarks"></textarea>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="update_btn_loading">
            <button class="btn green" id="edit_template">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>
