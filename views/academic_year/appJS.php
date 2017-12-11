<script>
	function AddAcademicYear(){
		 $("#add_academic_year").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_academic_year', function(e) {
        var data = $("#academic_year_form").serialize();       
        if($('#from').val()==""){
        	$('#from').focus();
        	$('#from').css({'background-color' : '#f39da3'});
        	return false;
        }
        if($('#to').val()==""){
        	$('#to').focus();
        	$('#to').css({'background-color' : '#f39da3'});
        	return false;
        }
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#academic_year_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/AcademicYear/store",
            success: function(data) {
            	$('#add_academic_year').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Academic Year Added Successfully</div>");
            	$('#from').css({'background-color' : '#fff'});
            	$('#to').css({'background-color' : '#fff'});
                $('#btn_loading').html('<button class="btn green"  id="save_academic_year">Save</button>');
                $('#academic_year_show').html(data);
                $('#academic_year_form')[0].reset();
            }
        });
    });
    function deleteAcademicYear(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/AcademicYear/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#academic_year_show').html(data);
                }
            })
        });
    }
    function activeAcademicYear(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/AcademicYear/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#academic_year_show').html(data);
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
    function editAcademicYear(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/AcademicYear/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_academic_year_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#from_edit').val(data.from);  
                     $('#to_edit').val(data.to);  
                     $('#description_edit').val(data.desc);               
                }
            })
       
    }
     /*update academic_year*/
    $(document).on('click', '#edit_academic_year', function(e) {
    	 if($('#from_edit').val()==""){
        	$('#from_edit').focus();
        	$('#from_edit').css({'background-color' : '#f39da3'});
        	return false;
        }
        if($('#to_edit').val()==""){
        	$('#to_edit').focus();
        	$('#to_edit').css({'background-color' : '#f39da3'});
        	return false;
        }
        var data = $("#edit_academic_year_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#academic_year_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/AcademicYear/update",
            success: function(data) {
            	$('#edit_academic_year_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Academic Year Updated Successfully</div>");
            	$('#from').css({'background-color' : '#fff'});
            	$('#to').css({'background-color' : '#fff'});
                $('#update_btn_loading').html('<button class="btn green" id="edit_academic_year">Update</button>');
                $('#academic_year_show').html(data);
                $('#edit_academic_year')[0].reset();
            }
        });
    });

</script>