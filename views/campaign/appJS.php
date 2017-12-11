<script>
	function showAddCampaign(){
		 $("#add_campaign_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_campaign', function(e) {
        var data = $("#campaign_form").serialize();      
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#campaign_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/Campaign/store",
            success: function(data) {
            	$('#add_campaign_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Campaign Added Successfully</div>");
            	$('#btn_loading').html('<button class="btn green"  id="save_campaign">Save</button>');
                $('#campaign_show').html(data);
                $('#campaign_form')[0].reset();

            }
        });
    });
    function deleteCampaign(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Campaign/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#campaign_show').html(data);
                }
            })
        });
    }
    function activeCampaign(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Campaign/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#campaign_show').html(data);
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
    function editCampaign(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Campaign/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_campaign_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#name_edit').val(data.name);  
                     $('#short_name_edit').val(data.short_name);  
                     $('#start_date_edit').val(data.start_date);               
                     $('#end_date_edit').val(data.end_date);                             
                     $('#academic_year_edit').val(data.academic_year);                             
                }
            })       
    }
    $(document).on('click', '#update_campaign', function(e) {    	
        var data = $("#edit_campaign_form").serialize();
        var base_url = '<?=base_url(); ?>';  
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#campaign_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');         
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/Campaign/update",
            success: function(data) {
            	$('#edit_campaign_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Campaign Updated Successfully</div>");
                $('#update_btn_loading').html('<button class="btn green" id="update_campaign">Update</button>');
                $('#campaign_show').html(data);
                $('#edit_campaign_form')[0].reset();
            }
        });
    });

</script>