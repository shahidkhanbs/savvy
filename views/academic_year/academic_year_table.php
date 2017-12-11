 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO </th>
            <th> Academic Year From </th>
            <th> Academic Year To </th>
            <th> Academic Year Description </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($academic_year)                                           
    foreach ($academic_year as $academic) {                                              
    ?>             
        <tr>
            <td><?=  $academic['AYID'] ?></td>
            <td><?=  $academic['AY_FROM'] ?></td>
            <td><?=  $academic['AY_TO'] ?></td>
            <td><?=  $academic['AY_DESC'] ?></td>
            <td>
               <?php if($academic['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Academic Year" id="<?=  $academic['AYID'] ?>" onclick="deleteAcademicYear(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($academic['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Academic Year" id="<?=  $academic['AYID'] ?>" onclick="activeAcademicYear(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Academic Year" id="<?=  $academic['AYID'] ?>" onclick="editAcademicYear(this.id);" class="btn btn-icon-only blue">
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