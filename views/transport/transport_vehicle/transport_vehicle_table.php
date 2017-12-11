 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Veh. Type</th>
            <th>Route</th>
            <th>Veh. No</th>
            <th>Veh. Name</th>
            <th>Veh. Driver</th>
            <th>Driver Mobile</th>
            <th>Veh. Power</th>
            <th>Veh. Capacity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($stops)                                           
    foreach ($stops as $stop) {                                              
    ?>             
        <tr>
            <td><?=  $stop['VEHICLE_ID'] ?></td>
            <td><?=  $this->Savvy_model->getReference('school_db','TRANSPORT_VEHICLE_TYPE','VEH_TYPE_ID',$stop['VEH_TYPE_ID'],'VEH_TYPE_NAME') ?></td>
            <td><?=  $this->Savvy_model->getReference('school_db','TRANSPORT_ROUTE','ROUTE_ID',$stop['ROUTE_ID'],'ROUTE_NAME') ?></td>
            <td><?=  $stop['VEHICLE_NO'] ?></td>
            <td><?=  $stop['VEHICLE_NAME'] ?></td>
            <td><?=  $stop['DRIVER_NAME'] ?></td>
            <td><?=  $stop['DRIVER_CELL_NO'] ?></td>
            <td><?=  $stop['VEHICLE_HPOWER'] ?></td>
            <td><?=  $stop['SEAT_CAPACITY'] ?></td>
            <td>
               <?php if($stop['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Stop" id="<?=  $stop['VEHICLE_ID'] ?>" onclick="deleteVehicle(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($stop['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Stop" id="<?=  $stop['VEHICLE_ID'] ?>" onclick="activeVehicle(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Stop" id="<?=  $stop['VEHICLE_ID'] ?>" onclick="editVehicle(this.id);" class="btn btn-icon-only blue">
                <i class="fa fa-edit"></i>
            </a>  
            </td>
        </tr>        
    <?php } ?>       
    </tbody>
</table>