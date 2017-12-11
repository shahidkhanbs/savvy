<div id="add_fee_code_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Fee Coding</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="fee_coding_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Fee Type</label>
                  <div class="col-md-8">                     
                     <select class="form-control" name="fee_type" id="fee_type" onchange="changeFeeType(this.value);">
                       <option  value="">Select Fee Type</option>                        
                       <option  value="1">Program Wise</option>                        
                       <option  value="2">Program Details Wise</option>               
                     </select>
                  </div>
               </div>
               <div class="form-group" id="program_dropdown">
                  <label class="col-md-4 control-label">Program</label>
                  <div class="col-md-8">                     
                     <select class="form-control" name="program" id="program">
                       <option  value="">Select Program</option>                        
                       <?php if($programs)
                             foreach ($programs as $program) {                                               
                         ?>
                        <option value="<?= $program['PROGRAM_ID'] ?>"><?= $program['PROGRAM_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group" id="program_line_dropdown">
                  <label class="col-md-4 control-label">Program Line</label>
                  <div class="col-md-8">                     
                     <select class="form-control" name="program_line" id="program_line">
                       <option  value="">Select Program Line</option>                        
                       <?php if($program_lines)
                             foreach ($program_lines as $program_line) {                                               
                         ?>
                        <option value="<?= $program_line['PROGRAM_LINE_ID'] ?>"><?= $program_line['PROGRAM_LINE_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Template</label>
                  <div class="col-md-8">
                    <select class="form-control" name="template" id="template">
                       <option  value="">Select Template</option>                        
                       <?php if($templates)
                             foreach ($templates as $template) {                                               
                         ?>
                        <option value="<?= $template['TEMPLATE_ID'] ?>"><?= $template['FEE_TITLE_DESC'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
              <div class="form-group">
                  <label class="col-md-4 control-label">Fee Group</label>
                  <div class="col-md-8">
                    <select class="form-control" name="fee_group" id="fee_group">
                       <option  value="">Select Fee Group</option>                        
                       <?php if($fee_groups)
                             foreach ($fee_groups as $group) {                                               
                         ?>
                        <option value="<?= $group['FEE_GRP_ID'] ?>"><?= $group['FEE_GRP_DESC'] ?></option>
                        <?php } ?>
                     </select>
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
            <button class="btn green"  id="save_fee_coding">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>
<div id="edit_fee_code_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Fee Coding</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_fee_code_form">
               <input type="hidden" id="id" name="id">
               
               <div class="form-group">
                  <label class="col-md-4 control-label">Fee Type</label>
                  <div class="col-md-8">                     
                     <select class="form-control" name="fee_type_edit" id="fee_type_edit" onchange="changeFeeType1(this.value);">
                       <option  value="">Select Fee Type</option>                        
                       <option  value="1">Program Wise</option>                        
                       <option  value="2">Program Details Wise</option>               
                     </select>
                  </div>
               </div>
               <div class="form-group" id="program_dropdown1">
                  <label class="col-md-4 control-label">Program</label>
                  <div class="col-md-8">                     
                     <select class="form-control" name="program_edit" id="program_edit">
                       <option  value="">Select Program</option>                        
                       <?php if($programs)
                             foreach ($programs as $program) {                                               
                         ?>
                        <option value="<?= $program['PROGRAM_ID'] ?>"><?= $program['PROGRAM_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group" id="program_line_dropdown1">
                  <label class="col-md-4 control-label">Program Line</label>
                  <div class="col-md-8">                     
                     <select class="form-control" name="program_line_edit" id="program_line_edit">
                       <option  value="">Select Program Line</option>                        
                       <?php if($program_lines)
                             foreach ($program_lines as $program_line) {                                               
                         ?>
                        <option value="<?= $program_line['PROGRAM_LINE_ID'] ?>"><?= $program_line['PROGRAM_LINE_NAME'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Template</label>
                  <div class="col-md-8">
                    <select class="form-control" name="template_edit" id="template_edit">
                      <option  value="">Select Template</option>                        
                       <?php if($templates)
                             foreach ($templates as $template) {                                               
                         ?>
                        <option value="<?= $template['TEMPLATE_ID'] ?>"><?= $template['FEE_TITLE_DESC'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Fee Group</label>
                  <div class="col-md-8">
                    <select class="form-control" name="fee_group_edit" id="fee_group_edit">
                       <option  value="">Select Fee Group</option>                        
                       <?php if($fee_groups)
                             foreach ($fee_groups as $group) {                                               
                         ?>
                        <option value="<?= $group['FEE_GRP_ID'] ?>"><?= $group['FEE_GRP_DESC'] ?></option>
                        <?php } ?>
                     </select>
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
            <button class="btn green" id="edit_fee_code">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>
