 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO</th>
            <th>Fee Title Description</th>
            <th>Fee Title Short Description</th>    
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($fee_titles)                                           
    foreach ($fee_titles as $fee_title) {                                              
    ?>             
        <tr>
            <td><?=  $fee_title['FEE_TITLE_ID'] ?></td>
            <td><?=  $fee_title['FEE_TITLE_DESC'] ?></td>
            <td><?=  $fee_title['FEE_TITLE_SHORT_DESC'] ?></td>
            <td>
               <?php if($fee_title['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Fee Title" id="<?=  $fee_title['FEE_TITLE_ID'] ?>" onclick="deleteFeeTitle(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($fee_title['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Fee Title" id="<?=  $fee_title['FEE_TITLE_ID'] ?>" onclick="activeFeeTitle(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Fee Title" id="<?=  $fee_title['FEE_TITLE_ID'] ?>" onclick="editFeeTitle(this.id);" class="btn btn-icon-only blue">
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