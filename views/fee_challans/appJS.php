<script>
	function getpackages(value){
		$res = value.split(',');
		var program = $res['1'];
		$('#STUDENT_ID').val($res['0']);
        $('#PROGRAM_LINE_ID').val($res['1']);
		$('#CAMPAIGN_ID').val($res['2']);
		 var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/FeeChallan/getAmounts",
                data: {
                    program: program
                },
                dataType:"json", 
                success: function(data) {
                     $('#FEE_ID').val(data.FEE_ID);                    
                     $('#tuition_amount').val(data.TUTION_FEE);  
                     $('#amount').val(data.TOTAL_FEE);                                               
                },
                error: function (){                      
                    $('#tuition_amount').val('');  
                    $('#amount').val('');          
                  
                }
        })
	}
    function getProgramStudents(id){
         var base_url = '<?=base_url(); ?>';
         var first_month = $('#first_month').val();
         $('#group_list').html('<img  style="margin-left: 50%;width: 70px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: {id:id,first_month:first_month},
            type: "post",
            url:base_url+"savvy1/FeeChallan/programStudents",
            success: function(data){
                $('#group_list').html(data); 
            }
        })
    }
    function sendValue(value)
    {
        $('#start_date').val(value);

    }

</script>
