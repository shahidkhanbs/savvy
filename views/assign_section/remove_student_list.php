 <div class="portlet-body">
    <div class="table-scrollable">
        <table class="table table-striped table-hover table-border">
            <thead>
                <tr>
                    <th>Check for Deletion</th>
                    <th>S:NO</th>
                    <th>Roll Number</th>
                    <th>Student Full Name </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 <?php  
                 if($students)                                           
                    foreach ($students as $student) {                                              
                    ?>
                 <tr>
                    <td>                     
                      <input name="student_id[]"   value='<?= $student['STUDENT_ID'] ?>'  type="checkbox">        
                    </td>
                    <td><?= $student['STUDENT_ID'] ?></td>
                    <td><?= $student['ROLL_NO'] ?></td>
                    <td><?= $student['FULL_NAME'] ?></td>
                    <td>                  
                       <a href="javascript:;" title="Delete Section" id="<?=  $student['STUDENT_ID'] ?>" onclick="deleteSection(this.id);" class="btn btn-icon-only red">
                          <i class="fa fa-trash"></i>
                       </a>            
                  </td>                  
                </tr>
             <?php  }  ?>   
            </tbody>
        </table>
    </div>
</div>
