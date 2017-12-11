<script> 
 
    function getPrice(value)
    {    
       var res = value.split(",");
       $('#PRODUCT_ID').val(res['0']);
       $('#PRODUCT_PRICE').val(res['1']);
    }

/*show amounts against program ID in complete admission form*/
    function getAmounts(id) {
            var percentage = $('#MARKS_PERCENTAGE').val();
            var medium = $('#PROGRAM_MEDIUM').val();
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Inquiry/getDiscountAmounts",
                data: {
                    id: id, percentage:percentage, medium:medium
                },
                dataType:"json", 
                success: function(data) {   
                     $('#FEE_ID').val(data.FEE_ID);  
                     $('#ADMISSION_FEE').val(data.ADMISSION_FEE);  
                     $('#REGISTRATION_FEE').val(data.REGISTRATION_FEE);  
                     $('#SECURITY_FEE').val(data.SECURITY_FEE);  
                     $('#ANNUAL_FEE').val(data.ANNUAL_FEE);  
                     $('#TUTION_FEE').val(data.TUTION_FEE);  
                     $('#TOTAL_FEE').val(data.TOTAL_FEE);    
                              
                },
                error: function (){
                     $('#FEE_ID').val('');  
                     $('#ADMISSION_FEE').val('');  
                     $('#REGISTRATION_FEE').val('');  
                     $('#SECURITY_FEE').val('');  
                     $('#ANNUAL_FEE').val('');  
                     $('#TUTION_FEE').val('');  
                     $('#TOTAL_FEE').val(''); 
                  
                }
            })       
    }    
/*Package discount calcualtor start*/
    function admissionDiscount(value) {
       
     if (value != '') {
         var admission_fee = $('#ADMISSION_FEE').val();
         var admission_discount_limit = $('#adm_disc_limit').val();
         if (admission_fee == '') {
                alert("Admission Fee Amount is Required");
                $('#ADMISSION_DISCOUNT').val("");
                return false;        
              }
         if (value > parseFloat(admission_fee)) {
             alert("Admission Fee Amount Must be Greater than Admission Discount");
             $('#ADMISSION_DISCOUNT').val("");
             $('#admission_fee_payable').val("");
             $('#admission_fee_percent').val("");
             return false;
         }
         var adm_disc_percent = Math.round(parseFloat(value) / parseFloat(admission_fee) * 100);
         if (adm_disc_percent > parseInt(admission_discount_limit)) {
             alert("Admission Discount Percent Must be In the given Limit");
             $('#ADMISSION_DISCOUNT').val("");
             $('#admission_fee_payable').val("");
             $('#admission_fee_percent').val("");
             return false;
         } else {
             var adm_payable = admission_fee - value;
             $('#admission_fee_payable').val(adm_payable);
             $('#admission_fee_percent').val(adm_disc_percent + '%');
         }
     }
 }
 function registDiscount(value) {
     if (value != '') {
         var registration_fee   = $('#REGISTRATION_FEE').val();
         var reg_discount_limit = $('#reg_disc_limit').val();
         if (registration_fee == '') {
             alert("Registration Fee Amount is Required");
             $('#REGISTRATION_DISCOUNT').val("");
             return false;         }
         if (value > parseFloat(registration_fee)) {
             alert("Registration Fee Amount Must be Greater than Admission Discount");
             $('#REGISTRATION_DISCOUNT').val("");
             $('#registration_fee_payable').val("");
             $('#registration_fee_percent').val("");
             return false;
         }
         var reg_disc_percent = Math.round(value / registration_fee * 100);
         if (reg_disc_percent > reg_discount_limit) {
             alert("Registration Discount Percent Must be In the given Limit");
             $('#REGISTRATION_DISCOUNT').val("");
             $('#registration_fee_payable').val("");
             $('#registration_fee_percent').val("");
             return false;
         } else {
             var reg_payable = registration_fee - value;
             $('#registration_fee_payable').val(reg_payable);
             $('#registration_fee_percent').val(reg_disc_percent + '%');
         }
     }
 }
 function securityDiscount(value) {
     if (value != '') {
         var security_fee       = parseInt($('#SECURITY_FEE').val());
         var reg_discount_limit = parseInt($('#reg_disc_limit').val());
         if (security_fee == '') {
             alert("Security Fee Amount is Required");
             $('#SECURITY_DISCOUNT').val("");
             return false;         }
         if (value > security_fee) {
             alert("Security Fee Amount Must be Greater than Admission Discount");
             $('#SECURITY_DISCOUNT').val("");
             $('#security_fee_payable').val("");
             $('#security_fee_percent').val("");
             return false;
         }
         var Security_disc_percent = Math.round(parseInt(value) / security_fee * 100);
         if (Security_disc_percent > reg_discount_limit) {
             alert("Security Discount Percent Must be In the given Limit");
             $('#SECURITY_DISCOUNT').val("");
             $('#security_fee_payable').val("");
             $('#security_fee_percent').val("");
             return false;
         } else {
             var reg_payable = security_fee - value;
             $('#security_fee_payable').val(reg_payable);
             $('#security_fee_percent').val(Security_disc_percent + '%');
         }
     }
 }
  function annualDiscount(value) {
     if (value != '') {
         var annual_fee   =          parseInt($('#ANNUAL_FEE').val());
         var annual_discount_limit = parseInt($('#annual_disc_limit').val());
         if (annual_fee == '') {
             alert("Annual Fee Amount is Required");
             $('#ANNUAL_DISCOUNT').val("");
             return false;         }
         if (value > annual_fee) {
             alert("Annual Fee Amount Must be Greater than Admission Discount");
             $('#ANNUAL_DISCOUNT').val("");
             $('#annual_fee_payable').val("");
             $('#annual_fee_percent').val("");
             return false;
         }
         var annual_disc_percent = Math.round(parseInt(value) / annual_fee * 100);
         if (annual_disc_percent > annual_discount_limit) {
             alert("Annual Discount Percent Must be In the given Limit");
             $('#ANNUAL_DISCOUNT').val("");
             $('#annual_fee_payable').val("");
             $('#annual_fee_percent').val("");
             return false;
         } else {
             var annual_payable = annual_fee - value;
             $('#annual_fee_payable').val(annual_payable);
             $('#annual_fee_percent').val(annual_disc_percent + '%');
         }
     }
 }
 function tuitionDiscount(value) {
     if (value != '') {
         var tuition_fee   =          parseInt($('#TUTION_FEE').val());
         var tuition_discount_limit = parseInt($('#tuition_disc_limit').val());
         if (tuition_fee == ''){
             alert("Tuition Fee Amount is Required");
             $('#TUTION_DISCOUNT').val("");
             return false;         
            }
         if (value > tuition_fee) {
             alert("The Entered Amount For Discount Is not Allowed");
             $('#TUTION_DISCOUNT').val("");
             $('#tuition_fee_payable').val("");
             $('#tuition_fee_percent').val("");
             return false;
         }
         var tuition_disc_percent = Math.round(parseInt(value) / tuition_fee * 100);
         if (tuition_disc_percent > tuition_discount_limit) {
             alert("The Entered Amount For Discount Is not Allowed");
             $('#TUTION_DISCOUNT').val("");
             $('#tuition_fee_payable').val("");
             $('#tuition_fee_percent').val("");
             return false;
         } else {
             var tuition_payable = tuition_fee - value;
             $('#tuition_fee_payable').val(tuition_payable);
             $('#tuition_fee_percent').val(tuition_disc_percent + '%');
         }
     }
 }
 /*Package discount calcualtor end */
    function getMediumList(value){ 
         var BASEURL = '<?= base_url() ?>';      
         var res = value.split(",");
         var id = res['0'];
         var medium = res['1'];
         $('#PROGRAM_ID').val(id);
         $.ajax({
            type:"post",
            data:{ medium  : medium },
            url:BASEURL+"savvy1/Inquiry/getProgramMediumList",
            success: function(data){
                $('#PROGRAM_MEDIUM').html(data); 
                getAmounts(id);
            }  

         })
    }
    
    function findPercentage(){
        var obt_marks = $('#OBTAINED_MARKS').val();
        var Total_marks = $('#TOTAL_MARKS').val();
        if(obt_marks=='' || Total_marks =='')
        {
            return false;
        }
        var percent =  Math.round(obt_marks/Total_marks*100);
         if(isNaN(percent))
        {
            $('#MARKS_PERCENTAGE').val('0');
            return false;
        }
        $('#MARKS_PERCENTAGE').val(percent);
        if(percent>90)
        {
            $('#GRADE').val('A+');
        }
        else if(percent<90 && percent > 80)
        {
            $('#GRADE').val('A');
        }
        else if(percent<80 && percent > 70)
        {
            $('#GRADE').val('B');
        }
        else{

            $('#GRADE').val('C');
        }

    }   
    function getPackage(){
            var id = $('#PROGRAM_ID').val();
            if(id=="")
            {
                     $('#ADMISSION_FEE').val('');  
                     $('#REGISTRATION_FEE').val('');  
                     $('#SECURITY_FEE').val("");  
                     $('#ANNUAL_FEE').val('');  
                     $('#TUTION_FEE').val('');  
                     $('#TOTAL_FEE').val('');   
                     $('#adm_disc_limit').val('');  
                     $('#reg_disc_limit').val('');  
                     $('#sec_disc_limit').val('');  
                     $('#annual_disc_limit').val('');  
                     $('#tuition_disc_limit').val(''); 
                     alert("Please Select Program");
                     return false;
            }
            var percentage = $('#MARKS_PERCENTAGE').val();           
            var base_url = '<?=base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: base_url + "savvy1/Inquiry/getDiscountAmounts",
                data: {
                    id: id, percentage:percentage
                },
                dataType:"json", 
                success: function(data) {    
                     $('#FEE_ID').val(data.FEE_ID);  
                     $('#ADMISSION_FEE').val(data.ADMISSION_FEE);  
                     $('#REGISTRATION_FEE').val(data.REGISTRATION_FEE);  
                     $('#SECURITY_FEE').val(data.SECURITY_FEE);  
                     $('#ANNUAL_FEE').val(data.ANNUAL_FEE);  
                     $('#TUTION_FEE').val(data.TUTION_FEE);  
                     $('#TOTAL_FEE').val(data.TOTAL_FEE);   
                     $('#adm_disc_limit').val(data.ADMISSION_DISCOUNT);  
                     $('#reg_disc_limit').val(data.REGISTRATION_DISCOUNT);  
                     $('#sec_disc_limit').val(data.SECURITY_DISCOUNT);  
                     $('#annual_disc_limit').val(data.ANNUAL_DISCOUNT);  
                     $('#tuition_disc_limit').val(data.TUTION_DISCOUNT);                             
                },
                error: function (){
                     $('#ADMISSION_FEE').val('');  
                     $('#REGISTRATION_FEE').val('');  
                     $('#SECURITY_FEE').val('');  
                     $('#ANNUAL_FEE').val('');  
                     $('#TUTION_FEE').val('');  
                     $('#TOTAL_FEE').val('');
                     $('#adm_disc_limit').val('');  
                     $('#reg_disc_limit').val('');  
                     $('#sec_disc_limit').val('');  
                     $('#annual_disc_limit').val('');  
                     $('#tuition_disc_limit').val('');
                  
                }
            })

    } 
    function getTransportFee(value)
    {
       var res = value.split(",");
       $('#TRANSPORT_FEE_ID').val(res['0']);
       $('#Tranport_fee').val(res['1']);
    }



$(document).ready(function() {
    $("#tran_div").hide();
    $('input[type=radio][name=is_transport]').change(function() {
        if (this.value == 1) {
            $("#tran_div").hide();
        }
        else if (this.value == 2) {
            $("#tran_div").show();
        }
    });
});

$(document).ready(function() {
    $("#installment_div").hide();
    $('input[type=radio][name=fee_intallment]').change(function() {
        if (this.value == '1') {
            $("#installment_div").hide();
        }
        else if (this.value == '2') {
            $("#installment_div").show();
        }
    });
});

function readURL(input) 
{
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
    
</script>

<script type="text/javascript">
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
  if(locationVal=='' || location_short_Val=='' ){      
      document.getElementById("location_error").innerHTML = "<span style='color:red'>Please Enter Location</span>";
     return false;
   }
  $(".select2-dropdown").hide();
     var BASEURL='<?= base_url() ?>';
    $.post(BASEURL+"savvy1/Inquiry/insertNewLocation",{ locationVal:locationVal,location_short_Val:location_short_Val},function(data)
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
function getTransportFee(value)
    {
        var base_url = '<?=base_url(); ?>';
        $.ajax({
            type: 'POST',
            url: base_url + "savvy1/Inquiry/getTransportFee",
            data: {
                stop_id: value
            },
            success: function(data) {
                var result =  $.parseJSON(data);
                var vehicle_id = $("#vehicle_id");
                vehicle_id.empty();
                $(result.veh).each(function(i,params) {
                    vehicle_id.append($("<option></option>").attr("value", params['VEHICLE_ID']).html(params['VEHICLE_NAME']+'-'+params['VEHICLE_NO']));
                });
                $('#Tranport_fee').val(result.fee[0].AMOUNT);
             
            },
            error: function (){
            }
        })
    }

</script>