<script>
	function showAddProduct(){
		 $("#add_product_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_product', function(e) {
        var data = $("#product_form").serialize();       
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#product_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/Product/store",
            success: function(data) {
            	$('#add_product_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Product Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_product">Save</button>');
                $('#product_show').html(data);
                $('#product_form')[0].reset();
            }
        });
    });
    function deleteProduct(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Product/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#product_show').html(data);
                }
            })
        });
    }
    function activeProduct(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Product/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#product_show').html(data);
                }
            })
        });
    }
    function confirmDelete(title) {
        return swal({
            title: title,
            text: "You won't be able to use this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do this!',
            cancelButtonText: 'No, cancel!'
        });
    }
    function confirmActive(title) {
        return swal({
            title: title,
            text: "Record will be available to all users !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do this!',
            cancelButtonText: 'No, cancel!'
        });
    }
    function editProduct(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Product/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_product_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#name_edit').val(data.name);  
                     $('#short_name_edit').val(data.short_name);  
                     $('#price_edit').val(data.price);               
                }
            })
       
    }
     /*update session*/
    $(document).on('click', '#edit_product', function(e) {
        var data = $("#edit_product_form").serialize();        
        var base_url = '<?=base_url(); ?>';
         $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
         $('#product_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/Product/update",
            success: function(data) {
            	$('#edit_product_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Product Updated Successfully</div>");
                $('#update_btn_loading').html('<button class="btn green" id="edit_product">Update</button>');
                $('#product_show').html(data);
                $('#edit_product')[0].reset();
            }
        });
    });

</script>