<div class="row">
    <table class="table table-hover table-striped table-bordered">
        <tbody>
        <tr style="font-size: 10px">
            <td colspan="2"><img width="60" src="<?php echo base_url();?>assets/assets/img/logo-big.png" /><b style="  font-size: 20px;    margin-left: 10px;"></b></td>
            <td colspan="4"><h4><strong>Student Information</strong></h4></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><b><?php echo $student[0]['FULL_NAME']; ?></b></td>
            <td>Roll No</td>
            <td><b><?= $student[0]['STUDENT_ID']; ?></td>
            <td rowspan="4" style="width:150px;" ><img width='150' src="<?php echo base_url();?>uploads/students/<?=$student[0]['PIC_PATH']?>"></td>
        </tr>
        <tr>
            <td>Form No</td>
            <td><?php echo $student[0]['STUDENT_ID']; ?></td>
            <td>Class</td>
            <td><b><?php echo $student[0]['PROGRAM_LINE_SHORT_NAME']; ?></b></td>
        </tr>
        <tr>
            <td>Father's Name</td>
            <td><b><?php echo $student[0]['FATHER_NAME']; ?></b></td>
            <td>Contact Number</td>
            <td><?php echo $student[0]['MOBILE_NO']; ?></td>
        </tr>
        </tbody></table>
</div>
<label><h4><strong>Student Location</strong></h4></label>
<div class="row">
    <table class="table table-hover table-striped table-bordered">
        <tr>
            <th>Student Stop</th>
            <th>Vehicle</th>
            <th>Package Amount</th>
        </tr>
        <tr>
            <td>
                <select class="select2 form-control ins_fine" name="student_stop" id="student_stop" onchange="getTransportFee(this.value)">
                    <option value="">Select Stop</option>
                    <?php foreach ($stops as $stop): ?>
                        <option value="<?=$stop['STOP_ID']?>"><?=$stop['STOP_NAME']?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <select class="form-control ins_payable" name="vehicle_id" id="vehicle_id">
                <option value="">Select Vehicle</option>
                </select>
            </td>
            <td><input type="text" readonly class="form-control ins_payable" name="pkg_amt" id="pkg_amt" value=""></td>
        </tr>

    </table>
</div>
<label><h4><strong>Student Transport Package</strong></h4></label>
<div class="row">
    <table class="table table-hover table-striped table-bordered">
        <tr>
            <th>Discount</th>
            <th>Extra Amount</th>
            <th>Payable Amount</th>
        </tr>
        <tr>
            <td><input type="text" class="form-control ins_fine" name="discount_amt" id="discount_amt" value=""></td>
            <td><input type="text" class="form-control ins_payable" name="extra_amt" id="extra_amt" value=""></td>
            <td><input type="text" readonly class="form-control ins_payable" name="payable_amt" id="payable_amt" value=""></td>
        </tr>

    </table>
</div>

