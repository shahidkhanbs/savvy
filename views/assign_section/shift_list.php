
 <div class="row">
  <?php foreach (array_group_by($students,'SECTION_ID')  as $student) { ?>                        
  <div class="col-lg-4">
      <div class="portlet light portlet-fit bordered">                    
          <div class="portlet-body">
              <div class="mt-element-list">
                  <div class="mt-list-head list-simple ext-1 font-white bg-green-sharp">
                      <div class="list-head-title-container">
                          <div class="list-date"></div>
                          <h3 class="list-title"><?PHP echo $student[0]['SECTION_CODE']; ?></h3>
                      </div>
                  </div> 
                  <div class="mt-list-container list-simple ext-1" id="<?PHP echo   $student[0]['SECTION_ID']; ?>" style="height:500px;overflow-y:scroll;border-style: solid;border-color: #0e7acb #000 #000  #0e7acb;">
                      <ul class="sortable" >
                        <?php  foreach ($student  as $result) { ?> 
                          <li  class="mt-list-item done" id="<?PHP echo $result['STUDENT_ID']; ?>" style="cursor: move">
                              <div class="list-datetime">Roll # : <?php echo  $result['ROLL_NO']; ?></div>
                              <div class="list-item-content">
                                  
                                      <?php echo  $result['FULL_NAME']; ?>
                                 
                              </div>
                          </li> 
                        <?php  }  ?>               
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php  }  ?> 
</div>      
<script>
$(function() {
        var oldList, newList, item;
        $('.sortable').sortable({
            start: function(event, ui) {
                item = ui.item;
                newList = oldList = ui.item.parent().parent();
            },
            stop: function(event, ui) { 
                var toList = newList.attr('id');
                var fromList = oldList.attr('id');
                var itemId = item.attr('id');
                var program = $('#PROGRAM_ID').val();
                if(toList != fromList){
                    var form_data = {
                        itemId: itemId,
                        toList: toList,
                        program:program
                    };
                    $.ajax({
                        url: '<?= base_url()?>savvy1/AssignSection/addToList',
                        type: 'POST',
                        data: form_data,
                        success: function (response) {
                          if(response=='1'){
                               getProgramSectionStudents(program);
                          }else{
                             alert('Shift Failed');
                          }
                                               
                        }
                    });
                }else if(toList != fromList){
               
                }
            },
            change: function(event, ui) {  
                if(ui.sender) newList = ui.placeholder.parent().parent();
            },
            connectWith: ".sortable"
        }).disableSelection();
    });

  </script>  