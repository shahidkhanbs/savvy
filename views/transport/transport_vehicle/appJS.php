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
            url: base_url + "savvy1/TransportVehicle/store",
            success: function(data) {
            	$('#add_stop_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Transport Vehicle Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_stop">Save</button>');
                $('#transport_stop_show').html(data);
                $('#stop_form')[0].reset();
            }
        });
    });
    function deleteVehicle(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/TransportVehicle/toggle",
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
    function activeVehicle(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/TransportVehicle/toggle",
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
    function editVehicle(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/TransportVehicle/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_stop_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#veh_type_edit').val(data.type_id);
                     $('#route_id_edit').val(data.route_id);
                     $('#veh_name_edit').val(data.veh_name);
                     $('#veh_power_edit').val(data.veh_power);
                     $('#veh_no_edit').val(data.veh_no);
                     $('#veh_capacity_edit').val(data.veh_capacity);
                     $('#veh_driver_edit').val(data.veh_driver);
                     $('#veh_mobile_edit').val(data.driver_phone);

                }
            })
       
    }
     /*update session*/
    $(document).on('click', '#edit_stop', function(e) {
        var data = $("#edit_stop_form").serialize();        
        var base_url = '<?=base_url(); ?>';
         $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
         $('#transport_stop_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/TransportVehicle/update",
            success: function(data) {
            	$('#edit_stop_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Transport Vehicle Updated Successfully</div>");
                $('#update_btn_loading').html('<button class="btn green" id="edit_stop">Update</button>');
                $('#transport_stop_show').html(data);
                $('#edit_stop')[0].reset();
            }
        });
    });

</script>