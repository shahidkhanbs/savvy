
 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Program Name</th>
            <th>Program Short Name</th>
            <th>Program Group</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($programs)                                           
    foreach ($programs as $program) {                                              
    ?>             
        <tr>
            <td><?=  $program['PROGRAM_ID'] ?></td>
            <td><?=  $program['PROGRAM_NAME'] ?></td>
            <td><?=  $program['PROGRAM_SHORT_NAME'] ?></td>
            <td><?=  $program['GRP_NAME'] ?></td>    
        
            <td>
               <?php if($program['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Program" id="<?=  $program['PROGRAM_ID'] ?>" onclick="deleteProgram(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($program['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Program" id="<?=  $program['PROGRAM_ID'] ?>" onclick="activeProgram(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Program" id="<?=  $program['PROGRAM_ID'] ?>" onclick="editProgram(this.id);" class="btn btn-icon-only blue">
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