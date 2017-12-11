<script> 
    function getProgramSection(id){
        var base_url = '<?=base_url(); ?>';
         $('#SECTION_ID').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: {id:id},
            type: "post",
            url:base_url+"savvy1/AssignSection/MissingSections",
            success: function(data){
                $('#SECTION_ID').html(data); 
            }
        })
    }
    function showList() {
            var program = $('#PROGRAM_ID').val();
            var section = $('#SECTION_ID').val();
            var limit = $('#LIMIT').val();
            $('#seleted_section').val(section);
            var base_url = '<?=base_url(); ?>';
            $('#assign_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/AssignSection/createSectionList",
                data: {
                    program: program,
                    section: section,
                    limit: limit
                },
                success: function(data) {
                    $('#assign_show').html(data);
                }
            })    
    }
    function RemoveSectionList() {
            var program = $('#PROGRAM_ID').val();
            var section = $('#SECTION_ID').val();
            $('#seleted_section').val(section);
            var base_url = '<?=base_url(); ?>';
            $('#assign_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/AssignSection/RemoveSectionList",
                data: {
                    program: program,
                    section: section
                },
                success: function(data) {
                    $('#assign_show').html(data);
                }
            })    
    }
    function updateSectionList() {
            var program = $('#PROGRAM_ID').val();
            var section = $('#SECTION_ID').val();
            $('#seleted_section').val(section);
            var base_url = '<?=base_url(); ?>';
            $('#assign_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/AssignSection/updateSectionList",
                data: {
                    program: program,
                    section: section
                },
                success: function(data) {
                    $('#assign_show').html(data);
                }
            })    
    }
    function AllProgramSection(id){
        var base_url = '<?=base_url(); ?>';
         $('#SECTION_ID').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: {id:id},
            type: "post",
            url:base_url+"savvy1/AssignSection/programSections",
            success: function(data){
                $('#SECTION_ID').html(data); 
            }
        })
    }

    function deleteSection(id) {
        confirmDelete('Do you want to DELETE this record?').then(function() {
            var program = $('#PROGRAM_ID').val();
            var section = $('#SECTION_ID').val();
            var base_url = '<?=base_url(); ?>';
              $('#assign_show').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
            $.ajax({
                type: 'POST',
                url:base_url+"savvy1/AssignSection/deleteSection",
                data: {
                    id: id,
                    program: program,
                    section: section,
                },
                success: function(data) {
                    $('#assign_show').html(data);
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
    function getProgramSectionStudents(id){
         var base_url = '<?=base_url(); ?>';
         $('#show_shift_list').html('<img  style="margin-left: 50%;width: 100px;"src="' + base_url + 'assets1/apps/img/loader_gif.gif">');
        $.ajax({
            data: {id:id},
            type: "post",
            url:base_url+"savvy1/AssignSection/programSectionStudents",
            success: function(data){
                $('#show_shift_list').html(data); 
            }
        })
    }
</script>

