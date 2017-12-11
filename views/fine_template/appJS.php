<script>
	function AddFineTemplate(){
		 $("#add_fine_template_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_fine_template', function(e) {
        var data = $("#fine_template_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fine_template_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FineTemplate/store",
            success: function(data) {
            	$('#add_fine_template_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Fine Template Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_fine_template">Save</button>');
                $('#fine_template_show').html(data);
                $('#fine_template_form')[0].reset();
            }
        });
    });
    function deleteFineTemplate(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FineTemplate/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fine_template_show').html(data);
                }
            })
        });
    }
    function activeFineTemplate(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FineTemplate/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fine_template_show').html(data);
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
    function editFineTemplate(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FineTemplate/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_fine_template_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#type_edit').val(data.type);  
                     $('#fine_fee_edit').val(data.fee);  
                     $('#remarks_edit').val(data.remarks);         
                }
            })
       
    }
    $(document).on('click', '#edit_fine_template', function(e) {    	
        var data = $("#edit_fine_template_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fine_template_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FineTemplate/update",
            success: function(data) {
            	$('#edit_fine_template_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Fine Template Updated Successfully</div>");  
                $('#update_btn_loading').html('<button class="btn green" id="edit_fine_template">Update</button>');         
                $('#fine_template_show').html(data);
                $('#edit_fine_template')[0].reset();
            }
        });
    });

</script>