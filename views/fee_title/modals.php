
<div id="add_fee_title_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Fee Title</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="fee_title_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Fee Title Description</label>
                  <div class="col-md-8">
                     <input type="text"  name="description" id="description" class="form-control" placeholder="Enter Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Fee Title Short Description</label>
                  <div class="col-md-8">
                     <input type="text"  name="short_desc" id="short_desc" class="form-control" placeholder="Enter Short  Description "> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
            <button class="btn green"  id="save_fee_title">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<div id="edit_fee_title_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Fee Title</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_fee_title_form">
               <input type="hidden" id="id" name="id">
               <div class="form-group">
                  <label class="col-md-4 control-label">Description</label>
                  <div class="col-md-8">
                     <input type="text"  name="description_edit" id="description_edit" class="form-control" placeholder="Enter Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Short Description</label>
                  <div class="col-md-8">
                     <input type="text"  name="short_desc_edit" id="short_desc_edit" class="form-control" placeholder="Enter Short Description Description "> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="update_btn_loading">
            <button class="btn green" id="edit_fee_title">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>
