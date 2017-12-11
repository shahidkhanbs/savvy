 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Product Name</th>
            <th>Product Short Name</th>
            <th>Product Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($products)                                           
    foreach ($products as $product) {                                              
    ?>             
        <tr>
            <td><?=  $product['PRODUCT_ID'] ?></td>
            <td><?=  $product['PRODUCT_NAME'] ?></td>
            <td><?=  $product['PRODUCT_SHORT_NAME'] ?></td>
            <td><?=  $product['PRODUCT_PRICE'] ?></td>
            <td>
               <?php if($product['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Product" id="<?=  $product['PRODUCT_ID'] ?>" onclick="deleteProduct(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($product['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Product" id="<?=  $product['PRODUCT_ID'] ?>" onclick="activeProduct(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Product" id="<?=  $product['PRODUCT_ID'] ?>" onclick="editProduct(this.id);" class="btn btn-icon-only blue">
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