<!-- add session modal -->
<div id="add_stop_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Stop</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="stop_form">
                <div class="form-group">
                    <label class="col-md-4 control-label">Transport Route</label>
                    <div class="col-md-8">
                        <select name="route" id="route" class="form-control" placeholder="Select Transport Route">
                        <option value="">Select Route</option>
                            <?php foreach ($routes as $route):?>
                            <option value="<?=$route['ROUTE_ID']?>"><?=$route['ROUTE_NAME']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Stop Description</label>
                  <div class="col-md-8">
                     <input type="text"  name="desc" id="desc" class="form-control" placeholder="Enter Stop Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Stop Short Description</label>
                  <div class="col-md-8">
                     <input type="text" name="short_desc" id='short_desc' class="form-control" placeholder="Enter Stop Short Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">KM From Campus</label>
                  <div class="col-md-8">
                     <input type="text" name="km" id='km' class="form-control" placeholder="Enter KM From Campus"> 
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
            <h4 class="modal-title">Edit Stop</h4>
         </div>
         <div id = "error_message"></div>
         <div class="modal-body">
            <form action="#" class="form-horizontal" id="edit_stop_form">
              <input type="hidden"  name="id" id="id">
                <div class="form-group">
                    <label class="col-md-4 control-label">Transport Route</label>
                    <div class="col-md-8">
                        <select name="route_edit" id="route_edit" class="form-control" placeholder="Select Transport Route">
                            <option value="">Select Route</option>
                            <?php foreach ($routes as $route):?>
                                <option value="<?=$route['ROUTE_ID']?>"><?=$route['ROUTE_NAME']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Stop Description</label>
                  <div class="col-md-8">
                     <input type="text"  name="desc_edit" id="desc_edit" class="form-control" placeholder="Enter Stop Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Stop Short Description</label>
                  <div class="col-md-8">
                     <input type="text" name="short_desc_edit" id='short_desc_edit' class="form-control" placeholder="Enter Stop Short Description"> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">KM From Campus</label>
                  <div class="col-md-8">
                     <input type="text" name="km_edit" id='km_edit' class="form-control" placeholder="Enter KM From Campus"> 
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