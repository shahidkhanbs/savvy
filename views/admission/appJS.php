<script>  
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#display_pic')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(170);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
 /*location drop down*/
 function hideModal(){
    $('#location_modal').modal('hide'); 
   ComponentsSelect2.init();
}
$(document).on('keyup','input.select2-search__field',function(){
  var new_location = this.value;
  if($('#select2-LOCATION_ID-results  li.select2-results__option').length > 0 ){
      setTimeout(function(){      
      //$('#select2-LOCATION_ID-results li.select2-results__option').html("");
      $('#location').val(new_location);
      $('#select2-LOCATION_ID-results li.select2-results__option').html("<button type='button' class='btn btn-sm btn-info btn-lg' data-backdrop='static' data-keyboard='false' data-toggle='modal' onClick='displayBlock();' data-target='#location_modal'>Create New Location</button>");
    },200);
  }else{
  }
});
function displayBlock(){
  ComponentsSelect2.init();
}
function addLocation(){
  var locationVal=$('#location').val();
  var location_short_Val=$('#location_short').val();
  var PROVINCE_ID=$('#PROVINCE_ID').val();
  var CITY_ID=$('#CITY_ID').val();
  if(locationVal=='' || location_short_Val=='' ){      
      document.getElementById("location_error").innerHTML = "<span style='color:red'>Please Enter Location</span>";
     return false;
   }
  $(".select2-dropdown").hide();
     var BASEURL='<?= base_url() ?>';
    $.post(BASEURL+"savvy1/Admission/insertNewLocation",{ locationVal:locationVal,location_short_Val:location_short_Val,CITY_ID:CITY_ID,PROVINCE_ID:PROVINCE_ID },function(data)
        {
          var result=jQuery.trim(data);
          if (result=="0"){
            alert ("error");
            $('.select2').select2();
            return false;
          }else{
            $('#location_modal').modal('hide');
            $("#LOCATION_ID").append('<option value='+result+'>'+locationVal+'</option>').val(result);
            $('.select2').select2();
            return false;
             }
        });  
}       
</script>

