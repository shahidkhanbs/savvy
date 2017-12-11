
 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO </th>
            <th>Program</th>
            <th>Program Short Name</th>
            <th>Program Section</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($program_sections)                                           
    foreach ($program_sections as $program_section) {                                              
    ?>             
        <tr>
            <td><?=  $program_section['TRNNO'] ?></td>
            <td><?=  $program_section['PROGRAM_LINE_NAME'] ?></td>
            <td><?=  $program_section['PROGRAM_LINE_SHORT_NAME'] ?></td>
            <td><?=  $program_section['PS_NAME'] ?></td>
            <td>
               <?php if($program_section['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Program Section" id="<?=  $program_section['TRNNO'] ?>" onclick="deleteProgramSection(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($program_section['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Program Section" id="<?=  $program_section['TRNNO'] ?>" onclick="activeProgramSection(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Program Section" id="<?=  $program_section['TRNNO'] ?>" onclick="editProgramSection(this.id);" class="btn btn-icon-only blue">
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