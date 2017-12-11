 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th> S.NO</th>
            <th>Transaction Date</th>
            <th>Fee Description</th>
            <th>Admission Discount</th>
            <th>Registration Discount</th>
            <th>Security Discount</th>
            <th>Annual Discount</th>
            <th>Tution Discount</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($discounts)                                           
    foreach ($discounts as $discount) {                                              
    ?>             
        <tr>
            <td><?=  $discount['TRNNO'] ?></td>
            <td><?=  $discount['TRNDATE'] ?></td>
            <td><?=  $discount['FEE_GRP_DESC'] ?></td>
            <td><?=  $discount['ADMISSION_DISCOUNT'] ?></td>
            <td><?=  $discount['REGISTRATION_DISCOUNT'] ?></td>
            <td><?=  $discount['SECURITY_DISCOUNT'] ?></td>
            <td><?=  $discount['ANNUAL_DISCOUNT'] ?></td>
            <td><?=  $discount['TUTION_DISCOUNT'] ?></td>
            <td><?=  $discount['REMARKS'] ?></td>
            <td>
               <?php if($discount['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Discount Polciy" id="<?=  $discount['TRNNO'] ?>" onclick="deleteDiscountPolciy(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($discount['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Discount Polciy" id="<?=  $discount['TRNNO'] ?>" onclick="activeDiscountPolciy(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Discount Polciy" id="<?=  $discount['TRNNO'] ?>" onclick="editDiscountPolciy(this.id);" class="btn btn-icon-only blue">
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