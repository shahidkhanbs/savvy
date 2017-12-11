
 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO </th>
            <th> Description</th>
            <th> Short Description </th>
            <th>Minimum Percentage </th>
            <th> Maximum Percentage </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($fee_groups)                                           
    foreach ($fee_groups as $group) {                                              
    ?>             
        <tr>
            <td><?=  $group['FEE_GRP_ID'] ?></td>
            <td><?=  $group['FEE_GRP_DESC'] ?></td>
            <td><?=  $group['FEE_GRP_SHORT_DESC'] ?></td>
            <td><?=  $group['MIN_PERCENT'] ?></td>
            <td><?=  $group['MAX_PERCENT'] ?></td>
            <td>
               <?php if($group['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Fee Group" id="<?=  $group['FEE_GRP_ID'] ?>" onclick="deleteFeeGroup(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($group['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Fee Group" id="<?=  $group['FEE_GRP_ID'] ?>" onclick="activeFeeGroup(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Fee Group" id="<?=  $group['FEE_GRP_ID'] ?>" onclick="editFeeGroup(this.id);" class="btn btn-icon-only blue">
                <i class="fa fa-edit"></i>
            </a>  
            </td>
        </tr>        
    <?php } ?>       
    </tbody>
</table>
<script type="text/javascript">
   jQuery(document).ready(function() {
        TableDatatablesManaged.init();
    });
</script>