<!-- add session modal -->
<div id="add_student_vehicle" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog container">
        <div class="modal-content container">
            <div id = "error_message"></div>
            <div class="modal-body">
                <form action="#" class="form-horizontal" id="stop_form">
                   <div id="student_info">

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
                <h4 class="modal-title">Edit Vehicle</h4>
            </div>
            <div id = "error_message"></div>
            <div class="modal-body">
                <form action="#" class="form-horizontal" id="edit_stop_form">
                    <input type="hidden"  name="id" id="id">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Vehicle type</label>
                        <div class="col-md-8">
                            <select name="veh_type_edit" id="veh_type_edit" class="form-control" placeholder="Select Transport Route">
                                <option value="">Select Vehicle Type</option>
                                <?php foreach ($vehicles_type as $vehicle):?>
                                    <option value="<?=$vehicle['VEH_TYPE_ID']?>"><?=$vehicle['VEH_TYPE_NAME']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Transport Route</label>
                        <div class="col-md-8">
                            <select name="route_id_edit" id="route_id_edit" class="form-control" placeholder="Select Transport Route">
                                <option value="">Select Route</option>
                                <?php foreach ($routes as $route):?>
                                    <option value="<?=$route['ROUTE_ID']?>"><?=$route['ROUTE_NAME']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Vehicle Name</label>
                        <div class="col-md-8">
                            <input type="text"  name="veh_name_edit" id="veh_name_edit" class="form-control" placeholder="Enter Vehicle Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Vehicle Power</label>
                        <div class="col-md-8">
                            <input type="text" name="veh_power_edit" id='veh_power_edit' class="form-control" placeholder="Enter Vehicle Horse Power">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Vehicle #</label>
                        <div class="col-md-8">
                            <input type="text" name="veh_no_edit" id='veh_no_edit' class="form-control" placeholder="Enter Vehicle Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Seat Capacity</label>
                        <div class="col-md-8">
                            <input type="text" name="veh_capacity_edit" id='veh_capacity_edit' class="form-control" placeholder="Enter Vehicle Seat Capacity">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Driver Name</label>
                        <div class="col-md-8">
                            <input type="text" name="veh_driver_edit" id='veh_driver_edit' class="form-control" placeholder="Enter Driver Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Driver Mobile</label>
                        <div class="col-md-8">
                            <input type="text" name="veh_mobile_edit" id='veh_mobile_edit' class="form-control" placeholder="Enter Driver Mobile Number">
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