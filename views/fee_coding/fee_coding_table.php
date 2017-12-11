 <table class="table table-striped table-bordered table-hover" id="sample_1">
    <thead>
        <tr>
            <th> S.NO</th>
            <th>Fee Date</th>
            <th>Program</th>
            <th>Fee Template</th>
            <th>Fee Group</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($fee_coding)                                           
    foreach ($fee_coding as $code) {                                              
    ?>             
        <tr>
            <td><?=  $code['FEE_ID'] ?></td>
            <td><?=  $code['FEE_DATE'] ?></td>
            <td><?=  $code['PROGRAM_NAME'] ?></td>
            <td><?=  $code['FEE_TITLE_DESC'] ?></td>
            <td><?=  $code['FEE_GRP_DESC'] ?></td>        
            <td><?=  $code['REMARKS'] ?></td>
            <td>
               <?php if($code['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete FeeCoding" id="<?=  $code['FEE_ID'] ?>" onclick="deleteFeeCoding(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($code['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active FeeCoding" id="<?=  $code['FEE_ID'] ?>" onclick="activeFeeCoding(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit FeeCoding" id="<?=  $code['FEE_ID'] ?>" onclick="editFeeCoding(this.id);" class="btn btn-icon-only blue">
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