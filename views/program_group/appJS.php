<script>
	function showAddProgramGroup(){
		 $("#add_program_group_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_program_group', function(e) {
        var data = $("#program_group_form").serialize();       
        if($('#name').val()==""){
        	$('#name').focus();
        	$('#name').css({'background-color' : '#f39da3'});
        	return false;
        }
        if($('#short_name').val()==""){
        	$('#short_name').focus();
        	$('#short_name').css({'background-color' : '#f39da3'});
        	return false;
        }
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#program_group_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');  
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/ProgramGroup/store",
            success: function(data) {
            	$('#add_program_group_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Program Group Added Successfully</div>");
            	$('#btn_loading').html('<button class="btn green"  id="save_program_group">Save</button>');
                $('#program_group_show').html(data);
                $('#program_group_form')[0].reset();

            }
        });
    });

    function deleteProgramGroup(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/ProgramGroup/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#program_group_show').html(data);
                }
            })
        });
    }
    function activeProgramGroup(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/ProgramGroup/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#program_group_show').html(data);
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


    function editProgramGroup(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/ProgramGroup/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_program_group_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#name_edit').val(data.name);  
                     $('#short_name_edit').val(data.short_name);               
                }
            })
       
    }
     /*update session*/
    $(document).on('click', '#edit_program_group', function(e) {
    	 if($('#name_edit').val()==""){
        	$('#name_edit').focus();
        	$('#name_edit').css({'background-color' : '#f39da3'});
        	return false;
        }
        if($('#short_name_edit').val()==""){
        	$('#short_name_edit').focus();
        	$('#short_name_edit').css({'background-color' : '#f39da3'});
        	return false;
        }
        var data = $("#edit_program_group_form").serialize();        
        var base_url = '<?=base_url(); ?>';
         $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#program_group_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">'); 
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/ProgramGroup/update",
            success: function(data) {
            	$('#edit_program_group_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Program Group Updated Successfully</div>");
            	$('#name_edit').css({'background-color' : '#fff'});
            	$('#short_name_edit').css({'background-color' : '#fff'});
                $('#update_btn_loading').html('<button class="btn green" id="edit_program_group">Update</button>');
                $('#program_group_show').html(data);
                $('#edit_program_group_form')[0].reset();
            }
        });
    });

</script>