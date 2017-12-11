
 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO </th>
            <th>Program Line Name</th>
            <th>Program Line Short Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($program_codes)                                           
    foreach ($program_codes as $code) {                                              
    ?>             
        <tr>
            <td><?=  $code['PROGRAM_LINE_ID'] ?></td>
            <td><?=  $code['PROGRAM_LINE_NAME'] ?></td>
            <td><?=  $code['PROGRAM_LINE_SHORT_NAME'] ?></td>
            <td>
               <?php if($code['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Program Code" id="<?=  $code['PROGRAM_LINE_ID'] ?>" onclick="deleteProgramCode(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($code['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Program Code" id="<?=  $code['PROGRAM_LINE_ID'] ?>" onclick="activeProgramCode(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Program Code" id="<?=  $code['PROGRAM_LINE_ID'] ?>" onclick="editProgramCode(this.id);" class="btn btn-icon-only blue">
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