<div id="add_fine_template_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add Fine Template</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="fine_template_form">
         
               <div class="form-group">
                  <label class="col-md-4 control-label">Fine Type</label>
                  <div class="col-md-8">
                     <select name="type" id="type"  class="form-control">
                        <option value="">Select Fine Type</option>
                        <?php if($fine_types)
                             foreach ($fine_types as $fine_type) {                                               
                         ?>
                        <option value="<?= $fine_type['FINE_TYPE_ID'] ?>"><?= $fine_type['FINE_TYPE_DESC'] ?></option>
                        <?php } ?>
                     </select> 
                  </div>
               </div>
   
               <div class="form-group">
                  <label class="col-md-4 control-label">Fine Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="fine_fee" id="fine_fee" class="form-control" placeholder="Enter Fine Fee "> 
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
            <button class="btn green"  id="save_fine_template">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<div id="edit_fine_template_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Fine Template</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_fine_template_form">
               <input type="hidden" id="id" name="id">
               
               <div class="form-group">
                  <label class="col-md-4 control-label">Fee Title</label>
                  <div class="col-md-8">
                     <select name="type_edit" id="type_edit"  class="form-control">
                       <option value="">Select Fine Type</option>
                        <?php if($fine_types)
                             foreach ($fine_types as $fine_type) {                                               
                         ?>
                        <option value="<?= $fine_type['FINE_TYPE_ID'] ?>"><?= $fine_type['FINE_TYPE_DESC'] ?></option>
                        <?php } ?>
                     </select> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Fine Fee</label>
                  <div class="col-md-8">
                     <input type="text"  name="fine_fee_edit" id="fine_fee_edit" class="form-control" placeholder="Enter Fine Fee "> 
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
            <button class="btn green" id="edit_fine_template">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>
