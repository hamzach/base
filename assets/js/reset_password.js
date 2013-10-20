$(document).ready(function(){

	$('#submit').click(function(){
		var error1 = 0, error2 = 0, error3 = 0;
		if($('#password1').val() == "")
		{
			$('#password1_error').text('Please enter your password.');
			error1 = 1;
		}
		else if($('#password1').val().length < 6)
		{
			$('#password1_error').text('The password you provided must have atleast 6 characters');
			error1 = 1;
		}
		else if($('#password1').val().length > 250)
		{
			$('#password1_error').text('The password you provided must have atmost 250 characters');
			error1 = 1;
		}
		else
		{
			$('#password1_error').text('');
			error1 = 0;
		}

		if($('#password2').val() == "")
		{
			$('#password2_error').text('Please re-enter your password.');
			error2 = 1;
		}
		else if($('#password2').val().length < 6)
		{
			$('#password2_error').text('The password you provided must have atleast 6 characters');
			error2 = 1;
		}
		else if($('#password2').val().length > 250)
		{
			$('#password2_error').text('The password you provided must have atmost 250 characters');
			error2 = 1;
		}
		else
		{
			$('#password1_error').text('');
			error2 = 0;
		}

		if($('#password1').val() != $('#password2').val())
		{
			$('#password2_error').text('The passwords you provided must match.');
			error3 = 1;
		}
		else {
			error3 = 0;
		}

		if(error1 == 0 && error2 == 0 && error3 == 0)
		{
			return true;
		}
		else {
			return false;
		}
	});

});