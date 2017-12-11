<!-- add session modal -->
<div id="add_fee_group_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Fee Group</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="fee_group_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Description</label>
                  <div class="col-md-8">
                     <input type="text"  name="desc" id="desc" class="form-control" placeholder="Enter Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Short Description</label>
                  <div class="col-md-8">
                     <input type="text" name="short_desc" id='short_desc' class="form-control" placeholder="Enter Short Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Min Percentage</label>
                  <div class="col-md-8">
                     <input type="text" name="min" id='min' class="form-control" placeholder="Enter Min Percentage"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Max Percentage</label>
                  <div class="col-md-8">
                     <input type="text" name="max" id='max' class="form-control" placeholder="Enter Max Percentage"> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
            <button class="btn green"  id="save_fee_group">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<!-- add session modal -->
<div id="edit_fee_group_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Fee Group</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_fee_group_form">
              <input type="hidden"  name="id" id="id"> 
              <div class="form-group">
                  <label class="col-md-4 control-label">Description</label>
                  <div class="col-md-8">
                     <input type="text"  name="desc_edit" id="desc_edit" class="form-control" placeholder="Enter Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Short Description</label>
                  <div class="col-md-8">
                     <input type="text" name="short_desc_edit" id='short_desc_edit' class="form-control" placeholder="Enter Short Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Min Percentage</label>
                  <div class="col-md-8">
                     <input type="text" name="min_edit" id='min_edit' class="form-control" placeholder="Enter Min Percentage"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Max Percentage</label>
                  <div class="col-md-8">
                     <input type="text" name="max_edit" id='max_edit' class="form-control" placeholder="Enter Max Percentage"> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="update_btn_loading">
            <button class="btn green" id="edit_fee_group">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>