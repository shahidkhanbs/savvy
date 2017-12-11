
<div id="add_program_section_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Program Section</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="program_section_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Program</label>
                  <div class="col-md-8">
                      <select name="program" id="program"  class="form-control">
                        <option value="">Select Program</option>
                        <?php if($programs)
                             foreach ($programs as $program) {                                               
                         ?>
                        <option value="<?= $program['PROGRAM_LINE_ID'] ?>"><?= $program['PROGRAM_LINE_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Section</label>
                  <div class="col-md-8">
                      <select name="section" id="section"  class="form-control">
                        <option value="">Select Section</option>
                        <?php if($sections)
                             foreach ($sections as $section) {                                               
                         ?>
                        <option value="<?= $section['SECTION_ID'] ?>"><?= $section['SECTION_DESC']?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Remarks</label>
                  <div class="col-md-8">                     
                     <textarea name="remarks" id="remarks"  class="form-control" placeholder="Enter Remarks"></textarea>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
            <button class="btn green"  id="save_program_section">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<div id="edit_program_section_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Program Section</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_program_section_form">
              <input type="hidden"  name="id" id="id"> 
              
               <div class="form-group">
                  <label class="col-md-4 control-label">Program</label>
                  <div class="col-md-8">
                      <select name="program_edit" id="program_edit"  class="form-control">
                        <option value="">Select Program</option>
                        <?php if($programs)
                             foreach ($programs as $program) {                                               
                         ?>
                        <option value="<?= $program['PROGRAM_LINE_ID'] ?>"><?= $program['PROGRAM_LINE_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Section</label>
                  <div class="col-md-8">
                      <select name="section_edit" id="section_edit"  class="form-control">
                        <option value="">Select Section</option>
                        <?php if($sections)
                             foreach ($sections as $section) {                                               
                         ?>
                        <option value="<?= $section['SECTION_ID'] ?>"><?= $section['SECTION_DESC']?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Remarks</label>
                  <div class="col-md-8">                     
                     <textarea name="remarks_edit" id="remarks_edit"  class="form-control" placeholder="Enter Remarks"></textarea>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
          <span id="update_btn_loading">
            <button class="btn green" id="edit_program_section">Update</button>
          </span>
         </div>
      </div>
   </div>
</div>