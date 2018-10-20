$(function() {
	$('#datepicker').datepicker({
		maxDate: new Date(),
		changeMonth: true,
		changeYear: true,
		inline: true,
		dateFormat: 'dd-mm-yy' 
	});
});
	
$(document).ready(function() {
	$('#submit').click(function(e) {
		var error = 0;
		var name = $('#name_text').val();
		if(!name.match(/^[a-zA-Z]+$/))
		{
			alert('Name may only contain letters');
			error++;
		}
			
		var email = $('#email_text').val();
		if(!email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
		{
			alert('Email is not valid');
			error++;
		}
			
		var date = $('#datepicker').val();
		if(date > Date.now())
		{
			alert('Date of birth cannot be a future date');
			error++;
		}
			
		
		var gender = $('#select_gender').val();
		if(gender == "None")
		{
			alert('Please choose either male or female');
			error++;
		}
			
		var city = $('#city_text').val();
		if(!city.match(/^[a-zA-Z]+$/))
		{
			alert('City name may only contain letters');
			error++;
		}
			
		var zipcode = $('#zip_text').val();
		if(!zipcode.match(/^[a-zA-Z]+\s+[0-9]+$/))
		{
			alert('Zip code must be at least 1 letter, a space and at least 1 number');
			error++;
		}
				
		var address1 = $('#addr1_text').val();
		var address2 = $('#addr2_text').val();
		if(error == 0 && address1 != 0 && address2 != 0)
		{
			window.location("ProfilePage.html");
		}
		else
		{
			alert("Please fill in all fields correctly");
		}
	});
});

$(document).ready(function() {
	$('#login').click(function(e) {
		var error = 0;
		var name = $('#name_text').val();
		if(!name.match(/^[a-zA-Z]+$/))
		{
			alert('Name may only contain letters');
			error++;
		}
			
		var email = $('#email_text').val();
		if(!email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
		{
			alert('Email is not valid');
			error++;
		}
		
		var d = new Date();
		var y = d.getFullYear();
		var m = d.getMonth();
		var day = d.getDate();
		var todaysdate = day + "-" + m + "-" + y;
		var date = $('#datepicker').val();
		if(date > todaysdate)
		{
			alert('Date of birth cannot be a future date');
			error++;
		}
		
		if(error == 0)
		{
			window.location("ProfilePage.html");
		}
		else
		{
			alert("Please fill in all fields correctly");
		}
		});
});