<script>
	function showAddFeeCoding(){
		 $("#add_fee_code_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
	}
    $(document).on('click', '#save_fee_coding', function(e) {
        var data = $("#fee_coding_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fee_coding_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeCoding/store",
            success: function(data) {
            	$('#add_fee_code_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Fee Coding Added Successfully</div>");
                $('#btn_loading').html('<button class="btn green"  id="save_fee_code">Save</button>');
                $('#fee_coding_show').html(data);
                $('#fee_coding_form')[0].reset();
            }
        });
    });
    function deleteFeeCoding(id, status) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeCoding/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fee_coding_show').html(data);
                }
            })
        });
    }
    function activeFeeCoding(id, status) {
        confirmActive('Do you want to Activate this record?').then(function() {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeCoding/toggle",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    $('#fee_coding_show').html(data);
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
    function editFeeCoding(id) {
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeCoding/edit",
                data: {
                    id: id
                },
                dataType:"json", 
                success: function(data) {                  
                     $('#edit_fee_code_modal').modal('show');  
                     $('#id').val(data.id);  
                     $('#fee_type_edit').val(data.fee_type);  
                     if(data.fee_type=='1')
                     {
                        $('#program_edit').val(data.program);
                        $("#program_line_dropdown1").hide();
                     } 
                     else if(data.fee_type=='2')
                     {
                       $('#program_line_edit').val(data.program);
                        $("#program_dropdown1").hide();
                     }  
                     $('#template_edit').val(data.template);   
                     $('#fee_group_edit').val(data.fee_group);   
                     $('#remarks_edit').val(data.remarks);           
                              
                }
            })
       
    }
    $(document).on('click', '#edit_fee_code', function(e) {    	
        var data = $("#edit_fee_code_form").serialize();        
        var base_url = '<?=base_url(); ?>';
        $('#update_btn_loading').html('<img  style="width: 60px;"src="' + base_url + 'assets1/apps/img/btn_loader.gif">');
        $('#fee_coding_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: data,
            type: "post",
            url: base_url + "savvy1/FeeCoding/update",
            success: function(data) {
            	$('#edit_fee_code_modal').modal('hide'); 
            	$('#msgs').html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> FeeCoding Updated Successfully</div>");  
                $('#update_btn_loading').html('<button class="btn green" id="edit_fee_coding">Update</button>');         
                $('#fee_coding_show').html(data);
                $('#edit_fee_code_form')[0].reset();
            }
        });
    });
$(document).ready(function(){
$("#program_line_dropdown").hide();
});
function changeFeeType(value){
    if(value=='1'){
         $("#program_dropdown").show();
         $("#program_line_dropdown").hide();
    }
    if(value=='2'){
        $("#program_dropdown").hide();
        $("#program_line_dropdown").show();
    }

 }
 function changeFeeType1(value){
    if(value=='1'){
         $("#program_dropdown1").show();
         $("#program_line_dropdown1").hide();
    }
    if(value=='2'){
        $("#program_dropdown1").hide();
        $("#program_line_dropdown1").show();
    }

 }
</script>