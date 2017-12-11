<!-- add session modal -->
<div id="add_discount_policy_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Discount Policy</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="discount_policy_form">   
               <div class="form-group">
                  <label class="col-md-4 control-label">Discount Type</label>
                  <div class="col-md-8">
                     <div class="mt-radio-inline">
                        <label class="mt-radio">
                        <input type="radio" name="type" id="typ" value="1" checked> Fee Group Wise Discount
                        <span></span>
                        </label>                              
                     
                        <label class="mt-radio">
                        <input type="radio" name="type" id="typ" value="2"> Over All Discount
                        <span></span>
                        </label>
                     </div>                       
                  </div>
               </div>            
               <div class="form-group" id="fee_group_dropdown">
                  <label class="col-md-4 control-label">Discount Group</label>
                  <div class="col-md-8">
                     <select name="fee_group" id="fee_group"  class="form-control">
                        <option value="">Select Discount Group</option>
                        <?php if($fee_groups)
                             foreach ($fee_groups as $group) {                                               
                         ?>
                        <option value="<?= $group['FEE_GRP_ID'] ?>"><?= $group['FEE_GRP_DESC'] ?></option>
                        <?php } ?>
                     </select> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Admission Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="adm_fee" id="adm_fee" class="form-control" placeholder="Enter Admission Discount "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Registration Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="reg_fee" id="reg_fee" class="form-control" placeholder="Enter Registration Discount "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Security Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="security_fee" id="security_fee" class="form-control" placeholder="Enter Security Discount "> 
                  </div>
               </div>         
               <div class="form-group">
                  <label class="col-md-4 control-label">Annual Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="annual_fee" id="annual_fee" class="form-control" placeholder="Enter Annual Discount "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Tution Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="tution_fee" id="tution_fee" class="form-control" placeholder="Enter Tution Discount "> 
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
            <button class="btn green"  id="save_discount_policy">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<!-- add session modal -->
<div id="edit_discount_policy_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Template</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_discount_policy_form">
               <input type="hidden" id="id" name="id">
              <div class="form-group" id="fee_group_dropdown1">
                  <label class="col-md-4 control-label">Discount Group</label>
                  <div class="col-md-8">
                     <select name="fee_group_edit" id="fee_group_edit"  class="form-control">
                        <option value="">Select Discount Group</option>
                        <?php if($fee_groups)
                             foreach ($fee_groups as $group) {                                               
                         ?>
                        <option value="<?= $group['FEE_GRP_ID'] ?>"><?= $group['FEE_GRP_DESC'] ?></option>
                        <?php } ?>
                     </select> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Admission Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="adm_edit" id="adm_edit" class="form-control" placeholder="Enter Admission Discount "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Registration Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="reg_edit" id="reg_edit" class="form-control" placeholder="Enter Registration Discount "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Security Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="security_edit" id="security_edit" class="form-control" placeholder="Enter Security Discount "> 
                  </div>
               </div>         
               <div class="form-group">
                  <label class="col-md-4 control-label">Annual Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="annual_edit" id="annual_edit" class="form-control" placeholder="Enter Annual Discount "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Tution Discount</label>
                  <div class="col-md-8">
                     <input type="text"  name="tution_edit" id="tution_edit" class="form-control" placeholder="Enter Tution Discount "> 
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
            <button class="btn green" id="edit_discount_policy">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>
