 <table class="table table-striped table-bordered table-hover " id="sample_1">
    <thead>
        <tr>
            <th>Inquiry No</th>
            <th>Display Pic</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>DOB</th>
            <th>Student No.</th>
            <th>Father No.</th>
            <th>Program</th>
        </tr>
    </thead>
    <tbody>
    <?php if($students)                                           
    foreach ($students as $student) {                                              
    ?>             
        <tr>
            <td><?=  $student['INQUIRY_ID'] ?></td>
            <td>
             <?php if($student['PIC_PATH']=='') { ?>
                 <img src="<?= base_url() ?>uploads/default_pic.png" class="img-rounded" alt="Display_pic" width="100" height="100"> 
             <?php } else{ ?>
               <img src="<?= base_url() ?>uploads/students/<?=  $student['PIC_PATH'] ?>" class="img-rounded" alt="Display_pic" width="100" height="100"> 
             <?php } ?>             
            </td>
            <td><?=  $student['FULL_NAME']  ?></td>
            <td><?=  $student['FATHER_NAME'] ?></td>
            <td><?=  $student['DOB'] ?></td>
            <td><?=  $student['MOBILE_NO'] ?></td>
            <td><?=  $student['FATHER_MOBILE_NO'] ?></td>
            <td><?=  $student['PROGRAM_NAME'] ?></td>
           
        </tr>        
    <?php } ?>       
    </tbody>
</table>
<script type="text/javascript">
   jQuery(document).ready(function() {
        TableDatatablesManaged.init();
    });
</script>