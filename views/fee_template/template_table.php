 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO</th>
            <th>Template Date</th>
            <th>Template Description</th>
            <th>Short Description</th>
            <th>Admission Fee</th>
            <th>Registration Fee</th>
            <th>Security Fee</th>
            <th>Annual Fee</th>
            <th>Tution Fee</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($templates)                                           
    foreach ($templates as $template) {                                              
    ?>             
        <tr>
            <td><?=  $template['TEMPLATE_ID'] ?></td>
            <td><?=  $template['TEMPLATE_DATE'] ?></td>
            <td><?=  $template['FEE_TITLE_DESC'] ?></td>
            <td><?=  $template['FEE_TITLE_SHORT_DESC'] ?></td>
            <td><?=  $template['ADMISSION_FEE'] ?></td>
            <td><?=  $template['REGISTRATION_FEE'] ?></td>
            <td><?=  $template['SECURITY_FEE'] ?></td>
            <td><?=  $template['ANNUAL_FEE'] ?></td>
            <td><?=  $template['TUTION_FEE'] ?></td>
            <td><?=  $template['REMARKS'] ?></td>
            <td>
               <?php if($template['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Template" id="<?=  $template['TEMPLATE_ID'] ?>" onclick="deleteTemplate(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($template['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Template" id="<?=  $template['TEMPLATE_ID'] ?>" onclick="activeTemplate(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Template" id="<?=  $template['TEMPLATE_ID'] ?>" onclick="editTemplate(this.id);" class="btn btn-icon-only blue">
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