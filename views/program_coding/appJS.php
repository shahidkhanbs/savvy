<script>
	function AddProgramCode(){
		 $("#add_program_coding_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_program_coding', function(e) {
        var data = $("#program_coding_form").serialize();       
        var base_url = '<?=base_url(); ?>';
         $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#program_coding_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/ProgramCoding/store",
            success: function(data) {
            	$('#add_program_coding_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Program Coding Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_program_coding">Save</button>');
                $('#program_coding_show').html(data);
                $('#program_coding_form')[0].reset();

            }
        });
    });

    function deleteProgramCode(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/ProgramCoding/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#program_coding_show').html(data);
                }
            })
        });
    }
    function activeProgramCode(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/ProgramCoding/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#program_coding_show').html(data);
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


    function editProgramCode(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/ProgramCoding/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_program_coding_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#program_edit').val(data.program);                 
                     $('#gender_edit').val(data.gender);                 
                     $('#shift_edit').val(data.shift);                 
                     $('#medium_edit').val(data.medium);                 
                }
            })
       
    }
    $(document).on('click', '#edit_program_coding', function(e) {
        var data = $("#edit_program_coding_form").serialize();        
        var base_url = '<?=base_url(); ?>'; 
         $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#program_coding_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/ProgramCoding/update",
            success: function(data) {
            	$('#edit_program_coding_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Program Coding Updated Successfully</div>");
            	$('#update_btn_loading').html('<button class="btn green"  id="save_academic_year">Save</button>');
                $('#program_coding_show').html(data);
                $('#edit_program_coding_form')[0].reset();
            }
        });
    });

</script>