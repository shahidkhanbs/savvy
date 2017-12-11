<script>
	function showAddFeeTitle(){
		 $("#add_fee_title_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_fee_title', function(e) {
        var data = $("#fee_title_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fee_title_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeTitle/store",
            success: function(data) {
            	$('#add_fee_title_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Fee Title Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_fee_title">Save</button>');
                $('#fee_title_show').html(data);
                $('#fee_title_form')[0].reset();
            }
        });
    });
    function deleteFeeTitle(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeTitle/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fee_title_show').html(data);
                }
            })
        });
    }
    function activeFeeTitle(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeTitle/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fee_title_show').html(data);
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
    function editFeeTitle(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeTitle/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_fee_title_modal').modal('show');  
                     $('#id').val(data.id);   
                     $('#description_edit').val(data.desc);  
                     $('#short_desc_edit').val(data.short_desc);  
                }
            })
       
    }
    $(document).on('click', '#edit_fee_title', function(e) {    	
        var data = $("#edit_fee_title_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fee_title_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeTitle/update",
            success: function(data) {
            	$('#edit_fee_title_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Fee Title Updated Successfully</div>");  
                $('#update_btn_loading').html('<button class="btn green" id="edit_fee_title">Update</button>');         
                $('#fee_title_show').html(data);
                $('#edit_fee_title')[0].reset();
            }
        });
    });

</script>