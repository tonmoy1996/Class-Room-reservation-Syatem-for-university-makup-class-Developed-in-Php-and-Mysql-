function validate()
{
	var txtName = document.getElementById('username').value;
	var txtPass = document.getElementById('password').value;

	var valid = true;
	var errMsg = '';

	if(txtName == '')
	{

		document.getElementById('msg1').innerHTML = 'Please input your Username<br/>';
		valid = false;

	}
	else if(txtPass == '')
	{
		document.getElementById('msg2').innerHTML = 'Password cannot be empty<br/>';


		valid = false;
	}



	if(!valid)
	{

		return false;

	}




}
