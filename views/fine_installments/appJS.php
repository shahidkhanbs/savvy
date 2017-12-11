<script>
	function getProgram(value){
		$res = value.split(',');
		$('#STUDENT_ID').val($res['0']);
		$('#PROGRAM_LINE_ID').val($res['1']);
	}
	function getFineFee(value){
		$res = value.split(',');
		$('#FINE_ID').val($res['0']);
		$('#FINE_FEE').val($res['1']);
	}
	
</script>
<script language="javascript">
    $(document).ready(function () {
        $(".date").datepicker({
            minDate: 0
        });
    });
</script>