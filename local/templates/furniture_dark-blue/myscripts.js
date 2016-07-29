$(document).ready(function() {

    $(".posName").hide();
    $(".posQuestion").hide();

    $("#inline").fancybox({
		'hideOnContentClick': false
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