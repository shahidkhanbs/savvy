 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Section Description</th>
            <th>Section Short Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($sections)                                           
    foreach ($sections as $section) {                                              
    ?>             
        <tr>
            <td><?=  $section['SECTION_ID'] ?></td>
            <td><?=  $section['SECTION_DESC'] ?></td>
            <td><?=  $section['SECTION_SHORT_DESC'] ?></td>
            <td>
               <?php if($section['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Section" id="<?=  $section['SECTION_ID'] ?>" onclick="deleteSection(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($section['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Section" id="<?=  $section['SECTION_ID'] ?>" onclick="activeSection(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Section" id="<?=  $section['SECTION_ID'] ?>" onclick="editSection(this.id);" class="btn btn-icon-only blue">
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