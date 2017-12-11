<script>
	function showAddDiscountPolicy(){
		 $("#add_discount_policy_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_discount_policy', function(e) {
        var data = $("#discount_policy_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fee_discount_policy_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeDiscountPolicy/store",
            success: function(data) {
            	$('#add_discount_policy_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Discount Policy Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_discount_policy">Save</button>');
                $('#fee_discount_policy_show').html(data);
                $('#discount_policy_form')[0].reset();
            }
        });
    });
    function deleteDiscountPolciy(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeDiscountPolicy/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fee_discount_policy_show').html(data);
                }
            })
        });
    }
    function activeDiscountPolciy(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeDiscountPolicy/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fee_discount_policy_show').html(data);
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
    function editDiscountPolciy(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeDiscountPolicy/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_discount_policy_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#title_edit').val(data.title);  
                     $('#fee_group_edit').val(data.fee_id);  
                     $('#adm_edit').val(data.adm);  
                     $('#reg_edit').val(data.reg);  
                     $('#security_edit').val(data.sec);  
                     $('#annual_edit').val(data.annual);  
                     $('#tution_edit').val(data.tution);  
                     $('#remarks_edit').val(data.remarks);           
                              
                }
            })
       
    }
    $(document).on('click', '#edit_discount_policy', function(e) {    	
        var data = $("#edit_discount_policy_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fee_discount_policy_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeDiscountPolicy/update",
            success: function(data) {
            	$('#edit_discount_policy_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Discount Policy Updated Successfully</div>");  
                $('#update_btn_loading').html('<button class="btn green" id="edit_discount_policy">Update</button>');         
                $('#fee_discount_policy_show').html(data);
                $('#edit_discount_policy_form')[0].reset();
            }
        });
    });
$(document).ready(function() {
   $("input").click(function() {
     $("#fee_group_dropdown").show();
    if($("input[value=2]:checked").length) {
        $("#fee_group_dropdown").hide();
    }
});
});
</script>