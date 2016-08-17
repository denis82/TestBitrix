$(document).ready(function() {
	
    
	$("#errors_callback").hide();
	$("#inline").click( function(){
		//$("#form_sm").show();
	});
	
    $(".posName").hide();
    $(".posQuestion").hide();

    $("#inline").fancybox({
		'hideOnContentClick': false
	});
    $("#inline_question").fancybox({
		'hideOnContentClick': false
		
	});
    $("#order_inline").fancybox({
		'hideOnContentClick': false

	});
	var res=0;
	 $("formw").submit( function(){
		 var resq=1;
		 var name_callback = $("#name_callback").val();
		 var phone_callback = $("#phone_callback").val();
		 var email_callback = $("#email_callback").val();
		 var message_callback = $("#message_callback").text();
		  $.ajax({
				type: "POST",
				data:{name:name_callback,phone:phone_callback,email:email_callback,massage:message_callback},
				url: "/questions/validate.php",
				dataType: "json",
				async: false,
				success: function (data)
				{
					if(data.fields.length == 0) {
						$("#errors_callback").show();
                                                $("input").css("background-color","white");
                                                $("#errors_callback").text("Спасибо. Администратор свяжется с Вами в ближайшее время");
                                               resq = true;
						
					} else {
				
						$("#errors_callback").show();
						
						$("input").css("background-color","white");	
						for (var key in data.fields) { 
							var val_fields = data.fields [key];
                                                        
							$("#"+val_fields+"_callback").css("background-color","red"); 
							$("#errors_callback").text(val_fields);
						} 
						var arErrors = '';
						for (var key in data.errors) { 
							var val_errors = data.errors [key];
                                                        
							 arErrors +='<div>'+val_errors+'</div><br>'; 
							
						} 
						$("#errors_callback").html(arErrors);
						resq = false;
					}
					

				}
			});
                  return resq;
                 
			
		});
    $("#inline_resp").fancybox({
		'hideOnContentClick': false
	});
	
	
  $("#posName").blur(function(){
		if ('' != $(this).val() && '' != document.getElementById('posQuestion').value ) { 
				$("#orderCall").removeAttr('disabled');
		}
	});
  $("#posQuestion").blur(function(){
		if ('' != $(this).val() && '' != $('#posName').val() ) { 
				$("#orderCall").removeAttr('disabled');
		}
	});
 
});