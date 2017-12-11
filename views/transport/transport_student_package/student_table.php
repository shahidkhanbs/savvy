 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Form No.</th>
            <th>Adm. Fee</th>
            <th>Misc. Fee</th>
            <th>Session. Fee</th>
            <th>Total Fee</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($students):
        $i = 1;
    foreach ($students as $student) {
    ?>             
        <tr id="<?='id-'.$i?>">
            <td><?=$i;?></td>
            <td><?=  $student['FULL_NAME']; ?></td>
            <td><?=  $student['FATHER_NAME'] ?></td>
            <td><?=  $student['FORM_NO'] ?></td>
            <td class="text-right"><?=  number_format(($student['ADMISSION_FEE']-$student['OF_ADMISSION_DISCOUNT']-$student['PR_ADMISSION_DISCOUNT']),'0','.',',') ?></td>
            <td class="text-right"><?=  number_format(($student['MISC_FEE']-$student['OF_MISC_DISCOUNT']-$student['PR_MISC_DISCOUNT']),'0','.',',') ?></td>
            <td class="text-right"><?=  number_format(($student['SESSION_FEE']-$student['OF_SESSION_DISCOUNT']-$student['PR_SESSION_DISCOUNT']),'0','.',',') ?></td>
            <td class="text-right"><?=  number_format($student['PAYABLE_FEE'],'0','.',',') ?></td>
            <td class="text-center">
                <?php if($student['INSTALLMENT_COUNT']==0){ ?>
             <a href="javascript:;" title="Add Student Installment" id="<?=  $student['STUDENT_ID'] ?>" onclick="addInstallment(this.id);" class="btn btn-icon-only green">
                 <i class="fa fa-plus" aria-hidden="true"></i>
             </a>
                <?php } else{ ?>
             <a href="javascript:;" title="View Student Detail" id="<?=  $student['STUDENT_ID'] ?>" onclick="showStudent(this.id);" class="btn btn-icon-only green">
                    <i class="fa fa-eye" aria-hidden="true"></i>
             </a>
                <?php } ?>
            </td>
        </tr>
        <?php $i++; ?>
    <?php } ?>
    <?php endif; ?>
    </tbody>
</table>