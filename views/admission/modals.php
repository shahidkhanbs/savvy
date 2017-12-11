<div class="modal fade" id="location_modal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Location</h4>
        </div>
        <div class="modal-body">
             <form class="form-horizontal" role="form">
             <div color="red" id="location_error" style="text-align: center;"></div>
                   </br>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="addlocation">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="location" placeholder="location Name"/>
                    </div>
                  </div>
                   <div class="form-group">
                    <label  class="col-sm-2 control-label" for="addlocationshort">Location Short Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="location_short" placeholder="location Short Code"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" onClick="addLocation();" class="btn btn-default">Save</button>
                    </div>
                  </div>
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default closemodal" onClick="hideModal();">Close</button>
        </div>
      </div>   
    </div>
  </div>