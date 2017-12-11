<script>
	function showAddTemplate(){
		 $("#add_template_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_template', function(e) {
        var data = $("#template_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#template_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeTemplate/store",
            success: function(data) {
            	$('#add_template_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Template Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_template">Save</button>');
                $('#template_show').html(data);
                $('#template_form')[0].reset();
            }
        });
    });
    function deleteTemplate(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeTemplate/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#template_show').html(data);
                }
            })
        });
    }
    function activeTemplate(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeTemplate/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#template_show').html(data);
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
    function editTemplate(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeTemplate/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_template_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#title_edit').val(data.title);  
                     $('#adm_fee_edit').val(data.adm_fee);  
                     $('#reg_fee_edit').val(data.reg_fee);  
                     $('#security_fee_edit').val(data.sec_fee);  
                     $('#annual_fee_edit').val(data.annual_fee);  
                     $('#tution_fee_edit').val(data.tution_fee);  
                     $('#remarks_edit').val(data.remarks);           
                              
                }
            })
       
    }
    $(document).on('click', '#edit_template', function(e) {    	
        var data = $("#edit_template_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#template_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeTemplate/update",
            success: function(data) {
            	$('#edit_template_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Template Updated Successfully</div>");  
                $('#update_btn_loading').html('<button class="btn green" id="edit_template">Update</button>');         
                $('#template_show').html(data);
                $('#edit_template')[0].reset();
            }
        });
    });

</script>