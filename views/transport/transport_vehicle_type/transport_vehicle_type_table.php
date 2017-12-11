 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Veh. Name</th>
            <th>Veh. Short Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($stops)                                           
    foreach ($stops as $stop) {                                              
    ?>             
        <tr>
            <td><?=  $stop['VEH_TYPE_ID'] ?></td>
            <td><?=  $stop['VEH_TYPE_NAME'] ?></td>
            <td><?=  $stop['VEH_TYPE_SHORT_NAME'] ?></td>
            <td>
               <?php if($stop['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Stop" id="<?=  $stop['VEH_TYPE_ID'] ?>" onclick="deleteVehicleType(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($stop['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Stop" id="<?=  $stop['VEH_TYPE_ID'] ?>" onclick="activeVehicleType(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Stop" id="<?=  $stop['VEH_TYPE_ID'] ?>" onclick="editVehicleType(this.id);" class="btn btn-icon-only blue">
                <i class="fa fa-edit"></i>
            </a>  
            </td>
        </tr>        
    <?php } ?>       
    </tbody>
</table>