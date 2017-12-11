
 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO </th>
            <th> Name</th>
            <th> Short Name </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($program_group)                                           
    foreach ($program_group as $group) {                                              
    ?>             
        <tr>
            <td><?=  $group['GRP_ID'] ?></td>
            <td><?=  $group['GRP_NAME'] ?></td>
            <td><?=  $group['GRP_SHORT_NAME'] ?></td>
            <td>
               <?php if($group['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Program Group" id="<?=  $group['GRP_ID'] ?>" onclick="deleteProgramGroup(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($group['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Program Group" id="<?=  $group['GRP_ID'] ?>" onclick="activeProgramGroup(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Program Group" id="<?=  $group['GRP_ID'] ?>" onclick="editProgramGroup(this.id);" class="btn btn-icon-only blue">
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