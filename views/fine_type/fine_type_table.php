 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO</th>
            <th>Fine Type Description</th>
            <th>Fine Type Short Description</th>    
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($fine_types)                                           
    foreach ($fine_types as $fine_type) {                                              
    ?>             
        <tr>
            <td><?=  $fine_type['FINE_TYPE_ID'] ?></td>
            <td><?=  $fine_type['FINE_TYPE_DESC'] ?></td>
            <td><?=  $fine_type['FINE_TYPE_SHORT_DESC'] ?></td>
            <td>
               <?php if($fine_type['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Fine Type" id="<?=  $fine_type['FINE_TYPE_ID'] ?>" onclick="deleteFineType(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($fine_type['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Fine Type" id="<?=  $fine_type['FINE_TYPE_ID'] ?>" onclick="activeFineType(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Fine Type" id="<?=  $fine_type['FINE_TYPE_ID'] ?>" onclick="editFineType(this.id);" class="btn btn-icon-only blue">
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