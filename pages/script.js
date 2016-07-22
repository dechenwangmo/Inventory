$(function(){

	$("message").hide();
	$("message2").hide();
	$("message3").hide();
	$("message4").hide();
	$("message5").hide();
	$("message6").hide();
	$("message6").hide();

	var t = false;
	var m = false;
	var manu = false;
	var s = false;
	var c = false;
	var s = false;
	var a = false;
	
	$('#type').focusout(function(){
       
       check_type();

	});
 $('#model').focusout(function(){
       
       check_manu();

	});

$('#manufacturer').focusout(function(){
       
       check_manu();

	});

function check_type()
{
	var ty = $("#type").val().length;

	if(ty == "")
	{
		$("#message").html("field required!");
		$("#message").show();
		t = true;
	}else
	{
		$("#message").hide();
	}

}

});