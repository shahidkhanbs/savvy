<script>
	function showAddStop(){
		 $("#add_stop_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_stop', function(e) {
        var data = $("#stop_form").serialize();       
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#transport_transport_stop_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/TransportStop/store",
            success: function(data) {
            	$('#add_stop_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Transport Stop Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_stop">Save</button>');
                $('#transport_stop_show').html(data);
                $('#stop_form')[0].reset();
            }
        });
    });
    function deleteStop(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/TransportStop/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#transport_stop_show').html(data);
                }
            })
        });
    }
    function activeStop(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/TransportStop/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#transport_stop_show').html(data);
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
    function editStop(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/TransportStop/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_stop_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#desc_edit').val(data.desc);  
                     $('#short_desc_edit').val(data.short_desc);               
                     $('#km_edit').val(data.km);
                    $('#route_edit').val(data.route_id);
                }
            })
       
    }
    $(document).on('click', '#edit_stop', function(e) {
        var data = $("#edit_stop_form").serialize();        
        var base_url = '<?=base_url(); ?>';
         $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
         $('#transport_stop_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/TransportStop/update",
            success: function(data) {
            	$('#edit_stop_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Transport Stop Updated Successfully</div>");
                $('#update_btn_loading').html('<button class="btn green" id="edit_stop">Update</button>');
                $('#transport_stop_show').html(data);
                $('#edit_stop')[0].reset();
            }
        });
    });

</script>