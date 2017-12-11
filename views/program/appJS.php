<script>    
	function showAddProgram(){
		 $("#add_program_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_program', function(e) {
        var data = $("#program_form").serialize(); 
        var base_url = '<?=base_url(); ?>';      
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#program_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');    
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/Program/store",
            success: function(data) {
            	$('#add_program_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Program Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_program">Save</button>');
                $('#program_show').html(data);
                $('#program_form')[0].reset();

            }
        });
    });

    function deleteProgram(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Program/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#program_show').html(data);
                }
            })
        });
    }
    function activeProgram(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Program/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#program_show').html(data);
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

    function editProgram(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Program/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_program_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#name_edit').val(data.name);  
                     $('#short_name_edit').val(data.short_name);                               
                     $('#group_edit').val(data.group);                             
                }
            })
       
    }

    $(document).on('click', '#update_program', function(e) {    	
        var data = $("#edit_program_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#program_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">'); 
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/Program/update",
            success: function(data) {
            	$('#edit_program_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Program Updated Successfully</div>");
                 $('#update_btn_loading').html('<button class="btn green"  id="update_program">Update</button>');
                $('#program_show').html(data);
                $('#edit_program_form')[0].reset();
            }
        });
    });

</script>