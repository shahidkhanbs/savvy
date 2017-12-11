<!-- add session modal -->
<div id="add_stop_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Package</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="stop_form">
               <div class="form-group">
                  <label class="col-md-4 control-label">Transport Package</label>
                  <div class="col-md-8">
                      <select name="stop_id" id="stop_id" class="form-control" placeholder="Select Transport Stop">
                          <option value="">Select Transport Stop</option>
                          <?php foreach ($stops as $stop):?>
                              <option value="<?=$stop['STOP_ID']?>"><?=$stop['STOP_NAME']?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Stop Package</label>
                  <div class="col-md-8">
                     <input type="text" name="package_amount" id='package_amount' class="form-control" placeholder="Enter Stop Short Description">
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="btn_loading">
            <button class="btn green"  id="save_stop">Save</button>
            </span>
         </div>
      </div>
   </div>
</div>

<!-- add session modal -->
<div id="edit_stop_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Transport Package</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_stop_form">
              <input type="hidden"  name="id" id="id">
                <div class="form-group">
                    <label class="col-md-4 control-label">Stop Name</label>
                    <div class="col-md-8">
                        <select name="stop_id_edit" id="stop_id_edit" class="form-control" placeholder="Select Transport Stop">
                            <option value="">Select Transport Stop</option>
                            <?php foreach ($stops as $stop):?>
                                <option value="<?=$stop['STOP_ID']?>"><?=$stop['STOP_NAME']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Stop Package</label>
                    <div class="col-md-8">
                        <input type="text" name="package_amount_edit" id='package_amount_edit' class="form-control" placeholder="Enter Stop Short Description">
                    </div>
                </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <span id="update_btn_loading">
            <button class="btn green" id="edit_stop">Update</button>
            </span>
         </div>
      </div>
   </div>
</div>