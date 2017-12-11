 <div class="portlet-body">
    <div class="table-scrollable">
        <table class="table table-striped table-hover table-border">
            <thead>
                <tr>    
                    <th>S:NO</th>
                    <th>Roll Number</th>
                    <th>Student Full Name </th>
                </tr>
            </thead>
            <tbody>
                 <?php  
                 if($students)                                           
                    foreach ($students as $student) {                                              
                    ?>
                 <tr>              
                    <td><?= $student['STUDENT_ID'] ?>  <input name="student_id[]"   value='<?= $student['STUDENT_ID'] ?>'  type="hidden">  </td>
                    <td> <input name="roll_number[]"       value='<?= $student['ROLL_NO'] ?>'  type="text"></td>
                    <td><?= $student['FULL_NAME'] ?></td>                 
                </tr>
             <?php  }  ?>   
            </tbody>
        </table>
    </div>
</div>
