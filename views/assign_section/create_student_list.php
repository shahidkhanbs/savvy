 <div class="portlet-body">
    <div class="table-scrollable">
        <table class="table table-striped table-hover table-border">
            <thead>
                <tr>
                    <th>Selected</th>
                    <th>Roll Number</th>
                    <th>Student Full Name </th>
                </tr>
            </thead>
            <tbody>
                 <?php  
                 $limit;
                 $count=1;
                 if($students)                                           
                    foreach ($students as $student) {                                              
                    ?>
                <tr>
                    <td>                     
                      <input name="student_id[]"   value='<?= $student['STUDENT_ID'] ?>' <?= ($count<=$limit)?'checked':''?> type="checkbox">        
                    </td>
                    <td>    
                      <input   name="roll_number[]"  value="<?= ($count<=$limit)?$count:''?>"  type="text">                        
                    </td>
                    <td><?= $student['FULL_NAME'] ?></td>                  
                </tr>
             <?php $count++; }  ?>   
            </tbody>
        </table>
    </div>
</div>
