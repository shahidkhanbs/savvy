<div id="add_program_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Program</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="program_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Group</label>
                  <div class="col-md-8"> 
                     <select name="group" id="group"  class="form-control">
                          <option value="">Select Group</option>
                           <?php if($program_group)
                             foreach ($program_group as $group) {                                               
                             ?>
                           <option value="<?= $group['GRP_ID'] ?>"><?= $group['GRP_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Name</label>
                  <div class="col-md-8">
                     <input type="text"  name="name" id="name" class="form-control" placeholder="Enter Name"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Short Name</label>
                  <div class="col-md-8">
                     <input type="text"  name="short_name" id="short_name" class="form-control" placeholder="Enter Short Name"> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
             <button class="btn green"  id="save_program">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<div id="edit_program_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Program</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_program_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Session</label>
                  <div class="col-md-8"> 
                     <select name="group_edit" id="group_edit"  class="form-control">
                        <option value="">Select Group</option>
                        <?php if($program_group)
                             foreach ($program_group as $group) {                                               
                         ?>
                        <option value="<?= $group['GRP_ID'] ?>"><?= $group['GRP_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <input type="hidden" name="id" id="id">
               <div class="form-group">
                  <label class="col-md-4 control-label">Name</label>
                  <div class="col-md-8">
                     <input type="text"  name="name_edit" id="name_edit" class="form-control" placeholder="Enter Name"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Short Name</label>
                  <div class="col-md-8">
                     <input type="text"  name="short_name_edit" id="short_name_edit" class="form-control" placeholder="Enter Short Name"> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="update_btn_loading">
             <button class="btn green"  id="update_program">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>