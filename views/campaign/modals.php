<!-- add session modal -->
<div id="add_campaign_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Campaign</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="campaign_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Academic Year</label>
                  <div class="col-md-8"> 
                     <select name="academic_year" id="academic_year"  class="form-control">
                        <option value="">Select Academic Year</option>
                        <?php if($academic_years)
                             foreach ($academic_years as $academic) {                                               
                         ?>
                        <option value="<?= $academic['AYID'] ?>"><?= $academic['AY_FROM'].' To '.$academic['AY_TO'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Campaign Name</label>
                  <div class="col-md-8">
                     <input type="text"  name="name" id="name" class="form-control" placeholder="Enter Name"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Campaign Short Name</label>
                  <div class="col-md-8">
                     <input type="text"  name="short_name" id="short_name" class="form-control" placeholder="Enter Short Name"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Start Date</label>
                  <div class="col-md-8">
                     <input type="text"  name="start_date" id="start_date" class="form-control date date-picker" readonly placeholder="dd-mm-yyyy"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">End Date</label>
                  <div class="col-md-8">
                     <input type="text" name="end_date" id='end_date' class="form-control date date-picker" readonly placeholder="dd-mm-yyyy"> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
            <button class="btn green"  id="save_campaign">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<!-- add session modal -->
<div id="edit_campaign_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Campaign</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_campaign_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Academic Year</label>
                  <div class="col-md-8"> 
                     <select name="academic_year_edit" id="academic_year_edit"  class="form-control">
                        <option value="">Select Academic Year</option>
                        <?php if($academic_years)
                             foreach ($academic_years as $academic) {                                               
                         ?>
                        <option value="<?= $academic['AYID'] ?>"><?= $academic['AY_FROM'].' To '.$academic['AY_TO'] ?></option>
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
               <div class="form-group">
                  <label class="col-md-4 control-label">Start Date</label>
                  <div class="col-md-8">
                     <input type="text"  name="start_date_edit" id="start_date_edit" class="form-control date date-picker" placeholder="dd-mm-yyyy"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">End Date</label>
                  <div class="col-md-8">
                     <input type="text" name="end_date_edit" id='end_date_edit' class="form-control date date-picker" placeholder="dd-mm-yyyy"> 
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="update_btn_loading">
             <button class="btn green"  id="update_campaign">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>