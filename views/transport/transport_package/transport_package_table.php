 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Stop</th>
            <th>Package Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($packages)
    foreach ($packages as $package) {
    ?>             
        <tr>
            <td><?=  $package['TRNNO'] ?></td>
            <td><?=  $this->Savvy_model->getReference('school_db','TRANSPORT_STOP','STOP_ID',$package['STOP_ID'],'STOP_NAME') ?></td>
            <td><?=  $package['AMOUNT'] ?></td>
            <td>
               <?php if($package['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Stop" id="<?=  $package['STOP_ID'] ?>" onclick="deletePackage(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($package['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Stop" id="<?=  $package['STOP_ID'] ?>" onclick="activePackage(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Stop" id="<?=  $package['STOP_ID'] ?>" onclick="editPackage(this.id);" class="btn btn-icon-only blue">
                <i class="fa fa-edit"></i>
            </a>  
            </td>
        </tr>        
    <?php } ?>
    </tbody>
</table>