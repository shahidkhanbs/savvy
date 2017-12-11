<script>
	function showAddFeeGroup(){
		 $("#add_fee_group_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_fee_group', function(e) {
        var data = $("#fee_group_form").serialize();      
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fee_group_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeGroup/store",
            success: function(data) {
            	$('#add_fee_group_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Fee Group Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_fee_group">Save</button>');
                $('#fee_group_show').html(data);
                $('#fee_group_form')[0].reset();

            }
        });
    });

    function deleteFeeGroup(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeGroup/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fee_group_show').html(data);
                }
            })
        });
    }
    function activeFeeGroup(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeGroup/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fee_group_show').html(data);
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


    function editFeeGroup(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeGroup/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_fee_group_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#desc_edit').val(data.desc);  
                     $('#short_desc_edit').val(data.short_desc);               
                     $('#min_edit').val(data.min);               
                     $('#max_edit').val(data.max);               
                }
            })
       
    }
    $(document).on('click', '#edit_fee_group', function(e) {
    	
        var data = $("#edit_fee_group_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fee_group_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeGroup/update",
            success: function(data) {
            	$('#edit_fee_group_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Fee Group Updated Successfully</div>");
                 var base_url = '<?=base_url(); ?>';
                $('#update_btn_loading').html('<button class="btn green" id="edit_fee_group">Update</button>');
                $('#fee_group_show').html(data);
                $('#edit_fee_group_form')[0].reset();
            }
        });
    });

</script>