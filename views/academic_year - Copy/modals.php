
<div id="add_academic_year" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Academic Year</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="academic_year_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Academic Year From</label>
                  <div class="col-md-8">
                     <input type="text"  name="from" id="from" class="form-control date date-picker" readonly placeholder="dd-mm-yyyy"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Academic Year To</label>
                  <div class="col-md-8">
                     <input type="text" name="to" id='to' class="form-control date date-picker" readonly placeholder="dd-mm-yyyy"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Description</label>
                  <div class="col-md-8">                                                    
                     <textarea class="form-control" name="description" placeholder="Description"></textarea>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
            <button class="btn green"  id="save_academic_year">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<!-- add session modal -->
<div id="edit_academic_year_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Academic Year</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_academic_year_form">
              <input type="hidden"  name="id" id="id"> 
               <div class="form-group">
                  <label class="col-md-4 control-label">Academic Year From</label>
                  <div class="col-md-8">
                     <input type="text"  name="from_edit" id="from_edit" class="form-control date date-picker" readonly placeholder="dd-mm-yyyy"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Academic Year To</label>
                  <div class="col-md-8">
                     <input type="text" name="to_edit" id='to_edit' class="form-control date date-picker" readonly placeholder="dd-mm-yyyy"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Description</label>
                  <div class="col-md-8">                                                    
                     <textarea class="form-control" id="description_edit" name="description_edit" placeholder="Description"></textarea>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="update_btn_loading">
              <button class="btn green" id="edit_academic_year">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>