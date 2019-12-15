function validate()
{
	var title = document.getElementById('title').value;
	var sec = document.getElementById('sec').value;
	var type = document.getElementById('type').value;
  var time = document.getElementById('time').value;
  var date = document.getElementById('date').value;
	var valid = true;
	var errMsg = '';

	if(title == '')
	{

		document.getElementById('msg1').innerHTML = 'Course Title needed!!<br/>';
		valid = false;

	}
	else if(sec == '')
	{
		document.getElementById('msg2').innerHTML = 'Section required!!<br/>';


		valid = false;
	}

  else if(type == '')
	{
		document.getElementById('msg3').innerHTML = 'Class type required!!<br/>';


		valid = false;
	}

  else if(time == '')
  {
    document.getElementById('msg4').innerHTML = 'Class time required!!<br/>';


    valid = false;
  }

  else if(date == '')
  {
    document.getElementById('msg5').innerHTML = 'Date required!!<br/>';


    valid = false;
  }




	if(!valid)
	{

		return false;

	}
	




}
