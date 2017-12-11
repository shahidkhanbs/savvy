<script>
	function AddProgramSection(){
		 $("#add_program_section_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_program_section', function(e) {
        var data = $("#program_section_form").serialize();       
        var base_url = '<?=base_url(); ?>';
         $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#program_section_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/ProgramSection/store",
            success: function(data) {
            	$('#add_program_section_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Program Section Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_program_section">Save</button>');
                $('#program_section_show').html(data);
                $('#program_section_form')[0].reset();

            }
        });
    });

    function deleteProgramSection(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/ProgramSection/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#program_section_show').html(data);
                }
            })
        });
    }
    function activeProgramSection(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/ProgramSection/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#program_section_show').html(data);
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


    function editProgramSection(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/ProgramSection/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_program_section_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#program_edit').val(data.program);                 
                     $('#section_edit').val(data.section);                 
                     $('#remarks_edit').val(data.remarks);                                 
                }
            })
       
    }
    $(document).on('click', '#edit_program_section', function(e) {
        var data = $("#edit_program_section_form").serialize();        
        var base_url = '<?=base_url(); ?>'; 
         $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#program_section_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/ProgramSection/update",
            success: function(data) {
            	$('#edit_program_section_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Program Section Updated Successfully</div>");
            	$('#update_btn_loading').html('<button class="btn green"  id="edit_program_section">Update</button>');
                $('#program_section_show').html(data);
                $('#edit_program_section_form')[0].reset();
            }
        });
    });

</script>