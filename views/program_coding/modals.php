<!-- add session modal -->
<div id="add_program_coding_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Program Code</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="program_coding_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Program</label>
                  <div class="col-md-8">
                      <select name="program" id="program"  class="form-control">
                        <option value="">Select Program</option>
                        <?php if($programs)
                             foreach ($programs as $program) {                                               
                         ?>
                        <option value="<?= $program['PROGRAM_ID'] ?>"><?= $program['PROGRAM_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Gender</label>
                  <div class="col-md-8">
                      <select name="gender" id="gender"  class="form-control">
                        <option value="">Select Gender</option>
                        <?php if($program_genders)
                             foreach ($program_genders as $gender) {                                               
                         ?>
                        <option value="<?= $gender['GENDER_ID'] ?>"><?= $gender['GENDER_NAME'].' - '.$gender['GENDER_SHORT_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Medium</label>
                  <div class="col-md-8">
                      <select name="medium" id="medium"  class="form-control">
                        <option value="">Select Medium</option>
                        <?php if($program_mediums)
                             foreach ($program_mediums as $medium) {                                               
                         ?>
                        <option value="<?= $medium['MEDIUM_ID'] ?>"><?= $medium['MEDIUM_NAME'].' - '.$medium['MEDIUM_SHORT_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Shift</label>
                  <div class="col-md-8">
                      <select name="shift" id="shift"  class="form-control">
                        <option value="">Select Shift</option>
                        <?php if($program_shifts)
                             foreach ($program_shifts as $shift) {                                               
                         ?>
                        <option value="<?= $shift['SHIFT_ID'] ?>"><?= $shift['SHIFT_NAME'].' - '.$shift['SHIFT_SHORT_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
            <button class="btn green"  id="save_program_coding">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<!-- add session modal -->
<div id="edit_program_coding_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Program Code</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_program_coding_form">
              <input type="hidden"  name="id" id="id"> 
               <div class="form-group">
                  <label class="col-md-4 control-label">Program</label>
                  <div class="col-md-8">
                      <select name="program_edit" id="program_edit"  class="form-control">
                        <option value="">Select Program</option>
                        <?php if($programs)
                             foreach ($programs as $program) {                                               
                         ?>
                        <option value="<?= $program['PROGRAM_ID'] ?>"><?= $program['PROGRAM_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Gender</label>
                  <div class="col-md-8">
                      <select name="gender_edit" id="gender_edit"  class="form-control">
                        <option value="">Select Gender</option>
                        <?php if($program_genders)
                             foreach ($program_genders as $gender) {                                               
                         ?>
                        <option value="<?= $gender['GENDER_ID'] ?>"><?= $gender['GENDER_NAME'].' - '.$gender['GENDER_SHORT_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Medium</label>
                  <div class="col-md-8">
                      <select name="medium_edit" id="medium_edit"  class="form-control">
                        <option value="">Select Medium</option>
                        <?php if($program_mediums)
                             foreach ($program_mediums as $medium) {                                               
                         ?>
                        <option value="<?= $medium['MEDIUM_ID'] ?>"><?= $medium['MEDIUM_NAME'].' - '.$medium['MEDIUM_SHORT_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Shift</label>
                  <div class="col-md-8">
                      <select name="shift_edit" id="shift_edit"  class="form-control">
                        <option value="">Select Shift</option>
                        <?php if($program_shifts)
                             foreach ($program_shifts as $shift) {                                               
                         ?>
                        <option value="<?= $shift['SHIFT_ID'] ?>"><?= $shift['SHIFT_NAME'].' - '.$shift['SHIFT_SHORT_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
          <span id="update_btn_loading">
            <button class="btn green" id="edit_program_coding">Update</button>
          </span>
         </div>
      </div>
   </div>
</div>