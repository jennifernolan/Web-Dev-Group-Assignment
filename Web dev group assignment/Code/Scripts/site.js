//datepicker format
$(function() {
	$('#datepicker').datepicker({
		maxDate: new Date(),
		changeMonth: true,
		changeYear: true,
		inline: true,
		dateFormat: 'dd-mm-yy' 
	});
});
	
//form validation for the signup page form. Alert the user to any invalid entries
$(document).ready(function() {
	$('#submit').click(function(e) {
		var error = 0;
		var firstname = $('#firstname_text').val();
		if(!firstname.match(/^[a-zA-Z]+$/))
		{
			alert('First name may only contain letters');
			error++;
		}
			
		var error = 0;
		var lastname = $('#lastname_text').val();
		if(!lastname.match(/^[a-zA-Z]+$/))
		{
			alert('Last name may only contain letters');
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
		if(!zipcode.match(/^[a-zA-Z]+[0-9]+[0-9]+\s+[a-zA-Z]+[a-zA-Z]+[0-9]+$/))
		{
			alert('Zip code must be at least 1 letter, a space and at least 1 number');
			error++;
		}
		
		var passwrd = $('#password_text').val();
		if(!passwrd.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/))
		{
			alert("Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
			error++;
		}
				
		var address1 = $('#addr1_text').val();
		var address2 = $('#addr2_text').val();
		if(error == 0 && address1 != 0 && address2 != 0)
		{
			//window.location("ProfilePage.html");
		}
		else
		{
			alert("Please fill in all fields correctly");
		}
	});
});

//form validation for the login page form. Alert the user to any invalid entries
$(document).ready(function() {
	$('#login').click(function(e) {
		var error = 0;
		var firstname = $('#firstname_text').val();
		if(!firstname.match(/^[a-zA-Z]+$/))
		{
			alert('First name may only contain letters');
			error++;
		}
			
		var error = 0;
		var lastname = $('#lastname_text').val();
		if(!lastname.match(/^[a-zA-Z]+$/))
		{
			alert('Last name may only contain letters');
			error++;
		}
			
		var email = $('#email_text').val();
		if(!email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
		{
			alert('Email is not valid');
			error++;
		}
		
		var passwrd = $('#password_text').val();
		if(!passwrd.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/))
		{
			alert("Invalid password");
			error++;
		}
		
		if(error == 0)
		{
			//window.location("ProfilePage.html");
		}
		else
		{
			alert("Please fill in all fields correctly");
		}
		});
});
