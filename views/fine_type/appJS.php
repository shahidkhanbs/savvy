<script>
	function addFineType(){
		 $("#add_fine_type_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_fine_type', function(e) {
        var data = $("#fine_type_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fine_type_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FineType/store",
            success: function(data) {
            	$('#add_fine_type_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Fine Type Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_fine_type">Save</button>');
                $('#fine_type_show').html(data);
                $('#fine_type_form')[0].reset();
            }
        });
    });
    function deleteFineType(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FineType/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fine_type_show').html(data);
                }
            })
        });
    }
    function activeFineType(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FineType/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fine_type_show').html(data);
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
    function editFineType(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FineType/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_fine_type_modal').modal('show');  
                     $('#id').val(data.id);   
                     $('#description_edit').val(data.desc);  
                     $('#short_desc_edit').val(data.short_desc);  
                }
            })
       
    }
    $(document).on('click', '#edit_fine_type', function(e) {    	
        var data = $("#edit_fine_type_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fine_type_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FineType/update",
            success: function(data) {
            	$('#edit_fine_type_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Fine Type Updated Successfully</div>");  
                $('#update_btn_loading').html('<button class="btn green" id="edit_fine_type">Update</button>');         
                $('#fine_type_show').html(data);
                $('#edit_fine_type')[0].reset();
            }
        });
    });

</script>