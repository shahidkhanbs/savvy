 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO</th>
            <th>Fine Template Date</th>
            <th>Fine Description</th>
            <th>Fine Fee</th>
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
            <td><?=  $template['FINE_TYPE_DESC'] ?></td>
            <td><?=  $template['FINE_FEE'] ?></td>
            <td><?=  $template['REMARKS'] ?></td>
            <td>
               <?php if($template['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Fine Template" id="<?=  $template['TEMPLATE_ID'] ?>" onclick="deleteFineTemplate(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($template['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Fine Template" id="<?=  $template['TEMPLATE_ID'] ?>" onclick="activeFineTemplate(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Fine Template" id="<?=  $template['TEMPLATE_ID'] ?>" onclick="editFineTemplate(this.id);" class="btn btn-icon-only blue">
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