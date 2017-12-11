 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Route</th>
            <th>Stop Description</th>
            <th>Stop Short Description</th>
            <th>KM From Campus</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($stops)                                           
    foreach ($stops as $stop) {                                              
    ?>             
        <tr>
            <td><?=  $stop['STOP_ID'] ?></td>
            <td><?=  $this->Savvy_model->getReference('school_db','TRANSPORT_ROUTE','ROUTE_ID',$stop['ROUTE_ID'],'ROUTE_NAME') ?></td>
            <td><?=  $stop['STOP_NAME'] ?></td>
            <td><?=  $stop['STOP_SHORT_NAME'] ?></td>
            <td><?=  $stop['KM_FROM_CAMPUS'] ?></td>
            <td>
               <?php if($stop['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Stop" id="<?=  $stop['STOP_ID'] ?>" onclick="deleteStop(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($stop['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Stop" id="<?=  $stop['STOP_ID'] ?>" onclick="activeStop(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Stop" id="<?=  $stop['STOP_ID'] ?>" onclick="editStop(this.id);" class="btn btn-icon-only blue">
                <i class="fa fa-edit"></i>
            </a>  
            </td>
        </tr>        
    <?php } ?>       
    </tbody>
</table>