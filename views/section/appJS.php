<script>
	function showAddSection(){
		 $("#add_section_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_section', function(e) {
        var data = $("#section_form").serialize();       
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#section_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/Section/store",
            success: function(data) {
            	$('#add_section_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Section Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_section">Save</button>');
                $('#section_show').html(data);
                $('#section_form')[0].reset();
            }
        });
    });
    function deleteSection(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Section/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#section_show').html(data);
                }
            })
        });
    }
    function activeSection(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Section/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#section_show').html(data);
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
    function editSection(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Section/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_section_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#desc_edit').val(data.desc);  
                     $('#short_desc_edit').val(data.short_desc);               
                }
            })
       
    }
     /*update session*/
    $(document).on('click', '#edit_section', function(e) {
        var data = $("#edit_section_form").serialize();        
        var base_url = '<?=base_url(); ?>';
         $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
         $('#section_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/Section/update",
            success: function(data) {
            	$('#edit_section_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Section Updated Successfully</div>");
                $('#update_btn_loading').html('<button class="btn green" id="edit_section">Update</button>');
                $('#section_show').html(data);
                $('#edit_section')[0].reset();
            }
        });
    });

</script>